@extends('layout/main')

@section('content')
<!-- Header -->
<header class="w3-container" style="padding-top:22px;">
    <h5><b style="padding-left: 20;"><i class="fa fa-users fa-fw"></i> Input Admin Mobile</b></h5>
</header>

<br>

<div class="container">
    <div class="container">

        <form action="{{ route('simpan-data-mobile') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="form-group row">
                <label for="nama" class="col-2">Nama:</label>
                <div class="col-10">
                    <input type="text" onkeypress="return angka(event)" class="form-control" name="nama"
                        placeholder="nama" required oninvalid="this.setCustomValidity('harap isikan Kode Bidang')"
                        oninput="this.setCustomValidity('')" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-2">Kode:</label>
                <div class="col-10">
                    <input type="text" onkeypress="return angka(event)"
                        class="form-control @error ('code') is-invalid @enderror" name="code" placeholder="Masukan code"
                        required oninvalid="this.setCustomValidity('harap isikan code')"
                        oninput="this.setCustomValidity('')" autocomplete="off">
                    <div class="invalid-feedback">
                        <b>Kode Keamanan!</b> yang anda masukkan sudah terdaftar
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-2">Status:</label>
                <div class="col-10">
                    <select type="text" name="Kondisi" class="form-control">
                        <option value="">Status</option>
                        <option value="active">active</option>
                        <option value="not active">not active</option>

                    </select>
                </div>
            </div>



            <button name="submit" type="submit" class="btn"
                style="background-color: #272c33;color: white;">Save</button>

        </form>
        <tbody>
        </tbody>
        </tfoot>
        </table>
    </div>
</div>

@endsection