@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Pengguna Aset Peeorangan</b></h5>
    </header>
    <hr>
    <div class="px-4">
        @if (session('success'))
            <hr>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h5>Pengguna : <b>{{ $pengguna->nama_pengguna }}</b></h5>
        <hr>
        <table id="tablePrint" class="table table-striped table-bordered" style="width:100%;padding: 0px; margin-left: 10;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Aset</th>
                    <th>Jenis Barang</th>
                    <th>Merk Barang</th>
                    <th>Tgl Peroleh</th>
                    <th>Asal Perolehan</th>
                    <th>Rupiah Aset</th>
                    <th>Pengguna</th>
                    <th>Kondisi</th>
                    <th>Image</th>
                    <th>Aksi</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($items as $aset)
                    <tr>
                        <td class="align-middle" scope="row">{{ $loop->iteration }}</td>

                        <td class="align-middle" scope="row">{{ $aset->jenis->kode_jenis }} - {{ $aset->no_aset }}</td>
                        <td class="align-middle" scope="row">{{ $aset->jenis->nama_jenis }}</td>
                        <td class="align-middle" scope="row">{{ $aset->merk_barang }}</td>
                        <td class="align-middle" scope="row">{{ $aset->tgl_aset }}</td>
                        <td class="align-middle" scope="row">{{ $aset->asal_perolehan }}</td>
                        <td class="align-middle" scope="row">{{ $aset->rupiah_aset }}</td>
                        <td class="align-middle" scope="row">{{ $aset->pengguna->nama_pengguna }} (
                            {{ $aset->pengguna->status }} )
                        </td>

                        <td class="align-middle" scope="row">{{ $aset->kondisi }}</td>
                        <td class="align-middle" scope="row"><img src="{{ asset('image/' . $aset->image) }}"
                                height="50px" />
                        </td>
                        <td class="align-middle">

                            <a href="{{ route('inventaris.edit', $aset) }}" class="badge badge-warning m-2"><i
                                    class="fas fa-fw fa-edit"></i> Edit</a>

                            <form class="d-inline" action="{{ route('inventaris.delete', $aset) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="badge badge-danger m-2"><i class="fas fa-fw fa-trash"></i>
                                    Hapus</button>
                            </form>
                            {{-- <a data-code="{{ $aset->jenis->kode_jenis }} - {{ $aset->no_aset }}"
                                class="badge badge-secondary getQR" data-toggle="modal" data-target="#showQR">QR</a> --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
