<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilPenilaian;
use App\Kriteria;

class DashboardController extends Controller
{
    public function index()
    {
    	$kriteria = Kriteria::all();
    	$hasil = HasilPenilaian::all();
    	return view('dashboard.index', compact('kriteria','hasil'));
    }
}
