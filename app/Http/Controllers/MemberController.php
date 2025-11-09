<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query dasar
        $query = Member::query();

        // Jika ada input pencarian berdasarkan nama
        if ($request->has('name') && $request->name != '') {
            $search = $request->input('name');
            $query->where('name', 'like', "%{$search}%");
        }

        // Gunakan pagination
        $members = $query->paginate(10)->appends($request->all());

        // Kirim data ke view
        return view('admin.member.index', compact('members'));
    }


    public function show($id)
    {
        // Ambil member beserta semua transaksi
        $member = Member::with('transaksis')->findOrFail($id);
        return view('admin.member.show', compact('member'));
    }



    public function store(Request $request)
    {
        // Validasi data tanpa saldo (saldo otomatis = 0)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email',
            'no_hp' => 'required|string|max:20',
        ]);

        // Saldo default = 0
        $validated['saldo'] = 0;
        // Simpan data ke database
        Member::create($validated);
        // Notifikasi sukses
        Alert::success('Success', 'Data member berhasil ditambahkan dengan saldo awal Rp 0');
        // Kembali ke halaman sebelumnya
        return back();
    }



    public function edit($id)
    {
        // Ambil data kategori berdasarkan ID
        $members = Member::find($id);
        // Validasi apakah data ditemukan
        if (!$members) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        // Tampilkan view edit
        return view('admin.member.edit', compact('members'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data member berdasarkan ID
        $member = Member::findOrFail($id);
        // Hapus titik dari saldo sebelum validasi
        $request->merge([
            'saldo' => str_replace('.', '', $request->saldo)
        ]);
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $id,
            'no_hp' => 'required|string|max:20',
        ]);
        // Perbarui data di database
        $member->update($validated);
        // Tampilkan notifikasi sukses
        Alert::success('Success', 'Data member berhasil diperbarui');
        // Kembali ke halaman daftar member
        return redirect()->route('datamember.index');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        Alert::success('Success', 'Member berhasil dihapus');
        return redirect()->route('datamember.index');
    }
}
