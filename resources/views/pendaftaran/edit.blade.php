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
                                            <form id="pendaftaran-form"
                                                action="{{ route('pendaftaran.update', ['user' => $user->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                                value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
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
                                                                value="{{ old('alamat_ktp', $user->alamat_ktp) }}"
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
                                                            <input type="text" name="alamat_saat_ini"
                                                                id="alamat_saat_ini"
                                                                class="form-control @error('alamat_saat_ini') is-invalid @enderror"
                                                                value="{{ old('alamat_saat_ini', $user->alamat_saat_ini) }}"
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
                                                                value="{{ old('kecamatan', $user->kecamatan) }}"
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
                                                            <select name="id_provinsi_alamat" id="id_provinsi_alamat"
                                                                class="single-select"
                                                                onchange="fetchKabupatenKota(this.value)">
                                                                <option value="">Silahkan Pilih Provinsi</option>
                                                                @foreach ($provinsi as $prov)
                                                                    <option value="{{ $prov->id }}"
                                                                        {{ old('id_provinsi_alamat', $user->id_provinsi_alamat) == $prov->id ? 'selected' : '' }}>
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
                                                                <option value="">Silahkan Pilih Kabupaten/Kota
                                                                </option>
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
                                                                value="{{ old('nomor_telepon', $user->nomor_telepon) }}"
                                                                placeholder="Masukan Nomor Telepon" pattern="\d*"
                                                                minlength="10" maxlength="15" />
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
                                                                value="{{ old('nomor_hp', $user->nomor_hp) }}"
                                                                placeholder="Masukan Nomor HP" pattern="\d*" minlength="12"
                                                                maxlength="15" />
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
                                                                value="{{ old('email', $user->email) }}"
                                                                placeholder="Masukan Email" />
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
                                                                class="single-select"
                                                                onchange="handleKewarganegaraanChange()">
                                                                <option value="">Silahkan Pilih Kewarganegaraan
                                                                </option>
                                                                <option value="WNI Asli"
                                                                    {{ old('kewarganegaraan', $user->kewarganegaraan) == 'WNI Asli' ? 'selected' : '' }}>
                                                                    WNI Asli
                                                                </option>
                                                                <option value="WNI Keturunan"
                                                                    {{ old('kewarganegaraan', $user->kewarganegaraan) == 'WNI Keturunan' ? 'selected' : '' }}>
                                                                    WNI Keturunan
                                                                </option>
                                                                <option value="WNA"
                                                                    {{ old('kewarganegaraan', $user->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>
                                                                    WNA
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" id="negara-asal-row" style="display: none;">
                                                    <div class="col-6">
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Negara Asal</label>
                                                            <input type="text" name="negara_asal" id="negara_asal"
                                                                class="form-control @error('negara_asal') is-invalid @enderror"
                                                                value="{{ old('negara_asal', $user->negara_asal) }}"
                                                                placeholder="Masukan Negara Asal" />
                                                            <!-- error message untuk negara_asal -->
                                                            @error('negara_asal')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" class="form-control"
                                                                name="tanggal_lahir"
                                                                value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">

                                                            @error('tanggal_lahir')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Tempat Lahir</label>
                                                            <select name="tempat_lahir" id="tempat_lahir"
                                                                class="single-select"
                                                                onchange="toggleLahirFields(this.value)">
                                                                <option value="">Silahkan Pilih Tempat Lahir</option>
                                                                <option value="Dalam Negeri"
                                                                    {{ old('tempat_lahir', $user->tempat_lahir) == 'Dalam Negeri' ? 'selected' : '' }}>
                                                                    Dalam Negeri
                                                                </option>
                                                                <option value="Luar Negeri"
                                                                    {{ old('tempat_lahir', $user->tempat_lahir) == 'Luar Negeri' ? 'selected' : '' }}>
                                                                    Luar Negeri
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row" id="provinsi-kota-row" style="display: none;">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Provinsi Lahir</label>
                                                            <select name="id_provinsi_lahir" id="id_provinsi_lahir"
                                                                class="single-select"
                                                                onchange="fetchKabupatenKotaLahir(this.value)">
                                                                <option value="">Silahkan Pilih Provinsi</option>
                                                                @foreach ($provinsi as $prov)
                                                                    <option value="{{ $prov->id }}"
                                                                        {{ old('id_provinsi_lahir', $user->id_provinsi_lahir) == $prov->id ? 'selected' : '' }}>
                                                                        {{ $prov->nama_provinsi }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Kabupaten/Kota Lahir</label>
                                                            <select name="id_kabupaten_kota_lahir"
                                                                id="id_kabupaten_kota_lahir" class="single-select">
                                                                <option value="">Silahkan Pilih Kabupaten/Kota
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" id="negara-lahir-row" style="display: none;">
                                                    <div class="col-6">

                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Negara Lahir</label>
                                                            <input type="text" name="negara_lahir" id="negara_lahir"
                                                                class="form-control @error('negara_lahir') is-invalid @enderror"
                                                                value="{{ old('negara_lahir', $user->negara_lahir) }}"
                                                                placeholder="Masukan Negara Lahir" />
                                                            @error('negara_lahir')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Jenis Kelamin</label> <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jenis_kelamin" id="pria" value="Pria"
                                                                    {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Pria' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="pria">
                                                                    Pria
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jenis_kelamin" id="wanita" value="Wanita"
                                                                    {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Wanita' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="wanita">
                                                                    Wanita
                                                                </label>
                                                            </div>
                                                            <!-- error message untuk jenis_kelamin -->
                                                            @error('jenis_kelamin')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Status Menikah</label> <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status_menikah" id="belum_menikah"
                                                                    value="Belum Menikah"
                                                                    {{ old('status_menikah', $user->status_menikah) == 'Belum Menikah' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="belum_menikah">
                                                                    Belum Menikah
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status_menikah" id="menikah" value="Menikah"
                                                                    {{ old('status_menikah', $user->status_menikah) == 'Menikah' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="menikah">
                                                                    Menikah
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status_menikah" id="lain_lain"
                                                                    value="Lain-lain (janda/duda)"
                                                                    {{ old('status_menikah', $user->status_menikah) == 'Lain-lain (janda/duda)' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="lain_lain">
                                                                    Lain-lain (janda/duda)
                                                                </label>
                                                            </div>
                                                            <!-- error message untuk status_menikah -->
                                                            @error('status_menikah')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Agama</label>
                                                            <select name="id_agama" id="id_agama"
                                                                class="single-select @error('id_agama') is-invalid @enderror">
                                                                <option value="">Silahkan Pilih Agama</option>
                                                                @foreach ($agama as $agm)
                                                                    <option value="{{ $agm->id }}"
                                                                        {{ old('id_agama', $user->id_agama) == $agm->id ? 'selected' : '' }}>
                                                                        {{ $agm->nama_agama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Nilai Matematika</label>
                                                            <input type="text" name="nilai_mtk" id="nilai_mtk"
                                                                class="form-control @error('nilai_mtk') is-invalid @enderror"
                                                                value="{{ old('nilai_mtk', $user->nilai_mtk) }}"
                                                                placeholder="Masukan Nilai Matematika" />
                                                            <!-- error message untuk nilai_mtk -->
                                                            @error('nilai_mtk')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Nilai Bahasa Indonesia</label>
                                                            <input type="text" name="nilai_bindo" id="nilai_bindo"
                                                                class="form-control @error('nilai_bindo') is-invalid @enderror"
                                                                value="{{ old('nilai_bindo', $user->nilai_bindo) }}"
                                                                placeholder="Masukan Nilai Bahasa Indonesia" />
                                                            <!-- error message untuk nilai_bindo -->
                                                            @error('nilai_bindo')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label>Nilai Bahasa Inggris</label>
                                                            <input type="text" name="nilai_bing" id="nilai_bing"
                                                                class="form-control @error('nilai_bing') is-invalid @enderror"
                                                                value="{{ old('nilai_bing', $user->nilai_bing) }}"
                                                                placeholder="Masukan Nilai Bahasa Inggris" />
                                                            <!-- error message untuk nilai_bing -->
                                                            @error('nilai_bing')
                                                                <div class="d-block text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group mt-4">
                                                            <label class="d-block">Foto Formal</label>
                                                            @if ($user->foto)
                                                                <img src="{{ asset('/storage/' . $user->foto) }}"
                                                                    class="img-preview img-fluid mb-3 col-sm-3">
                                                            @else
                                                                <img src="{{ asset('../assets/images/user.png') }}"
                                                                    class="img-preview img-fluid mb-3 col-sm-3">
                                                            @endif
                                                            <img class="img-preview img-fluid col-md-3 mb-3">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    name="foto" id="foto"
                                                                    aria-describedby="inputGroupFileAddon01"
                                                                    onchange="previewImage()">
                                                                <label class="custom-file-label" for="foto">Masukan
                                                                    Foto</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="btn-group mt-3 w-25">
                                                    <button type="submit" class="btn btn-primary"> <span>Simpan</span> <i
                                                            class="bi bi-arrow-right-square"></i></button>
                                                </div>
                                                <div class="btn-group mt-3 w-25">
                                                    <a href="{{ route('pendaftaran.export-pdf', ['id_user' => $user->id]) }}"
                                                        class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i>
                                                        <span>Export
                                                            PDF</span> </a>
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
            document.addEventListener('DOMContentLoaded', function() {
                const provinsiId = document.getElementById('id_provinsi_alamat').value;
                const kabupatenKotaId = "{{ old('id_kabupaten_kota_alamat', $user->id_kabupaten_kota_alamat) }}";
                const kabupatenKotaLahirId = "{{ old('id_kabupaten_kota_lahir', $user->id_kabupaten_kota_lahir) }}";

                // Memuat dropdown Kabupaten/Kota saat halaman dimuat
                fetchKabupatenKota(provinsiId, kabupatenKotaId);
                fetchKabupatenKotaLahir(provinsiId, kabupatenKotaLahirId);
            });

            function fetchKabupatenKota(provinsiId, selectedKabupatenKotaId = '') {
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
                                // Set option sebagai terpilih jika id-nya sesuai
                                if (id == selectedKabupatenKotaId) {
                                    option.selected = true;
                                }
                                kabupatenKotaSelect.appendChild(option);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            function fetchKabupatenKotaLahir(provinsiId, selectedKabupatenKotaLahirId = '') {
                var kabupatenKotaLahirSelect = document.getElementById('id_kabupaten_kota_lahir');

                // Kosongkan dropdown Kabupaten/Kota
                kabupatenKotaLahirSelect.innerHTML = '<option value="">Silahkan Pilih Kabupaten/Kota</option>';

                if (provinsiId) {
                    fetch(`/getKabupatenKota/${provinsiId}`)
                        .then(response => response.json())
                        .then(data => {
                            for (const id in data) {
                                const option = document.createElement('option');
                                option.value = id;
                                option.textContent = data[id];
                                if (id == selectedKabupatenKotaLahirId) {
                                    option.selected = true;
                                }
                                kabupatenKotaLahirSelect.appendChild(option);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            }
        </script>

        <script>
            function handleKewarganegaraanChange() {
                var kewarganegaraanSelect = document.getElementById('kewarganegaraan');
                var negaraAsalRow = document.getElementById('negara-asal-row');
                var negaraAsalInput = document.getElementById('negara_asal');

                if (kewarganegaraanSelect.value === 'WNA') {
                    negaraAsalRow.style.display = 'flex';
                } else {
                    negaraAsalRow.style.display = 'none';
                    negaraAsalInput.value = 'Indonesia';
                }
            }

            // Panggil fungsi ini saat halaman dimuat ulang untuk mengatur ulang tampilan negara asal jika WNA dipilih sebelumnya
            document.addEventListener('DOMContentLoaded', function() {
                handleKewarganegaraanChange();
            });

            function toggleLahirFields(tempatLahir) {
                var provinsiKotaRow = document.getElementById('provinsi-kota-row');
                var negaraLahirRow = document.getElementById('negara-lahir-row');
                var negaraLahirInput = document.getElementById('negara_lahir');

                if (tempatLahir === 'Dalam Negeri') {
                    provinsiKotaRow.style.display = 'flex';
                    negaraLahirRow.style.display = 'none';
                    negaraLahirInput.value = 'Indonesia';
                } else if (tempatLahir === 'Luar Negeri') {
                    provinsiKotaRow.style.display = 'none';
                    negaraLahirRow.style.display = 'flex';

                } else {
                    provinsiKotaRow.style.display = 'none';
                    negaraLahirRow.style.display = 'none';
                }
            }

            // Panggil fungsi ini saat halaman dimuat untuk mengatur tampilan yang benar jika tempat lahir sudah dipilih sebelumnya
            document.addEventListener('DOMContentLoaded', function() {
                var tempatLahir = document.getElementById('tempat_lahir').value;
                toggleLahirFields(tempatLahir);
            });
        </script>
        <script>
            function previewImage() {
                const image = document.querySelector("#foto");
                const imgPreview = document.querySelector(".img-preview");

                imgPreview.style.display = 'block';

                const lihatgambar = URL.createObjectURL(image.files[0]);
                imgPreview.src = lihatgambar;
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var nomorTeleponInput = document.getElementById('nomor_telepon');
                var nomorHpInput = document.getElementById('nomor_hp');

                function validateInput(event) {
                    var input = event.target;
                    // Menghapus karakter non-angka
                    input.value = input.value.replace(/\D/g, '');

                    // Memeriksa panjang minimal
                    if (input.id === 'nomor_telepon' && input.value.length < 10) {
                        input.setCustomValidity('Nomor Telepon harus terdiri dari minimal 10 angka.');
                    } else if (input.id === 'nomor_hp' && input.value.length < 12) {
                        input.setCustomValidity('Nomor HP harus terdiri dari minimal 12 angka.');
                    } else {
                        input.setCustomValidity('');
                    }
                }

                nomorTeleponInput.addEventListener('input', validateInput);
                nomorHpInput.addEventListener('input', validateInput);
            });
        </script>
    @endsection
