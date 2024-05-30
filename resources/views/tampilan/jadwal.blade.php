@extends('struktur.dasar')
@section('judul', 'Jadwal')
@section('konten')
    <div class="d-flex justify-content-end mb-3">
        <button
            class="btn btn-success"
            data-target="#modal-tambah-jadwal"
            data-toggle="modal"
            type="button"
        >Tambah Jadwal</button>
    </div>
    {{-- modal --}}
    <div class="fade modal" id="modal-tambah-jadwal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fs-5 modal-title">Jadwal</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="pemilih-pengguna">Pengguna</label>
                            <select class="form-control" id="pemilih-pengguna">
                                <option selected>Pilih pengguna</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pemilih-properti">Properti</label>
                            <select class="form-control" id="pemilih-properti">
                                <option selected>Pilih properti</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="masukan-tanggal">Tanggal</label>
                            <input class="form-control" id="masukan-tanggal" type="date">
                        </div>
                        <div class="mb-3">
                            <label for="masukan-pukul">Pukul</label>
                            <input class="form-control" id="masukan-pukul" type="time">
                        </div>
                        <div class="mb-3">
                            <label for="masukan-catatan">Catatan</label>
                            <input class="form-control" id="masukan-catatan" type="text">
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
@endsection
