<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HasilPenilaian;
use App\Periode;
use App\TahunAjaran;
use App\Siswa;
use DB;
use PDF;

class HasilPenilaianController extends Controller
{
    public function index()
    {
        // SELECT periodes.nama_periode FROM periodes 
        // INNER JOIN hasil_penilaians ON periodes.id = hasil_penilaians.periode_id
        // GROUP BY hasil_penilaians.periode_id
    	// $hasilpenilaian = DB::table('hasil_penilaians')
     //                        ->join('periodes', 'hasil_penilaians.periode_id', '=', 'periodes.id')
     //                        ->join('hasil_penilaians', 'hasil_penilaians.tahun_ajarans_id', '=', 'tahun_ajarans.id')
     //                        ->select('hasil_penilaians.periode_id')
     //                        ->groupBy('hasil_penilaians.periode_id')
     //                        ->get();
     //                        dd($hasilpenilaian);
        
        $hasilpenilaian = TahunAjaran::with('hasil_penilaian')->get();
    	return view('admin.hasilpenilaian.index', compact('hasilpenilaian'));
    }
    
    public function show($id)
    {
    	$hasilpenilaian = HasilPenilaian::where('tahun_ajaran_id', $id)->with('periode')
        ->get();

        // dd($hasilpenilaian->toArray());
        // $updatehasil = HasilPenilaian::findOrFail($id);
    	$hasilpenilaians = HasilPenilaian::where('tahun_ajaran_id', $id)->with('periode')
        ->orderBy('hasil_penilaians', 'desc')
        ->get();
    	return view('admin.hasilpenilaian.show', [ 
    		'hasilpenilaian' => $hasilpenilaian,
    		'hasilpenilaians' => $hasilpenilaians,
            'id' => $id
            // 'updatehasil' => $updatehasil,
    	]);

    }

    public function cetak($id)
    {
        $hasilpenilaian = HasilPenilaian::where('tahun_ajaran_id', $id)->with('periode')
        ->get();

        $hasilpenilaians = HasilPenilaian::where('tahun_ajaran_id', $id)->with('periode')
        ->orderBy('hasil_penilaians', 'desc')
        ->get();

        $pdf = PDF::loadview('admin/hasilpenilaian/hasilpenilaian_pdf',[
            'hasilpenilaian' => $hasilpenilaian,
            'hasilpenilaians' => $hasilpenilaians
        ]);
        return $pdf->stream();

    }
}
