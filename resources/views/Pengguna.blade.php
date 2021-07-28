@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Aset Pengguna Inventaris</b></h5>
    </header>
    <hr>
    <div class="p-4">
        <div id="wrap-button">
            <button type="button" class="btn btn-main" data-toggle="modal" data-target="#modalTambah">
                Tambah Pengguna
            </button>
        </div>
        @if (session('success'))
            <hr>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <hr>
        <table id="tablePengguna" class="table table-striped table-bordered" style="width:100%;padding: 0px;">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Nip/No Bidang</th>
                    <th>No Hp</th>
                    <th>Status</th>
                    <th>Item</th>
                    <th>Aksi</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($pengguna as $test)
                    <tr>
                        <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
                        <td class="align-middle" scope="row">{{ $test->nama_pengguna }}</td>
                        <td class="align-middle" scope="row">{{ $test->nip }}</td>
                        <td class="align-middle" scope="row">{{ $test->no_hp }}</td>
                        <td class="align-middle" scope="row">{{ $test->status }}</td>
                        <td class="align-middle" scope="row">{{ $test->Inventaris()->count() }}</td>
                        <td class="align-middle">
                            <a href="{{ route('pengguna.edit', $test) }}" class="badge badge-warning m-2"><i
                                    class="fas fa-fw fa-edit"></i> Edit</a>

                            <form class="d-inline" action="{{ route('pengguna.delete', $test) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="badge badge-danger m-2"><i class="fas fa-fw fa-trash"></i>
                                    Hapus</button>
                            </form>
                            <a href="{{ route('pengguna.detail', $test) }}" class="badge badge-primary m-2"><i
                                    class="fas fa-fw fa-info"></i> Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </tfoot>
        </table>
        {{-- </div><a href="{{ route('pengguna.edit', $test) }}" class="badge badge-warning m-2"><i class="fas fa-fw fa-edit"></i>
        update</a> --}}
        <!-- Modal -->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('pengguna.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pengguna">Nama Pengguna :</label>
                                <input type="text" value="{{ old('nama_pengguna') }}" class="form-control"
                                    name="nama_pengguna" placeholder="Nama Pengguna" autocomplete="off">
                                @error('nama_pengguna')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nip">Nip / No Bidang :</label>
                                <input type="text" value="{{ old('nip') }}" class="form-control" name="nip"
                                    placeholder="Nip / No Bidang" autocapitalize="off">
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Hp :</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="no hp"
                                    autocapitalize="off">
                                @error('no_hp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select type="text" name="status" id="status" class="form-control">
                                    <option value="">Pilih status</option>
                                    <option value="Pegawai">Pegawai</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Bidang">Bidang</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <script>
                                    $("#status").val("{{ old('status') }}");
                                </script>
                            </div>
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

            $(document).ready(function() {
                var table = $('#tablePengguna').DataTable({
                    order: [
                        [5, 'desc']
                    ]
                });
            });
        </script>

    @endsection
