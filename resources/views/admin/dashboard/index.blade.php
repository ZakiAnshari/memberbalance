@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4">
        <!-- ====== CARD UTAMA DASHBOARD ====== -->
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="card-body">
                            <h4 class="card-title text-primary">
                                Halo {{ Auth::user()->role->name }}, selamat datang di Aplikasi MemberBalance 🎉
                            </h4>
                            <p class="mb-4">
                                Kelola data anggota dan transaksi dengan mudah, cepat, dan efisien menggunakan Aplikasi MemberBalance.
                            </p>
                            <a href="" class="btn btn-sm btn-outline-primary">
                                Lihat Data
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('/backend/assets/img/illustrations/man-with-laptop-light.png') }}"
                            height="140" alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== CARD STATISTIK ====== -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="bx bx-user fs-3"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Member</h6>
                        <h4 class="mb-0">{{ $memberCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="bx bx-wallet fs-3"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Saldo</h6>
                        <h4 class="mb-0">Rp {{ number_format($saldoCount, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="bx bx-user-circle fs-3"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total User</h6>
                        <h4 class="mb-0">{{ $userCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="bx bx-wallet fs-3"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total TopUp</h6>
                        <h4 class="mb-0">Rp {{ number_format($saldoCounttop, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="bx bx-wallet fs-3"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Pengurangan</h6>
                        <h4 class="mb-0"> Rp {{ number_format($totalPengurangan, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== END CARD STATISTIK ====== -->
    </div>
</div>

@include('sweetalert::alert')
@endsection
