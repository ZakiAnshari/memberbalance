@extends('layouts.admin')
@section('title', 'Show')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold d-flex align-items-center my-4">
            <i class="bx bx-user me-2 text-primary" style="font-size: 1.5rem;"></i>
            <span class="text-muted fw-light me-1"></span> Lihat Data Member
        </h4>
        <div class="card">
            <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                <a class="mx-4 my-4" href="{{ route('datamember.index') }}">
                    <button class="btn btn-outline-primary border-1 rounded-1 px-3 py-1 d-flex align-items-center"
                        data-bs-toggle="tooltip" title="Kembali">
                        <i class="bi bi-arrow-left fs-5 mx-1"></i>
                        <span class="fw-normal">Kembali</span>
                    </button>
                </a>
            </div>
            <div class="card-body">
                <div class="text-nowrap">
                    <div class="row">
                        <!-- Kartu Kiri -->
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100 border border-primary shadow-sm">
                                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                    <div class="mb-3">
                                        <div class="border d-flex align-items-center justify-content-center"
                                            style="width: 100%; height: 250px; border-radius: 0px; overflow: hidden; background-color: #f8f9fa;">
                                            <img src="{{ asset('/backend/user-3296.png') }}"
                                                alt="Foto Member"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <p class="fw-bold fs-5 text-dark mb-0">{{ $member->name }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Kartu Kanan -->
                        <div class="col-lg-8 mb-4">
                            <div class="card h-100 border border-primary shadow-sm">
                                <div class="card-header bg-light border-bottom border-primary mb-3">
                                    <h5 class="mb-0 text-primary">Detail Member {{ $member->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label text-muted">Email</label>
                                                <input type="text" class="form-control" value="{{ $member->email }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted">Nomor HP</label>
                                                <input type="text" class="form-control" value="{{ $member->no_hp }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label text-muted">Saldo Saat Ini</label>
                                                <input type="text" class="form-control fw-bold text-success" 
                                                    value="Rp {{ number_format($member->saldo, 0, ',', '.') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Riwayat Transaksi -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card border border-secondary shadow-sm">
                                <div class="card-header bg-light border-bottom border-secondary mb-3">
                                    <h5 class="mb-0 text-secondary">Riwayat Transaksi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover align-middle">
                                            <thead class="table-primary">
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Tipe</th>
                                                    <th>Nominal</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($member->transaksis as $index => $trx)
                                                    <tr class="text-center">
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $trx->created_at->format('d F Y | H:i') }}</td>
                                                        <td>
                                                            <span class="badge bg-{{ $trx->tipe == 'topup' ? 'success' : 'danger' }}">
                                                                {{ ucfirst($trx->tipe) }}
                                                            </span>
                                                        </td>
                                                        <td>Rp {{ number_format($trx->nominal, 0, ',', '.') }}</td>
                                                        <td>{{ $trx->keterangan }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted">Belum ada transaksi</td>
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
            </div>
        </div>
    </div>
@include('sweetalert::alert')
@endsection
