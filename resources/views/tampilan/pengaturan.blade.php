@extends('struktur.dasar')
@section('judul', 'Pengaturan')
@push('css')
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
@endpush
@section('konten')
    <div class="justify-content-center row">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img
                            alt="Foto"
                            class="img-fluid rounded-circle"
                            src="https://bootdey.com/img/Content/avatar/avatar6.png"
                            style="width: 100px"
                        >
                    </div>
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="masukan-id">ID</label>
                            <input
                                class="form-control rounded-pill"
                                disabled
                                id="masukan-id"
                                type="text"
                                value="{{ $pengguna->id }}"
                            >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="masukan-nama-lengkap">Nama Lengkap</label>
                            <input
                                class="form-control rounded-pill"
                                id="masukan-nama-lengkap"
                                type="text"
                                value="{{ $pengguna->nama_lengkap }}"
                            >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="masukan-nama-pengguna">Nama Pengguna</label>
                            <input
                                class="form-control rounded-pill"
                                disabled
                                id="masukan-nama-pengguna"
                                type="text"
                                value="{{ $pengguna->nama_pengguna }}"
                            >
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="masukan-kata-sandi">Kata Sandi</label>
                            <input class="form-control rounded-pill" id="masukan-kata-sandi" type="password">
                        </div>
                        <button class="btn btn-block btn-primary rounded-pill" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
