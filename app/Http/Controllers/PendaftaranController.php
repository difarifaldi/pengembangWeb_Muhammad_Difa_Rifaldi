<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pendaftaran.index', compact('users'));
    }
    public function create()
    {
        $provinsi = Provinsi::all();
        $agama = Agama::all();
        return view('pendaftaran.create', compact('provinsi', 'agama'));
    }

    public function getKabupatenKota($id_provinsi)
    {
        $kabupatenKota = KabupatenKota::where('id_provinsi', $id_provinsi)->pluck('nama_kabupaten_kota', 'id');
        return response()->json($kabupatenKota);
    }

    public function store(){
        
    }
}
