@extends('layout/main')
@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px;">
        <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Inventaris</b></h5>
    </header>
    <hr>
    <div class="p-4">
        <div id="wrap-button">
            <button type="button" class="btn btn-main" data-toggle="modal" data-target="#modalTambah">
                Tambah Inventaris
            </button>
        </div>
        @if (session('success'))
            <hr>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
                @foreach ($inventaris as $aset)
                    <tr>
                        <td class="align-middle" scope="row">{{ $loop->iteration }}</td>

                        <td class="align-middle" scope="row">{{ $aset->jenis->kode_jenis }}-{{ $aset->no_aset }}</td>
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
                            <a data-code="{{ $aset->jenis->kode_jenis }}-{{ $aset->no_aset }}"
                                class="badge badge-secondary getQR" data-toggle="modal" data-target="#showQR">QR</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal input data-->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Inventaris</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inventaris.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_aset">Jenis Aset:</label>
                            <select id="jenis_aset" name="jenis_aset" class="custom-select">
                                <option selected disabled>Pilih Jenis Aset</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jenis }}</option>
                                @endforeach
                            </select>
                            @error('jenis_aset')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nama Barang">Nama Barang:</label>
                            <input type="text" class="form-control" value="{{ old('nama_barang') }}" name="nama_barang"
                                placeholder="Nama Barang" autocapitalize="off">
                            @error('nama_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Merk Barang">Merk Barang:</label>

                            <input type="text" class="form-control" value="{{ old('merk_barang') }}" name="merk_barang"
                                placeholder="Merk Barang" autocapitalize="off">
                            @error('merk_barang')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="pengguna_aset">Pengguna Aset:</label>
                            <select id="pengguna_aset" name="pengguna_aset" class="custom-select">
                                <option selected disabled>Pilih Pengguna Aset</option>

                                @foreach ($pengguna as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pengguna }}</option>
                                @endforeach
                            </select>
                            @error('pengguna_aset')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="Tgl Peroleh">Tgl Peroleh:</label>

                            <input type="Date" class="form-control" value="{{ old('tgl_aset') }}" name="tgl_aset"
                                placeholder="Tgl Peroleh" autocapitalize="off">
                            @error('tgl_aset')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="Asal Peroleh">Asal Peroleh:</label>

                            <input type="text" class="form-control" value="{{ old('asal_perolehan') }}"
                                name="asal_perolehan" placeholder="Asal Peroleh" autocapitalize="off">
                            @error('asal_perolehan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Rupiah Aset">Rupiah Aset:</label>

                            <input type="text" class="form-control" value="{{ old('rupiah_aset') }}" name="rupiah_aset"
                                placeholder="Rupiah Aset" id="rupiah" autocapitalize="off">
                            @error('rupiah_aset')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="Kondisi">Kondisi:</label>

                            <select type="text" name="kondisi" id="kondisi" class="form-control">
                                <option value="">Kondisi Barang</option>
                                <option value="BAGUS">BAGUS</option>
                                <option value="RUSAK">RUSAK</option>

                            </select>
                            @error('kondisi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <script>
                                $("#kondisi").val("{{ old('Kondisi') }}");
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="Image">image :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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

    <!-- Modal qr code-->
    <div class="modal fade" id="showQR" tabindex="-1" role="dialog" aria-labelledby="showQRLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showQRLabel">QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="capture" style="height: 100%" class=" modal-body d-flex justify-content-center align-items-center">
                    <div class="content" style="position: relative;">
                        <img src="{{ asset('qrLogo.png') }}" width="80" alt=""
                            style="position: absolute; top: 100px; left: 90px">
                        <div class="mt-3 mb-3" id="qrcode"></div>
                        <hr>
                        <h3 class="text-center mt-2 mb-3 codeValue">-</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <a id="ambilGambar" download="#" href="#" class="btn btn-success">Simpan</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var table = $('#tablePrint').DataTable({

            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7]
                    },
                }
            ]
        });

        table.buttons().container()
            .appendTo('#wrap-button');

        @if ($errors->any())
            $('#modalTambah').modal('show');
        @endif
        var qrcode = new QRCode("qrcode");

        $(".getQR").on('click', function() {
            $("#ambilGambar").addClass("disabled");
            let code = $(this).data('code')
                .toString(); ///code di ambil dri parameter data-code dan kemudian dibuat string
            //console.log(code);
            qrcode.makeCode(code); ///qr code di ambek dri var qr code  makecode merupakan method dri class QRCode
            $('.codeValue').html(code);

            // save image
            let sumber = document.querySelector("#capture");

            setTimeout(() => {
                html2canvas(sumber)
                    .then(canvas => {
                        let img = canvas.toDataURL("image/png");
                        //console.log(img);
                        $("#ambilGambar").attr("href", img);
                        $("#ambilGambar").attr("download", code + ".png");
                    });
                $("#ambilGambar").removeClass("disabled");
            }, 3000);

        })
    </script>
@endsection
