<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #ffffff;
            /* Warna latar belakang halaman */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            /* Warna latar belakang tabel */
            border: 1px solid #ffffff;
            /* Border tabel */
            border-radius: 8px;
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #ffffff;
        }

        .table tr:nth-child(even) {
            background-color: #ffffff;
        }

        .table tr:hover {
            background-color: #ffffff;
        }

        .table .label {
            width: 100px;
            font-weight: bold;
        }

        .table .data {
            text-align: left;
        }

        .table .photo {
            text-align: center;
            vertical-align: top;
            border-left: 2px solid #000;
            /* Border sebagai pembatas di sebelah kiri foto */
            padding-left: 20px;
        }

        .photo img {
            width: 3cm;
            height: 4cm;
            border-radius: 8px;
            border: 2px solid #000;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Formulir Pendaftaran Mahasiswa</h2>
    </div>

    <div class="table-container">
        <table class="table">
            <tr>
                <th class="label">Nama Lengkap</th>
                <td class="data">: {{ $user->nama_lengkap }}</td>
                <td class="photo" rowspan="19">
                    <!-- Gambar Foto -->
                    <?php
                    $fotoValue = $user->foto;
                    if ($fotoValue) {
                        $pathfoto = public_path('storage/' . $fotoValue);
                        if (file_exists($pathfoto)) {
                            $typefoto = pathinfo($pathfoto, PATHINFO_EXTENSION);
                            $datafoto = file_get_contents($pathfoto);
                            $base64foto = 'data:image/' . $typefoto . ';base64,' . base64_encode($datafoto);
                        } else {
                            echo 'File tidak ditemukan: ' . $pathfoto;
                        }
                    }
                    ?>
                    @isset($base64foto)
                        <img src="{{ $base64foto }}" class="logo-icon-2" alt="Foto Mahasiswa">
                    @endisset
                </td>
            </tr>
            <tr>
                <th class="label">Alamat KTP</th>
                <td class="data">: {{ $user->alamat_ktp }}</td>
            </tr>
            <tr>
                <th class="label">Kecamatan</th>
                <td class="data">: {{ $user->kecamatan }}</td>
            </tr>
            <tr>
                <th class="label">Kabupaten/Kota</th>
                <td class="data">: {{ $user->kabupatenKotaAlamat->nama_kabupaten_kota }}</td>
            </tr>
            <tr>
                <th class="label">Provinsi</th>
                <td class="data">: {{ $user->provinsiAlamat->nama_provinsi }}</td>
            </tr>
            <tr>
                <th class="label">Alamat Saat Ini</th>
                <td class="data">: {{ $user->alamat_saat_ini }}</td>
            </tr>
            <tr>
                <th class="label">Nomor Telepon</th>
                <td class="data">: {{ $user->nomor_telepon }}</td>
            </tr>
            <tr>
                <th class="label">Nomor HP</th>
                <td class="data">: {{ $user->nomor_hp }}</td>
            </tr>
            <tr>
                <th class="label">Email</th>
                <td class="data">: {{ $user->email }}</td>
            </tr>
            <tr>
                <th class="label">Kewarganegaraan</th>
                <td class="data">: {{ $user->kewarganegaraan }}</td>
            </tr>
            <tr>
                <th class="label">Negara Asal</th>
                <td class="data">: {{ $user->negara_asal }}</td>
            </tr>
            <tr>
                <th class="label">Tanggal Lahir</th>
                <td class="data">: {{ $user->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th class="label">Tempat Lahir</th>
                <td class="data">: {{ $user->tempat_lahir }}</td>
            </tr>
            <tr>
                <th class="label">Kabupaten/Kota Lahir</th>
                <td class="data">
                    : {{ $user->kabupatenKotaLahir ? $user->kabupatenKotaLahir->nama_kabupaten_kota : '-' }}</td>
            </tr>
            <tr>
                <th class="label">Provinsi Lahir</th>
                <td class="data">: {{ $user->provinsiLahir ? $user->provinsiLahir->nama_provinsi : '-' }}</td>
            </tr>
            <tr>
                <th class="label">Negara Lahir</th>
                <td class="data">: {{ $user->negara_lahir }}</td>
            </tr>
            <tr>
                <th class="label">Jenis Kelamin</th>
                <td class="data">: {{ $user->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th class="label">Status Menikah</th>
                <td class="data">: {{ $user->status_menikah }}</td>
            </tr>
            <tr>
                <th class="label">Agama</th>
                <td class="data">: {{ $user->agama->nama_agama }}</td>
            </tr>
            <tr>
                <th class="label">Nilai Matematika</th>
                <td class="data">: {{ $user->nilai_mtk }}</td>
            </tr>
            <tr>
                <th class="label">Nilai Bahasa Indonesia</th>
                <td class="data">: {{ $user->nilai_bindo }}</td>
            </tr>
            <tr>
                <th class="label">Nilai Bahasa Inggris</th>
                <td class="data">: {{ $user->nilai_bing }}</td>
            </tr>
            <tr>
                <th class="label">Nilai Rata-rata</th>
                <td class="data">: {{ $user->nilai_rata }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
