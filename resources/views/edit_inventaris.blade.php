@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Edit Data Inventaris</b></h5>
    </header>
    <br>
    <div class="p-4">
        <form method="POST" action="{{ route('inventaris.update', $inventaris) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="nama_aset" class="col-2">Nama Barang:</label>
                <div class="col-10">
                    <input type="text" readonly="true" value="{{ $inventaris->nama_aset }}" class="form-control"
                        name="nama_aset" placeholder="Nama Aset">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2" for="jenis_aset">Jenis Aset:</label>
                <div class="col-10">
                    <select id="jenis_aset" name="jenis_aset" class="custom-select">
                        <option selected disabled>Pilih Jenis Aset</option>
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                        @endforeach
                    </select>
                    @error('jenis_aset')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <script>
                        $("#jenis_aset").val("{{ $inventaris->jenis_id }}");
                    </script>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2" for="pengguna_aset">Pengguna Aset:</label>
                <div class="col-10">
                    <select id="pengguna_aset" name="pengguna_aset" class="custom-select">
                        <option selected disabled>Pilih Pengguna Aset</option>

                        @foreach ($pengguna as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pengguna }}</option>
                        @endforeach
                    </select>
                    @error('pengguna_aset')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <script>
                        $("#pengguna_aset").val("{{ $inventaris->pengguna_id }}");
                    </script>
                </div>
            </div>

            <div class="form-group row">
                <label for="No Aset" class="col-2">No Aset:</label>
                <div class="col-10">
                    <input type="text" readonly="true" value="{{ $inventaris->no_aset }}" class="form-control"
                        name="no_aset" placeholder="No Aset">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_peroleh" class="col-2">Tgl Peroleh:</label>
                <div class="col-10">
                    <input type="date" value="{{ $inventaris->tgl_aset }}" class="form-control" name="tgl_peroleh">
                </div>
            </div>

            <div class="form-group row">
                <label for="Asal Peroleh" class="col-2">Asal Peroleh:</label>
                <div class="col-10">
                    <input type="text" value="{{ $inventaris->asal_perolehan }}" class="form-control"
                        name="asal_perolehan" placeholder="asal_perolehan">
                </div>
            </div>

            <div class="form-group row">
                <label for="Rupiah Aset" class="col-2">Rupiah Aset:</label>
                <div class="col-10">
                    <input type="text" value="{{ $inventaris->rupiah_aset }}" class="form-control" name="rupiah_aset"
                        placeholder="Rupiah Aset">
                </div>
            </div>



            <div class="form-group row">
                <label for="Merk Barang" class="col-2">Merk Barang:</label>
                <div class="col-10">
                    <input type="text" value="{{ $inventaris->merk_barang }}" class="form-control" name="merk_barang"
                        placeholder="Merk Barang">
                </div>
            </div>

            <div class="form-group row">
                <label for="kondisi" class="col-2">Kondisi:</label>
                <div class="col-10">
                    <select type="text" name="kondisi" id="kondisi" class="form-control">
                        <option value="BAGUS">BAGUS</option>
                        <option value="RUSAK">RUSAK</option>

                    </select>
                    <script>
                        $("#kondisi").val("{{ $inventaris->kondisi }}");
                    </script>
                </div>
            </div>
            <div class="form-group row">
                <label for="Image" class="col-2">image :</label>

                <div class="col-2">
                    <img src="{{ asset('image/' . $inventaris->image) }}" class="img-fluid" />
                </div>
                <div class="col-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile">
                        <label class="custom-file-label" for="customFile">{{ $inventaris->image }}</label>
                    </div>

                </div>
            </div>
            <button type="submit" style="background-color:#452414; color:white;">Simpan</button>
        </form>
    </div>
@endsection
