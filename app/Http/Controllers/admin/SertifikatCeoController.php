<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SertifikatCeoController extends Controller
{
    public function index()
    {   
        $ceos = Setting::all();
        return view('admin.table-sertifikat', compact('ceos'));
    }
}
