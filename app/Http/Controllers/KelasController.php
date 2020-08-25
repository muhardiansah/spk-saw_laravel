<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function store(Request $request)
    {
    	$kelas = Kelas::create($request->all()); 
    }
}
