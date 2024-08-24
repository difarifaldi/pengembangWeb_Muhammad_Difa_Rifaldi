@extends('layouts.section')

@section('content')
    <!-- wrapper -->
    <div class="wrapper">
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pr-3">Forms</div>
                        <div class="pl-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="/user"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Pendaftaran Akun</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0 shadow-sm rounded">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="text-center my-4">Pendaftaran Akun</h4>
                                        </div>
                                        <hr />
                                        <!-- Formulir pendaftaran -->
                                        <form id="user-form" action="{{ route('user.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group mt-4">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    value="{{ old('username') }}" placeholder="Masukan Username" />
                                                <!-- error message untuk username -->
                                                @error('username')
                                                    <div class="d-block text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-4">
                                                <label>Password </span></label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input
                                                        class="form-control border-right-0 @error('password') is-invalid @enderror"
                                                        type="password" name="password" id="password"
                                                        placeholder="Masukan Password">
                                                    <div class="input-group-append">
                                                        <a href="javascript:;"
                                                            class="input-group-text bg-transparent border-left-0 @error('password') border-danger @enderror"
                                                            onclick="togglePasswordVisibility()">
                                                            <i class='bx bx-hide' id="password-icon"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- error message untuk password -->
                                                @error('password')
                                                    <div class="d-block text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <div class="btn-group mt-3 w-100">
                                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                            </div>
                                        </form>
                                        <!-- End Formulir pendaftaran -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('bx-hide');
                passwordIcon.classList.add('bx-show');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('bx-show');
                passwordIcon.classList.add('bx-hide');
            }
        }
    </script>
@endsection
