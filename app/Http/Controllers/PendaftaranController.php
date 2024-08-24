<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function index()
    {
        $users = User::whereNotNull('nama_lengkap')->get();
        return view('pendaftaran.index', compact('users'));
    }
    public function edit()
    {
        $provinsi = Provinsi::all();
        $agama = Agama::all();
        return view('pendaftaran.edit', compact('provinsi', 'agama'));
    }

    public function getKabupatenKota($id_provinsi)
    {
        $kabupatenKota = KabupatenKota::where('id_provinsi', $id_provinsi)->pluck('nama_kabupaten_kota', 'id');
        return response()->json($kabupatenKota);
    }



    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validasi data pendaftaran
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'alamat_ktp' => 'required',
                'kecamatan' => 'required',
                'id_kabupaten_kota_alamat' => 'required',
                'id_provinsi_alamat' => 'required',
                'alamat_saat_ini' => 'required',
                'nomor_telepon' => 'required',
                'nomor_hp' => 'required',
                'email' => 'required|email|unique:users',
                'kewarganegaraan' => 'required',
                'negara_asal' => 'required',
                'tanggal_lahir' => 'required|date_format:Y-m-d|before_or_equal:2006-12-31',
                'tempat_lahir' => 'required',
                'id_kabupaten_kota_lahir' => 'nullable',
                'id_provinsi_lahir' => 'nullable',
                'negara_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'status_menikah' => 'required',
                'id_agama' => 'required',
                'nilai_mtk' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'nilai_bindo' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'nilai_bing' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'foto' => 'required|image|file|max:1024',
            ]);

            // Menghitung nilai rata-rata
            $nilai_mtk = $validatedData['nilai_mtk'];
            $nilai_bindo = $validatedData['nilai_bindo'];
            $nilai_bing = $validatedData['nilai_bing'];
            $nilai_rata = ($nilai_mtk + $nilai_bindo + $nilai_bing) / 3;

            // Menyimpan foto
            if ($request->file('foto')) {
                $validatedData['foto'] = $request->file('foto')->store('foto', 'public');
            }

            // Membuat pengguna baru dengan data yang sudah divalidasi
            $user = User::create([
                'nama_lengkap' => $validatedData['nama_lengkap'],
                'alamat_ktp' => $validatedData['alamat_ktp'],
                'kecamatan' => $validatedData['kecamatan'],
                'id_kabupaten_kota_alamat' => $validatedData['id_kabupaten_kota_alamat'],
                'id_provinsi_alamat' => $validatedData['id_provinsi_alamat'],
                'alamat_saat_ini' => $validatedData['alamat_saat_ini'],
                'nomor_telepon' => $validatedData['nomor_telepon'],
                'nomor_hp' => $validatedData['nomor_hp'],
                'email' => $validatedData['email'],
                'kewarganegaraan' => $validatedData['kewarganegaraan'],
                'negara_asal' => $validatedData['negara_asal'],
                'tanggal_lahir' => $validatedData['tanggal_lahir'],
                'tempat_lahir' => $validatedData['tempat_lahir'],
                'id_kabupaten_kota_lahir' => $validatedData['id_kabupaten_kota_lahir'],
                'id_provinsi_lahir' => $validatedData['id_provinsi_lahir'],
                'negara_lahir' => $validatedData['negara_lahir'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'status_menikah' => $validatedData['status_menikah'],
                'id_agama' => $validatedData['id_agama'],
                'nilai_mtk' => $nilai_mtk,
                'nilai_bindo' => $nilai_bindo,
                'nilai_bing' => $nilai_bing,
                'nilai_rata' => $nilai_rata,
                'foto' => $validatedData['foto'],
            ]);

            DB::commit();

            return redirect()->route('pendaftaran.index')->with('success', 'Berhasil menambahkan akun mahasiswa baru');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
