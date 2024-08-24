@extends('layouts.section')
@section('content')
    <div class="wrapper">
        <div class="page-wrapper">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row p-3">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                                    <h2 class="font-weight-bold">
                                        Selamat Datang, {{ Auth::user()->username }} !
                                    </h2>
                                    <h5 class="font-weight-normal mb-0">
                                        Isi formulir pendaftaran untuk memulai perjalanan akademik Anda. <br>
                                        <span class="text-primary">Daftar Sekarang!</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
