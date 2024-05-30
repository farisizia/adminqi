@extends('struktur.dasar')
@section('judul', 'Properti')
@push('css')
    <link href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/management.css') }}" rel="stylesheet">
@endpush
@section('konten')
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-add_property" type="button">Tambah Properti</button>
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
                        <button class="btn btn-detail" type="button">Edit</button>
                        <button class="btn btn-danger" type="button">Hapus</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
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
