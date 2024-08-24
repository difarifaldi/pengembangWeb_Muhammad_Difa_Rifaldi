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
    public function edit(User $user)
    {

        $provinsi = Provinsi::all();
        $agama = Agama::all();
        return view('pendaftaran.edit', compact('provinsi', 'agama', 'user'));
    }

    public function getKabupatenKota($id_provinsi)
    {
        $kabupatenKota = KabupatenKota::where('id_provinsi', $id_provinsi)->pluck('nama_kabupaten_kota', 'id');
        return response()->json($kabupatenKota);
    }



    public function update(Request $request, User $user)
    {
        DB::beginTransaction();

        try {
            // Validasi data
            $validatedData = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'alamat_ktp' => 'required',
                'kecamatan' => 'required',
                'id_kabupaten_kota_alamat' => 'required',
                'id_provinsi_alamat' => 'required',
                'alamat_saat_ini' => 'required',
                'nomor_telepon' => 'required',
                'nomor_hp' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
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
                'foto' => 'nullable|image|file|max:1024',
            ]);

            // Menghitung nilai rata-rata
            $nilai_mtk = $validatedData['nilai_mtk'];
            $nilai_bindo = $validatedData['nilai_bindo'];
            $nilai_bing = $validatedData['nilai_bing'];
            $nilai_rata = ($nilai_mtk + $nilai_bindo + $nilai_bing) / 3;

            // Menyimpan foto jika ada
            if ($request->file('foto')) {
                $validatedData['foto'] = $request->file('foto')->store('foto', 'public');
            }

            // Memperbarui data pengguna
            $user->update(array_merge($validatedData, ['nilai_rata' => $nilai_rata]));

            DB::commit();

            return redirect()->route('pendaftaran.index')->with('success', 'Berhasil memperbarui data mahasiswa');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
