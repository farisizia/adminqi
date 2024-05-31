@extends('struktur.dasar')
@section('judul', 'Jadwal')
@push('css')
    <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/management.css') }}" rel="stylesheet">
@endpush
@section('konten')
    <div class="d-flex justify-content-end mb-3">
        <button
            class="btn btn-success"
            data-target="#modal-tambah-jadwal"
            data-toggle="modal"
            type="button"
        >Tambah Jadwal</button>
    </div>
    <table class="table table-bordered table-striped" id="tabel-jadwal">
        <thead class="text-center">
        <tr>
            <th>ID Jadwal</th>
            <th>ID Properti</th>
            <th>Nama Pengguna</th>
            <th>Telepon Pengguna</th>
            <th>Tanggal Jadwal</th>
            <th>Pukul Jadwal</th>
            <th>PIC</th>
            <th>Catatan</th>
            <th>Status Jadwal</th>
            <th>Aksi Pengguna</th>
        </tr>
        </thead>
        @if ($jadwal)
            <tbody>
            @foreach ($jadwal as $j)
                <tr>
                    <td class="text-center">{{ $j->id_jadwal }}</td>
                    <td class="text-center">{{ $j->properti->id_properti }}</td>
                    <td>Robert Pattinson</td>
                    <td>012789690</td>
                    <td class="text-center">{{ $j->tanggal }}</td>
                    <td class="text-center">{{ $j->pukul }}</td>
                    <td class="text-center">PIC</td>
                    <td>{{ $j->catatan }}</td>
                    <td class="text-center">{{ $j->jadwal_diterima ? 'Accept' : 'Decline' }}</td>
                    <td class="text-center">
                        <button
                            class="btn btn-detail tombol-detail"
                            data-target="#modal-lihat-detail-jadwal-{{ $loop->iteration }}"
                            data-toggle="modal"
                            type="button">Detail</button>
                        <a
                            class="btn btn-danger"
                            href="{{ route('jadwal.hapus', ['id_jadwal' => $j->id_jadwal]) }}"
                        >Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
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
                            <select class="form-control" id="pemilih-properti" name="properti">
                                <option selected>Pilih properti</option>
                                @foreach ($properti as $p)
                                    <option value="{{ $p->id_properti }}">{{ $p->nama_properti }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="masukan-tanggal">Tanggal</label>
                            <input class="form-control" id="masukan-tanggal" name="tanggal" type="date">
                        </div>
                        <div class="mb-3">
                            <label for="masukan-pukul">Pukul</label>
                            <input class="form-control" id="masukan-pukul" name="pukul" type="time">
                        </div>
                        <div class="mb-3">
                            <label for="masukan-catatan">Catatan</label>
                            <input class="form-control" id="masukan-catatan" name="catatan" type="text">
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal --}}
    @foreach ($jadwal as $j)
        <div class="fade modal" id="modal-lihat-detail-jadwal-{{ $loop->iteration }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fs-5 modal-title">Jadwal</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Nama</td>
                                <td>:</td>
                                <td>Robert Pattinson</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Telepon</td>
                                <td>:</td>
                                <td>012789690</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Jadwal</td>
                                <td>:</td>
                                <td>{{ $j->tanggal }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Pukul Jadwal</td>
                                <td>:</td>
                                <td>{{ $j->pukul }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <form method="post">
                            @csrf
                            @method('put')
                            <input name="id-jadwal" type="hidden" value="{{ $j->id_jadwal }}">
                            <div class="mb-3">
                                <label class="form-label" for="masukan-pic">PIC</label>
                                <input class="form-control" id="masukan-pic" type="text">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="area-teks-catatan">Catatan</label>
                                <textarea class="form-control" id="area-teks-catatan" rows="5"></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success mr-1" type="submit">Terima</button>
                                <button class="btn btn-danger" type="button">Tolak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal --}}
@endsection
@push('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $('#tabel-jadwal').DataTable();
        });
    </script>
@endpush
