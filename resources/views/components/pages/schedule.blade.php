@extends('components.template.layout')
@section('judul')
    Schedule
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush


@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/schedule.css') }}" />
    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-success" data-bs-target="#modal-tambah-jadwal" data-bs-toggle="modal" type="button">Add
            Schedule</button>
    </div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Property</th>
                <th>Name User</th>
                <th>Phone User</th>
                <th>Date Schedule</th>
                <th>Time Schedule</th>
                <th>PIC</th>
                <th>Note</th>
                <th>Status Schedule</th>
                <th>Action User</th>
            </tr>
        </thead>
        @if ($jadwal)
            <tbody>
                @foreach ($jadwal as $j)
                    <tr>
                        <td>{{ $j->properti->id }}</td>
                        <td>{{ $j->pengguna->name_user }}</td>
                        <td>{{ $j->pengguna->phone_user }}</td>
                        <td>{{ $j->tanggal }}</td>
                        <td>{{ $j->pukul }}</td>
                        <td>PIC</td>
                        <td>{{ $j->catatan }}</td>
                        <td>{{ $j->jadwal_diterima ? 'Accept' : 'Reject' }}</td>
                        <td>
                            <button type="button" class="btn btn-detail"
                                data-target="#modal-lihat-detail-jadwal-{{ $loop->iteration }}"
                                data-toggle="modal">Detail</button>
                            <a href="{{ route('schedule.destroy', ['id' => $j->id_jadwal]) }}" class="btn btn-delete">
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
    {{-- modal --}}
    <div class="fade modal" id="modal-tambah-jadwal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fs-5 modal-title">Property Schedule</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pemilih-pengguna">User</label>
                            <select class="form-control" id="pemilih-pengguna" name="pengguna">
                                <option selected>Choose user</option>
                                @foreach ($pengguna as $p)
                                    <option value="{{ $p->id }}">{{ $p->name_user }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pemilih-properti">Property</label>
                            <select class="form-control" id="pemilih-properti" name="properti">
                                <option selected>Choose property</option>
                                @foreach ($properti as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="masukan-tanggal">Date</label>
                            <input class="form-control" id="masukan-tanggal" name="tanggal" type="date">
                        </div>
                        <div class="mb-3">
                            <label for="masukan-pukul">Time</label>
                            <input class="form-control" id="masukan-pukul" name="pukul" type="time">
                        </div>
                        <div class="mb-3">
                            <label for="masukan-catatan">Note</label>
                            <input class="form-control" id="masukan-catatan" name="catatan" type="text">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 style="text-align: center;">P-01</h1>
                    <h1 style="text-align: center;">Rumah Jakarta Selatan</h1><br /><br />

                    <form>
                        <div class="mb-3">
                            <label style="font-weight:bold; padding-right: 20px; ">Name </label>
                            <label style="padding-left: 50px;">:</label>
                            <label>Robert Pattinson</label>
                        </div>
                        <div class="mb-3">
                            <label style="font-weight:bold">Phone Number : </label>
                            <label for="validationDefault01">012789690</label>
                        </div>
                        <div class="mb-3">
                            <label style="font-weight:bold">Data Schedule : </label>
                            <label for="validationDefault01">2024-04-25</label>
                        </div>
                        <div class="mb-3">
                            <label style="font-weight:bold">Time Schedule : </label>
                            <label for="validationDefault01">10:00</label>
                        </div>
                        <div class="mb-3">
                            <label style="font-weight:bold">PIC : </label>
                            <input type="text" class="form-control border border-dark" name="PIC">
                        </div>
                        <div class="mb-3">
                            <label style="font-weight:bold">Alamat : </label>
                            <textarea class="form-control border border-dark" rows="3" name="address"></textarea>
                        </div>
                        <button type="submit" class="btn btn-detail">Accept</button>
                        <button type="submit" class="btn btn-delete">Decline</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    @foreach ($jadwal as $j)
        <div class="fade modal" id="modal-lihat-detail-jadwal-{{ $loop->iteration }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fs-5 modal-title">Schedule</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Name</td>
                                    <td>:</td>
                                    <td>{{ $j->pengguna->name_user }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Phone User</td>
                                    <td>:</td>
                                    <td>{{ $j->pengguna->phone_user }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Schedule Property</td>
                                    <td>:</td>
                                    <td>{{ $j->tanggal }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Time Property</td>
                                    <td>:</td>
                                    <td>{{ $j->pukul }}</td>
                                </tr>
                                @if ($j->jadwal_diterima)
                                    <tr>
                                        <td class="font-weight-bold">PIC</td>
                                        <td>:</td>
                                        <td>{{ $j->pic }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Note</td>
                                        <td>:</td>
                                        <td>{{ $j->catatan }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if (!$j->jadwal_diterima)
                            <form action="{{ route('schedule.update', ['id' => $j->id_jadwal]) }}" method="post">
                                @csrf
                                @method('put')
                                <input name="id-jadwal" type="hidden" value="{{ $j->id_jadwal }}">
                                <div class="mb-3">
                                    <label class="form-label" for="masukan-pic">PIC</label>
                                    <input class="form-control" id="masukan-pic" name="pic" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="area-teks-catatan">Note</label>
                                    <textarea class="form-control" id="area-teks-catatan" name="catatan" rows="5"></textarea>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mr-1" type="submit">Accept</button>
                                    <button class="btn btn-danger" type="button">Decline</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- modal --}}
@endsection
