@extends('layout/main')

@section('content')
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Edit Jenis Aset</b></h5>
    </header>

    <br>

    <div class="p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('jenis.update', $jenis) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="kode_jenis" class="col-2">Kode Aset:</label>
                <div class="col-10">
                    <input type="text" value="{{ $jenis->kode_jenis }}" class="form-control" name="kode_jenis"
                        placeholder="masukan Kode jenis">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_jenis" class="col-2">Nama Aset:</label>
                <div class="col-10">
                    <input type="text" value="{{ $jenis->nama_jenis }}" class="form-control" name="nama_jenis"
                        placeholder="masukan Kode jenis">
                </div>
            </div>

            <button name="submit" type="submit" class="btn" style="background-color: #272c33;color: white;">Simpan</button>

        </form>

    </div>

@endsection
