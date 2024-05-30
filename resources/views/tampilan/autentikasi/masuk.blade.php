@extends('struktur.dasar')
@push('css')
    <link href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
@endpush
@section('judul', 'Masuk')
@section('konten')
    <div class="mb-4 text-center text-md-start">
        <h3 class="font-weight-bold text-center">Masuk</h3>
    </div>
    <form method="post">
        @csrf
        <div class="gy-3 row">
            <div class="col-12">
                <div class="mb-3">
                    <label
                        class="font-weight-bold form-label"
                        for="masukan-nama-pengguna"
                    >Nama Pengguna</label>
                    <input
                        class="border border-black form-control"
                        id="masukan-nama-pengguna"
                        name="nama-pengguna"
                        required
                        type="text"
                        value="{{ old('nama-pengguna') }}"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label
                        class="font-weight-bold form-label"
                        for="masukan-kata-sandi"
                    >Kata Sandi</label>
                    <input
                        class="border border-black form-control"
                        id="masukan-kata-sandi"
                        name="kata-sandi"
                        required
                        type="password"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button class="btn btn-lg btn-primary" type="submit">Masuk</button>
                </div>
            </div>
        </div>
    </form>
@endsection
