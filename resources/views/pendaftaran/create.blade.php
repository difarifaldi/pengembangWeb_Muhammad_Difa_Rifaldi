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
                                    <li class="breadcrumb-item"><a href="/"><i class='bx bx-home-alt'></i></a>
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
                                        <form id="pendaftaran-form" action="{{ route('pendaftaran.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                            value="{{ old('nama_lengkap') }}"
                                                            placeholder="Masukan Nama Lengkap" />
                                                        <!-- error message untuk nama_lengkap -->
                                                        @error('nama_lengkap')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Alamat KTP</label>
                                                        <input type="text" name="alamat_ktp" id="alamat_ktp"
                                                            class="form-control @error('alamat_ktp') is-invalid @enderror"
                                                            value="{{ old('alamat_ktp') }}"
                                                            placeholder="Masukan Alamat KTP" />
                                                        <!-- error message untuk alamat_ktp -->
                                                        @error('alamat_ktp')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Alamat Lengkap Saat Ini</label>
                                                        <input type="text" name="alamat_saat_ini" id="alamat_saat_ini"
                                                            class="form-control @error('alamat_saat_ini') is-invalid @enderror"
                                                            value="{{ old('alamat_saat_ini') }}"
                                                            placeholder="Masukan Alamat Saat Ini" />
                                                        <!-- error message untuk alamat_saat_ini -->
                                                        @error('alamat_saat_ini')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Kecamatan</label>
                                                        <input type="text" name="kecamatan" id="kecamatan"
                                                            class="form-control @error('kecamatan') is-invalid @enderror"
                                                            value="{{ old('kecamatan') }}"
                                                            placeholder="Masukan Kecamatan" />
                                                        <!-- error message untuk kecamatan -->
                                                        @error('kecamatan')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Provinsi</label>
                                                        <select name="id_provinsi" id="id_provinsi" class="single-select"
                                                            onchange="fetchKabupatenKota(this.value)">
                                                            <option value="">Silahkan Pilih Provinsi</option>
                                                            @foreach ($provinsi as $prov)
                                                                <option value="{{ $prov->id }}"
                                                                    {{ old('id_provinsi') == $prov->id ? 'selected' : '' }}>
                                                                    {{ $prov->nama_provinsi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Kabupaten/Kota</label>
                                                        <select name="id_kabupaten_kota_alamat"
                                                            id="id_kabupaten_kota_alamat" class="single-select">
                                                            <option value="">Silahkan Pilih Kabupaten/Kota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Nomor Telepon</label>
                                                        <input type="text" name="nomor_telepon" id="nomor_telepon"
                                                            class="form-control @error('nomor_telepon') is-invalid @enderror"
                                                            value="{{ old('nomor_telepon') }}"
                                                            placeholder="Masukan Nomor Telepon" />
                                                        <!-- error message untuk nomor_telepon -->
                                                        @error('nomor_telepon')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Nomor HP</label>
                                                        <input type="text" name="nomor_hp" id="nomor_hp"
                                                            class="form-control @error('nomor_hp') is-invalid @enderror"
                                                            value="{{ old('nomor_hp') }}" placeholder="Masukan Nomor HP" />
                                                        <!-- error message untuk nomor_hp -->
                                                        @error('nomor_hp')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" placeholder="Masukan Email" />
                                                        <!-- error message untuk email -->
                                                        @error('email')
                                                            <div class="d-block text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mt-4">
                                                        <label>Kewarganegaraan</label>
                                                        <select name="kewarganegaraan" id="kewarganegaraan"
                                                            class="single-select">
                                                            <option value="">Silahkan Pilih Kewarganegaraan</option>
                                                            <option value="WNI Asli">
                                                                WNI Asli
                                                            </option>
                                                            <option value="WNI Keturunan">
                                                                WNI Keturunan
                                                            </option>
                                                            <option value="WNA">
                                                                WNA
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
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

    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ $message }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <script>
        function fetchKabupatenKota(provinsiId) {
            var kabupatenKotaSelect = document.getElementById('id_kabupaten_kota_alamat');

            // Kosongkan dropdown Kabupaten/Kota
            kabupatenKotaSelect.innerHTML = '<option value="">Silahkan Pilih Kabupaten/Kota</option>';

            if (provinsiId) {
                fetch(`/getKabupatenKota/${provinsiId}`)
                    .then(response => response.json())
                    .then(data => {
                        for (const id in data) {
                            const option = document.createElement('option');
                            option.value = id;
                            option.textContent = data[id];
                            kabupatenKotaSelect.appendChild(option);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>
@endsection
