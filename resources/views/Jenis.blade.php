@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Jenis Aset</b></h5>
    </header>
    <hr>
    <div class="p-4">
        <div id="wrap-button">
            <button type="button" class="btn btn-main" data-toggle="modal" data-target="#modalTambah">
                Tambah Jenis Aset
            </button>
        </div>
        @if (session('success'))
            <hr>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%;padding: 0px;">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis</th>
                    <th>Kode Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($jenis as $test)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td scope="row">{{ $test->nama_jenis }}</td>
                        <td scope="row">{{ $test->kode_jenis }}</td>
                        <td>
                            <a href="{{ route('jenis.edit', $test) }}" class="badge badge-warning m-2"><i
                                    class="fas fa-fw fa-edit"></i> Edit</a>

                            <form class="d-inline" action="{{ route('jenis.delete', $test) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="badge badge-danger m-2"><i class="fas fa-fw fa-trash"></i>
                                    Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tfoot>
        </table>
    </div>
    {{-- modal input data --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jenis Aset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('jenis.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_jenis">Nama Jenis :</label>
                            <input type="text" value="{{ old('nama_jenis') }}" class="form-control" name="nama_jenis"
                                placeholder="nama jenis" autocomplete="off">
                            @error('nama_jenis')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kode_jenis">Kode Jenis :</label>
                            <input type="text" class="form-control" name="kode_jenis" placeholder="kode jenis"
                                autocapitalize="off">
                            @error('kode_jenis')
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
