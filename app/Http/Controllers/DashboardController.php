<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $memberCount = Member::count();
        $userCount = User::count();
        $saldoCount = Member::sum('saldo');
        $saldoCounttop = Transaksi::where('tipe', 'topup')->sum('nominal');
        $totalPengurangan = Transaksi::where('tipe', 'pengurangan')->sum('nominal');

        return view('admin.dashboard.index', compact(
            'memberCount',
            'userCount',
            'saldoCount',
            'saldoCounttop',
            'totalPengurangan',
        ));
    }
}
