@extends('struktur.dasar')
@section('judul', 'Properti')
@push('css')
    <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/management.css') }}" rel="stylesheet">
@endpush
@section('konten')
    <div class="d-flex justify-content-end mb-3">
        <button
            class="btn btn-add_property"
            data-target="#modal-tambah-properti"
            data-toggle="modal"
            type="button"
        >Tambah Properti</button>
    </div>
    <table class="table table-bordered table-striped" id="tabel-properti">
        <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama Properti</th>
            <th>Foto Properti</th>
            <th>Harga Properti</th>
            <th>Status Properti</th>
            <th>Aksi Properti</th>
        </tr>
        </thead>
        @if ($properti)
            <tbody>
            @foreach ($properti as $p)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_properti }}</td>
                    <td class="text-center">
                        <button class="btn btn-success" type="button">Lihat Foto</button>
                    </td>
                    <td class="text-right">{{ $p->harga }}</td>
                    <td class="text-center">{{ $p->status }}</td>
                    <td class="text-center">
                        <button
                            class="btn btn-detail"
                            data-target="#modal-edit-properti-{{ $loop->iteration }}"
                            data-toggle="modal"
                            type="button"
                        >Edit</button>
                        <a
                            class="btn btn-danger"
                            href="{{ route('properti.hapus', ['id_properti' => $p->id_properti]) }}"
                        >Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    {{-- modal --}}
    <div class="fade modal" id="modal-tambah-properti">
        <div class="modal-dialog modal-dialog-centered" style="top: 0">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fs-5 modal-title">Properti</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="masukan-foto">Unggah Foto</label>
                            <input
                                accept="image/*"
                                class="form-control"
                                id="masukan-foto"
                                multiple
                                name="foto[]"
                                type="file"
                            >
                            <small class="form-text text-muted">Tidak ada berkas yang dipilih</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="masukan-foto">Nama Properti</label>
                            <input class="form-control" name="nama-properti" type="text">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="masukan-harga">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control" id="masukan-harga" name="harga" type="text">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="pemilih-status">Status</label>
                            <select class="form-control" id="pemilih-status" name="status">
                                <option>Siap</option>
                                <option>Tertunda</option>
                                <option>Terjual</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="area-teks-status">Alamat</label>
                            <textarea class="form-control" id="area-teks-status" name="alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="area-teks-deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="area-teks-deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="form-label" for="masukan-luas">Luas</label>
                                    <input class="form-control" id="masukan-luas" name="luas" type="number">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="masukan-garasi">Garasi</label>
                                    <input class="form-control" id="masukan-garasi" name="garasi" type="number">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="masukan-kamar-tidur">Kamar Tidur</label>
                                    <input
                                        class="form-control"
                                        id="masukan-kamar-tidur"
                                        name="kamar-tidur"
                                        type="number"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="masukan-kamar-mandi">Kamar Mandi</label>
                                    <input
                                        class="form-control"
                                        id="masukan-kamar-mandi"
                                        name="kamar-mandi"
                                        type="number"
                                    >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="masukan-lantai">Lantai</label>
                                    <input class="form-control" id="masukan-lantai" name="lantai" type="number">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    {{-- modal --}}
    @foreach ($properti as $p)
        <div class="fade modal" id="modal-edit-properti-{{ $loop->iteration }}">
            <div class="modal-dialog" style="top: 0">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fs-5 modal-title">Properti</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <input name="id-properti" type="hidden" value="{{ $p->id_properti }}">
                            <div class="mb-3">
                                <label class="form-label" for="masukan-foto">Unggah Foto</label>
                                <input
                                    accept="image/*"
                                    class="form-control"
                                    id="masukan-foto"
                                    multiple
                                    name="foto[]"
                                    type="file"
                                >
                                <small class="form-text text-muted">Tidak ada berkas yang dipilih</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="masukan-foto">Nama Properti</label>
                                <input
                                    class="form-control"
                                    name="nama-properti"
                                    type="text"
                                    value="{{ $p->nama_properti }}"
                                >
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="masukan-harga">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input
                                        class="form-control"
                                        id="masukan-harga"
                                        name="harga"
                                        type="text"
                                        value="{{ $p->harga }}"
                                    >
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pemilih-status">Status</label>
                                <select class="form-control" id="pemilih-status" name="status">
                                    <option @selected($p->status === 'Siap')>Siap</option>
                                    <option @selected($p->status === 'Tertunda')>Tertunda</option>
                                    <option @selected($p->status === 'Terjual')>Terjual</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="area-teks-status">Alamat</label>
                                <textarea
                                    class="form-control"
                                    id="area-teks-status"
                                    name="alamat"
                                >{{ $p->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="area-teks-deskripsi">Deskripsi</label>
                                <textarea
                                    class="form-control"
                                    id="area-teks-deskripsi"
                                    name="deskripsi"
                                >{{ $p->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="masukan-luas">Luas</label>
                                        <input
                                            class="form-control"
                                            id="masukan-luas"
                                            name="luas"
                                            type="number"
                                            value="{{ $p->luas }}"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="masukan-garasi">Garasi</label>
                                        <input
                                            class="form-control"
                                            id="masukan-garasi"
                                            name="garasi"
                                            type="number"
                                            value="{{ $p->jumlah_garasi }}"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="masukan-kamar-tidur">Kamar Tidur</label>
                                        <input
                                            class="form-control"
                                            id="masukan-kamar-tidur"
                                            name="kamar-tidur"
                                            type="number"
                                            value="{{ $p->jumlah_kamar_tidur }}"
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="masukan-kamar-mandi">Kamar Mandi</label>
                                        <input
                                            class="form-control"
                                            id="masukan-kamar-mandi"
                                            name="kamar-mandi"
                                            type="number"
                                            value="{{ $p->jumlah_kamar_mandi }}"
                                        >
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="masukan-lantai">Lantai</label>
                                        <input
                                            class="form-control"
                                            id="masukan-lantai"
                                            name="lantai"
                                            type="number"
                                            value="{{ $p->jumlah_lantai }}"
                                        >
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
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
            $('#tabel-properti').DataTable();
        });
    </script>
@endpush
