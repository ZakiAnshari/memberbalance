@extends('layouts.admin')
@section('title', 'Riwayat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <h4 class="fw-bold d-flex align-items-center my-4">
            <i class="bx bx-history me-2 text-primary" style="font-size: 1.5rem;"></i>
            Riwayat Data Transaksi
        </h4>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h5 class="mb-4">Tabel Riwayat Data Transaksi</h5>
                    <!-- Header Atas: Search + Tombol Aksi -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                        <!-- Form Pencarian -->
                        <form method="GET" class="d-flex align-items-center" style="max-width: 350px;">
                            <div class="input-group shadow-sm" style="height: 38px; width: 100%;">
                                <input type="text" name="name" value="{{ request('name') }}"
                                    class="form-control border-end-0 py-2 px-3"
                                    placeholder="Cari member..." aria-label="Search" style="font-size: 0.9rem;">
                                <button class="btn btn-outline-primary px-3" type="submit" style="font-size: 0.9rem;">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </form>
                        <!-- Tombol Aksi (Tambah + Filter + Export) -->
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <!-- Filter -->
                            <form action="{{ route('transaksi.index') }}" method="GET"
                                class="d-flex flex-wrap align-items-center gap-2">
                                {{-- Filter Jenis Transaksi --}}
                                <select name="tipe" class="form-select" style="width: 160px;" onchange="this.form.submit()">
                                    <option value="">Semua Tipe</option>
                                    <option value="topup" {{ request('tipe') == 'topup' ? 'selected' : '' }}>Top-Up</option>
                                    <option value="pengurangan" {{ request('tipe') == 'pengurangan' ? 'selected' : '' }}>Pengurangan</option>
                                </select>
                            </form>
                            <!-- Tombol CETAK -->
                            <a href="{{ route('transaksi.print') }}" target="_blank" 
                            class="btn btn-outline-primary d-flex align-items-center">
                                <i class="bx bx-printer me-2"></i> Cetak
                            </a>
                        </div>
                    </div>
                    <!-- Table Data -->
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Nama Member</th>
                                    <th>Tipe Transaksi</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksis as $trx)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trx->member->name ?? '-' }}</td>
                                        <td>
                                            @if($trx->tipe == 'topup')
                                                <span class="badge bg-success">Top-Up</span>
                                            @elseif($trx->tipe == 'pengurangan')
                                                <span class="badge bg-danger">Pengurangan</span>
                                            @else
                                                <span class="badge bg-secondary">Tidak Diketahui</span>
                                            @endif
                                        </td>
                                        <td>Rp {{ number_format($trx->nominal, 0, ',', '.') }}</td>
                                        <td>{{ $trx->keterangan ?? '-' }}</td>
                                        <td>{{ $trx->created_at->format('d F Y, H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Tidak ada data transaksi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
@endsection
