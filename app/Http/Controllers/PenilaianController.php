<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penilaian;
use App\Periode;
use App\TahunAjaran;
use App\Siswa;
use App\Kriteria;
use App\Subkriteria;
use App\HasilPenilaian;
use DB;
use Session;

class PenilaianController extends Controller
{
	// public function perhitungansaw(Request $request;)
	// {

	// 	$kriteria = Penilaian::all();
	// 	dd($request->all());
	// }

	// public function alternatifsiswa($value='')
	// {
	// 	$alternatifsiswa = DB::table('penilaians');
	// }

/*	public function index()
	{
		return view('admin.penilaian.index', compact('penilaian','tahun_ajaran','siswa','kriteria','subkriteria'));
	}*/

    public function create()
    {
    	$tahun_ajaran = TahunAjaran::all();
    	$siswa = Siswa::with('penilaian')->get();
    	$kriteria = Kriteria::all();
    	$subkriteria = Subkriteria::all();
        $penilaian = Penilaian::all();

        $penilaianNotNull = DB::table('penilaians')
        ->where('nilai_normalisasi', NULL)
        ->where('bobot_normalisasi', NULL)
        ->select('penilaians.siswa_id')
        ->groupBy('penilaians.siswa_id')
        ->get();

    	return view('admin.penilaian.create', compact('tahun_ajaran','siswa','kriteria','subkriteria','penilaian', 'penilaianNotNull'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        for ($i=0; $i < count($request->kriteria_id) ; $i++) { 
            
            $kriteria = Kriteria::find($request->kriteria_id[$i]);
            $subkriteria = Subkriteria::find($request->subkriteria_id[$i]);

            $penilaian = Penilaian::create([
                'siswa_id' => $request->siswa_id,
               'kriteria_id' => $request->kriteria_id[$i],
               'subkriteria_id' => $request->subkriteria_id[$i],
               'nilai_sub' => $subkriteria->nilai

            ]);

        }
    	return redirect()->route('admin.penilaian.create');
    }

    public function hitung(Request $request)
    {
        // dd($request->all());
        
        $penilaianNotNull = Penilaian::where('nilai_normalisasi', NULL)->where('bobot_normalisasi', NULL)->get();
        // dd($penilaianNotNull);
        if ($penilaianNotNull) {
        

                 $penilaian = Penilaian::query()->update([
                       'tahun_ajaran_id' => $request->tahun_ajaran_id
                    ]);

                $siswa = Siswa::with('penilaian')->get();
                // dd($siswas->toArray());   
                $kriterias = Kriteria::all();
                $siswaArray = [];

                foreach ($siswa as $item) {
                    if ($item->penilaian->count() > 0){
                        if ($item->penilaian[0]->nilai_normalisasi == NULL) {
                            $siswaArray[] = $item;
                        }
                    }
                }
                

                foreach ($siswaArray as $siswa ) {

                    $totalbobot = 0;
                    foreach ($kriterias as $kriteria) {

                        if ($kriteria->tipe_kriteria=='Benefit') {
                            # code...
                            
                            $max = Penilaian::orderBy('nilai_sub','desc')->where('kriteria_id','=',$kriteria->id)->first();

                            $penilaian = Penilaian::where('siswa_id','=',$siswa->id)->where('kriteria_id','=',$kriteria->id)->first();
            // return $max->nilai_sub;
                            $nilai_normalisasi = $penilaian->nilai_sub/$max->nilai_sub;

                        }else{
                             $min = Penilaian::orderBy('nilai_sub','asc')->where('kriteria_id','=',$kriteria->id)->first();

                            $penilaian = Penilaian::where('siswa_id','=',$siswa->id)->where('kriteria_id','=',$kriteria->id)->first();
            // return $max->nilai_sub;
                            $nilai_normalisasi = $min->nilai_sub / $penilaian->nilai_sub;
                        }
                        
                        $bobot_normalisasi = $nilai_normalisasi * $kriteria->bobot;
                        $totalbobot = $totalbobot+$bobot_normalisasi;
                        $penilaian->update([
                            'nilai_normalisasi' => $nilai_normalisasi,
                            'bobot_normalisasi' => $bobot_normalisasi
                        ]);

                    }

                        $hasilpenilaian = HasilPenilaian::create([
                            'tahun_ajaran_id' => $request->tahun_ajaran_id,
                            'siswa_id' => $siswa->id,
                            'hasil_penilaians' => $totalbobot 
                        ]);
                    }

        }

        return redirect()->route('admin.hasilpenilaian.index');

        // } else {

        //     Session::flash('success', 'Anda Sudah Menambahkan nya.');

        //     return redirect()->back();
        // }
    }

    public function show($id)
    {
        $penilaian = Penilaian::where('siswa_id','=',$id)->get();
        $siswa = Siswa::find($id);
        // return $penilaian->siswa;
        return view('admin.penilaian.show', ['penilaian' => $penilaian,'siswa' => $siswa]);
    }

    public function edit($id)
    {
        // $peringkat_kls = Subkriteria::where('kriteria_id','=',1)->g
    	$kriteria = Kriteria::all();
    	$subkriteria = Subkriteria::all();
    	$siswa = Siswa::findOrFail($id);

    	return view('admin.penilaian.edit', compact('kriteria','subkriteria','siswa'));
    }

    public function update(Request $request, $id)
    {
    	$requestData = $request->all();
        $penilaian = Penilaian::findOrFail($id);
        
        $penilaian->update($requestData);

        return redirect()->route('admin.penilaian.create');
    }
}
