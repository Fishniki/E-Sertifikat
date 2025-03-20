<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index()
    {
        $nama = session('nama_peserta');

        if (!$nama) {
            return redirect()->route('home.user')->with('error', 'Silakan masukkan nama Anda.');
        }

        $peserta = Peserta::where('nama', $nama)->with('setting')->first();

        if (!$peserta) {
            return redirect()->route('home.user')->with('error', 'Sertifikat tidak ditemukan.');
        }

        return view('user.sertifikat', compact('peserta'));
    }

    public function backSertifikat()
    {
        session()->forget('nama_peserta');
        return redirect()->back();
    }
}
