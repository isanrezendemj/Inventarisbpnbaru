@extends('layout/main')

@section('content')

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b style="padding-left: 20;"><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>
    <br>
    <div class="px-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded p-3" style="background-color: #272c33;">
                    <p style="color: white;">Inventaris</p>
                    <h1 class="text-center" style="background-color: #272c33; color: white;">{{ $Inventaris }}</h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded p-3" style="background-color: #272c33;">
                    <p style="color: white;">Jenis Inventaris</p>
                    <h1 class="text-center" style="background-color: #272c33; color: white;"> {{ $jenis }}</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded p-3" style="background-color: 	#272c33;">
                    <p style="color:white;">Pengguna Inventaris</p>
                    <h1 class="text-center" style="background-color: #272c33; color: white;">{{ $pengguna }}</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="card mt-5">
            <div class="card-header" style="background-color: #272c33; color: white;">
                Log Activity
            </div>
            <div class="card-body">

                @foreach ($logs as $log)
                    <blockquote class="blockquote mb-0">
                        <p>{{ $loop->iteration }} ) {!! html_entity_decode($log->aksi) !!}</p>
                        <footer class="blockquote-footer">{{ $log->nama }} <cite title="Source Title"
                                class="font-weight-bold">{{ $log->created_at }}</cite>
                        </footer>
                    </blockquote>
                    <hr>
                @endforeach

            </div>
        </div>
    </div>

@endsection
