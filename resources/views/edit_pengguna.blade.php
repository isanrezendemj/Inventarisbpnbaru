@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Edit Pengguna</b></h5>
    </header>

    <br>

    <div class="p-4">
        <form method="POST" action="{{ route('pengguna.update', $pengguna) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama_pengguna" class="col-2">Nama Pengguna:</label>
                <div class="col-10">
                    <input type="text" value="{{ $pengguna->nama_pengguna }}" class="form-control" name="nama_pengguna"
                        placeholder="Nama Aset">
                </div>
            </div>

            <div class="form-group row">
                <label for="nip" class="col-2">Nip / No Bidang:</label>
                <div class="col-10">
                    <input type="text" value="{{ $pengguna->nip }}" class="form-control" name="nip"
                        placeholder="Nama Aset">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-2">No Hp:</label>
                <div class="col-10">
                    <input type="text" value="{{ $pengguna->no_hp }}" class="form-control" name="no_hp"
                        placeholder="Nama Aset">
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-2">Status:</label>
                <div class="col-10">
                    <select type="text" name="status" id="status" id="kondisi" class="form-control">
                        <option value="Pegawai">Pegawai</option>
                        <option value="Kontrak">Kontrak</option>
                        <option value="Bidang">Bidang</option>

                    </select>
                    <script>
                        $("#kondisi").val("{{ $pengguna->status }}");
                    </script>
                </div>
            </div>


            <button type="submit" style="background-color:#452414; color:white;">Simpan</button>
        </form>
    </div>
@endsection
