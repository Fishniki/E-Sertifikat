<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.form-setting');
    }

    public function save(Request $request)
    {
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'ceo'               => 'required|string|max:255',
            'nama_pengajar'     => 'required|string|max:255',
            'instansi_pengajar' => 'required|string|max:255',
            'tempat'            => 'required|string|max:255',
            'tanggal_sertifikat'=> 'required|date',
            'ttd_pimpinan'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ttd_pengajar'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Pastikan folder public/storage sudah ada
        if (!Storage::exists('public/ttd_pimpinan')) {
            Storage::makeDirectory('public/ttd_pimpinan');
        }
        if (!Storage::exists('public/ttd_pengajar')) {
            Storage::makeDirectory('public/ttd_pengajar');
        }

        // Simpan file ttd_pimpinan dan ttd_pengajar
        if ($request->hasFile('ttd_pimpinan') && $request->hasFile('ttd_pengajar')) {
            $ttdPimpinanPath = $request->file('ttd_pimpinan')->store('ttd_pimpinan', 'public');
            $ttdPengajarPath = $request->file('ttd_pengajar')->store('ttd_pengajar', 'public');
        } else {
            return redirect()->back()->withErrors(['msg' => 'File tanda tangan wajib diunggah']);
        }



        // Simpan ke database
        Setting::create([
            'ceo'               => $request->ceo,
            'nama_pengajar'     => $request->nama_pengajar,
            'instansi_pengajar' => $request->instansi_pengajar,
            'tempat'            => $request->tempat,
            'tanggal_sertifikat'=> $request->tanggal_sertifikat,
            'ttd_pimpinan'      => $ttdPimpinanPath,
            'ttd_pengajar'      => $ttdPengajarPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Sertifikat berhasil disimpan');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.edit-setting', compact('setting'));
    }

    public function savechanges(Request $request, $id)
    {
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'ceo'               => 'required|string|max:255',
            'nama_pengajar'     => 'required|string|max:255',
            'instansi_pengajar' => 'required|string|max:255',
            'tempat'            => 'required|string|max:255',
            'tanggal_sertifikat'=> 'required|date',
            'ttd_pimpinan'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ttd_pengajar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Ambil data lama
        $sertifikat = Setting::findOrFail($id);
    
        // Update data
        $sertifikat->ceo = $request->ceo;
        $sertifikat->nama_pengajar = $request->nama_pengajar;
        $sertifikat->instansi_pengajar = $request->instansi_pengajar;
        $sertifikat->tempat = $request->tempat;
        $sertifikat->tanggal_sertifikat = $request->tanggal_sertifikat;
    
        // Update tanda tangan jika ada file baru
        if ($request->hasFile('ttd_pimpinan')) {
            // Simpan path lama sebelum update
            $oldTtdPimpinan = $sertifikat->ttd_pimpinan;
        
            // Simpan file baru
            $sertifikat->ttd_pimpinan = $request->file('ttd_pimpinan')->store('ttd_pimpinan', 'public');
        
            // Hapus file lama setelah file baru tersimpan
            if ($oldTtdPimpinan && Storage::exists('public/' . $oldTtdPimpinan)) {
                Storage::delete('public/' . $oldTtdPimpinan);
            }
        }
        
        if ($request->hasFile('ttd_pengajar')) {
            $oldTtdPengajar = $sertifikat->ttd_pengajar;
        
            $sertifikat->ttd_pengajar = $request->file('ttd_pengajar')->store('ttd_pengajar', 'public');
        
            if ($oldTtdPengajar && Storage::exists('public/' . $oldTtdPengajar)) {
                Storage::delete('public/' . $oldTtdPengajar);
            }
        }
        
    
        // Simpan perubahan
        $sertifikat->save();    
    
        return redirect()->route('table.sertifikat')->with('success', 'Sertifikat berhasil diperbarui');
    }

    public function delete($id)
    {
        Setting::where('id', $id)->delete();
        return redirect()->route('table.sertifikat')->with('success', 'Sertifikat berhasil dihapus');
    }
}
