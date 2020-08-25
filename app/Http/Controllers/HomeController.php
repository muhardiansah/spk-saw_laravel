<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $tahunajaran = TahunAjaran::where('status', true)->first();
        // $tglSekarang = Carbon::now(); 
        // if ($tahunajaran->tgl_start < $tahunajaran->tgl_end) {
        //     $siswas = Siswa::all()
        //     foreach ($siswas as $siswa) {
        //         Siswa::where('id', $siswa->id)->update([
        //             'kelas_sekarang' => $kelas->id
        //         ])
        //     }
        // }
        return view('home');
    }
}
