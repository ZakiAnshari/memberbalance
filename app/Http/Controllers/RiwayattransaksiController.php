<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class RiwayattransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar member (untuk kebutuhan tampilan/filter)
        $members = Member::select('id', 'name', 'saldo')
            ->orderBy('name')
            ->get();
        // Query dasar transaksi + relasi member
        $query = Transaksi::with('member')->orderBy('created_at', 'desc');
        // 🔍 Filter berdasarkan tipe transaksi jika ada
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }
        // Ambil hasilnya
        $transaksis = $query->get();
        // Kirim ke view
        return view('admin.riwayattransaksi.index', compact('transaksis', 'members'));
    }
}
