<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar member (untuk kebutuhan filter dropdown dsb)
        $members = Member::select('id', 'name', 'saldo')
            ->orderBy('name')
            ->get();

        // Query dasar transaksi + relasi member
        $query = Transaksi::with('member')->orderBy('created_at', 'desc');

        // 🔍 Filter berdasarkan tipe transaksi
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        // 🔍 Filter berdasarkan nama member
        if ($request->filled('name')) {
            $query->whereHas('member', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        // Ambil hasil query setelah difilter
        $transaksis = $query->get();

        // Kirim ke view
        return view('admin.riwayattransaksi.index', compact('transaksis', 'members'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id'  => 'required|exists:members,id',
            'tipe'       => 'required|in:topup,pengurangan',
            'nominal'    => 'required|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Bersihkan nominal (misal "50.000" -> 50000)
        $nominal = str_replace('.', '', $request->nominal);

        // Ambil data member
        $member = Member::findOrFail($validated['member_id']);
        $tipe = $validated['tipe'];

        // Cek saldo jika pengurangan
        if ($tipe === 'pengurangan' && $member->saldo < $nominal) {
            Alert::error('Gagal', 'Saldo member tidak mencukupi untuk transaksi ini.');
            return back(); // transaksi tidak disimpan
        }

        // Update saldo member
        $member->saldo += ($tipe === 'topup' ? $nominal : -$nominal);
        $member->save();

        // Simpan transaksi
        Transaksi::create([
            'member_id'  => $member->id,
            'tipe'       => $tipe,
            'nominal'    => $nominal,
            'keterangan' => $validated['keterangan'] ?? ucfirst($tipe) . ' Saldo',
        ]);

        Alert::success('Berhasil', 'Transaksi berhasil disimpan.');
        return back();
    }
    public function print()
    {
        // Ambil data transaksi beserta member-nya
        $transaksis = Transaksi::with('member')
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim data ke view khusus cetak
        return view('admin.print', compact('transaksis'));
    }
}
