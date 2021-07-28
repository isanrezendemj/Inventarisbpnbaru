@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Admin Mobile</b></h5>
    </header>
    <hr>
    <div class="p-4">
        <div id="wrap-button">
            <button type="button" class="btn btn-main" data-toggle="modal" data-target="#modalTambah">
                Tambah Admin Mobile
            </button>
        </div>
        @if (session('success'))
            <hr>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <table id="example" class="table table-bordered" style="width:100%;padding: 0px;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Kode Keamanan</th>
                    <th>Status</th>
                    <th>Aksi</th>


                </tr>
            </thead>

            <tbody>
                @foreach ($mobile as $test)
                    <tr class="@if ($test->status == 0) table-secondary @endif">
                        <td class="align-middle" scope="row">{{ $loop->iteration }}</td>

                        <td class="align-middle" scope="row">{{ $test->nama }}</td>
                        <td class="align-middle" scope="row">{{ $test->kode_akses }}</td>
                        <td class="align-middle font-weight-bold" scope="row">
                            {{ $test->status == 1 ? 'aktif' : 'nonaktif' }}</td>
                        <td class="align-middle">
                            @if ($test->status == 0)
                                <form class="d-inline" action="{{ route('mobile.toggle', $test) }}" method="post">
                                    @csrf
                                    <button class="btn btn-success px-4">
                                        <i class="fas mr-2 fa-fw fa-lock-open"></i>
                                        aktifkan</button>
                                </form>
                            @else
                                <form class="d-inline" action="{{ route('mobile.toggle', $test) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger px-4">
                                        <i class="fas mr-2 fa-fw fa-lock"></i>
                                        nonaktifkan</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tfoot>
        </table>

    </div>
    {{-- modal --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin Mobile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('mobile.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" value="{{ old('nama') }}" class="form-control" name="nama"
                                placeholder="nama" autocomplete="off">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kode_akses">Kode Keamanan :</label>
                            <input type="text" class="form-control" name="kode_akses" placeholder="Kode Keamanan"
                                autocapitalize="off">
                            @error('kode_akses')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-main">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if ($errors->any())
            $('#modalTambah').modal('show');
        @endif
    </script>



@endsection
