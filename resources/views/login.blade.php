@extends('layouts.main')
@section('section')

    <body class="bg-login">
        <!-- wrapper -->
        <div class="wrapper">
            <div class="section-authentication-login d-flex align-items-center justify-content-center">

                <div class="col-10 col-lg-8 mx-auto">
                    <div class="card radius-15 " style="background-color: #f0f8ff;">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5">
                                    <div class="text-center">
                                        <h3 class="mt-4 font-weight-bold text-success">Sistem Mahasiswa Baru</h3>
                                    </div>
                                    <form action="{{ route('login.post') }}" method="POST">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                placeholder="Masukan Username" />
                                        </div>

                                        <div class="form-group ">
                                            <label>Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input
                                                    class="form-control border-right-0 @error('password') is-invalid @enderror"
                                                    type="password" name="password" id="password"
                                                    placeholder="Masukan Password">
                                                <div class="input-group-append bg-white">
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
                                            <button type="submit" class="btn btn-success btn-block">Log In</button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <img src="assets/images/login-images/login4.jpg" class="card-img login-img w-full">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>

            </div>
        </div>

        <!-- end wrapper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

        <!-- Example using SweetAlert2 for notifications -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @if ($message = Session::get('failed'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '{{ $message }}',
                    showConfirmButton: true,
                    timer: null
                });
            </script>
        @endif

        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

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
    </body>
@endsection
