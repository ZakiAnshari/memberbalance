@extends('layouts.admin')
@section('title', 'Data Member')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h4 class="fw-bold d-flex align-items-center my-4">
                <i class="bx bx-book me-2 text-primary" style="font-size: 1.5rem;"></i>
                <span class="text-muted fw-light me-1"></span> Data Member
            </h4>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h5>Table Data Member</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Form Search -->
                                <form method="GET" class="d-flex align-items-center my-3" style="max-width: 350px;">
                                    <div class="input-group shadow-sm" style="height: 38px; width: 100%;">
                                        <input type="text" name="name" value="{{ request('name') }}"
                                            class="form-control border-end-0 py-2 px-3" style="font-size: 0.9rem;"
                                            placeholder="Cari..." aria-label="Search">
                                        <button class="btn btn-outline-primary px-3" type="submit"
                                            style="font-size: 0.9rem;">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- Tombol Aksi -->
                                <div class="d-flex gap-2">
                                    <!-- Tombol Transaksi -->
                                    <button type="button"
                                        class="btn btn-outline-primary d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addTransaksiModal">
                                        <i class="bx bx-transfer me-2"></i>
                                        <span>Transaksi</span>
                                    </button>
                                    <!-- Tombol Tambah -->
                                    <button type="button"
                                        class="btn btn-outline-success account-image-reset  d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#addProductModal">
                                        <i class="bx bx-plus me-2 d-block"></i>
                                        <span>Tambah</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Modal Transaksi -->
                            <div class="modal fade" id="addTransaksiModal" tabindex="-1" aria-labelledby="addTransaksiModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <!-- Header Modal -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addTransaksiModalLabel">Tambah Transaksi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Form Transaksi -->
                                        <form action="{{ route('transaksi.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Kolom Kiri -->
                                                    <div class="col-lg-6">
                                                        <!-- Pilih Member -->
                                                        <div class="mb-3">
                                                            <label for="member_id" class="form-label">Pilih Member</label>
                                                            <select class="form-select" id="member_id" name="member_id" required>
                                                                <option value="" disabled selected>-- Pilih Member --</option>
                                                                @foreach ($members as $member)
                                                                    <option value="{{ $member->id }}">
                                                                        {{ $member->name }} (Saldo: Rp {{ number_format($member->saldo, 0, ',', '.') }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Tipe Transaksi -->
                                                        <div class="mb-3">
                                                            <label for="tipe" class="form-label">Tipe Transaksi</label>
                                                            <select class="form-select" id="tipe" name="tipe" required>
                                                                <option value="" disabled selected>-- Pilih Tipe --</option>
                                                                <option value="topup">Top-Up Saldo</option>
                                                                <option value="pengurangan">Pengurangan Saldo</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Kolom Kanan -->
                                                    <div class="col-lg-6">
                                                        <!-- Nominal -->
                                                        <div class="mb-3">
                                                            <label for="nominal" class="form-label">Nominal</label>
                                                            <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Masukkan nominal, contoh: 50.000" required>

                                                            <script>
                                                                document.getElementById('nominal').addEventListener('input', function (e) {
                                                                    let value = e.target.value.replace(/\D/g, ''); // hanya angka
                                                                    if (value) {
                                                                        e.target.value = new Intl.NumberFormat('id-ID').format(value);
                                                                    } else {
                                                                        e.target.value = '';
                                                                    }
                                                                });
                                                            </script>
                                                        </div>

                                                        <!-- Keterangan -->
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Keterangan</label>
                                                            <textarea id="keterangan" name="keterangan" class="form-control" rows="1" placeholder="Tuliskan keterangan transaksi (opsional)"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Footer Modal -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x me-1"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-save me-1"></i> Simpan Transaksi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal tambah Data -->
                            <div class="modal fade" id="addProductModal" tabindex="-1"
                                aria-labelledby="addProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <!-- Judul -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addProductModalLabel">Tambah Member</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('datamember.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row justify-content-center">
                                                <!-- Kolom Kiri -->
                                                <div class="col-lg-8">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nama</label>
                                                        <input type="text" name="name" class="form-control" id="name" required>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" id="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="no_hp" class="form-label">Nomor HP</label>
                                                        <input type="number" name="no_hp" class="form-control" id="no_hp" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Table Data -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5px" >No</th>
                                        <th>Nama</th>
                                        <th>Saldo Saat Ini</th>
                                        <th style="width: 5px;text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($members  as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Rp {{ number_format($item->saldo, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <!-- Tombol Detail -->
                                                    <a href="datamember-show/{{ $item->id }}" class="btn btn-outline-info btn-sm" title="Lihat Data">
                                                        <i class="bx bx-show me-1"></i> Detail
                                                    </a>

                                                    <!-- Tombol Edit -->
                                                    <a href="datamember-edit/{{ $item->id }}" class="btn btn-outline-primary btn-sm" title="Edit Data">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <button type="button" 
                                                            class="btn btn-outline-danger btn-sm" 
                                                            title="Hapus Data"
                                                            onclick="confirmDeletemember({{ $item->id }}, @js($item->name))">
                                                        <i class="bx bx-trash me-1"></i> Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class="d-flex justify-content-end mt-3">
                                {{ $members->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDeletemember(id, nama) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `"${nama}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/datamember-destroy/${id}`;
                }
            });
        }
    </script>
@include('sweetalert::alert')
@endsection
