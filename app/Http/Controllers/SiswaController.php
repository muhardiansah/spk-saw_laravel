<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use App\Subkriteria;
use DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $siswa = DB::table('siswas')
                        ->join('kelas', 'siswas.kelas_id','=','kelas.id')
                        ->select('siswas.*','kelas.tingkat','kelas.grade');

        if (isset($_GET['tingkat']) && $_GET['tingkat'] != 'Semua') {
            $q=$_GET['tingkat'];
           
                     $siswa=$siswa->where('kelas.tingkat','=',$q);
                        
            // where('kelas_id',$q)->get();
            // 
        }
        if (isset($_GET['grade']) && $_GET['grade'] != 'Semua') {
            $x=$_GET['grade'];
           
                        $siswa=$siswa->where('kelas.grade','=',$x);
                        
            // where('kelas_id',$q)->get();
            // 
        }

        $siswa=$siswa->get();



        // else{
        //     // $siswa = Siswa::get();
        //     $siswa = DB::table('siswas')
        //                 ->join('kelas', 'siswas.kelas_id','=','kelas.id')
        //                 ->select('siswas.*','kelas.tingkat','kelas.grade')
        //                 ->get();
        // }
        $kelas = Kelas::All();
        return view('admin.siswa.index', compact('siswa','kelas'));     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subkriteria = Subkriteria::where('kriteria_id','=',3)->get();
        $kelas = Kelas::all();
        return view ('admin.siswa.create', compact('kelas','subkriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = Kelas::where('tingkat','=',$request->tingkat)->where('grade','=',$request->grade)->first();
        $requestData = $request->all();
        $requestData['kelas_id']=$kelas->id;
        $siswa = Siswa::create($requestData);

        return redirect()->route('admin.siswa.index');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.show', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subkriteria = Subkriteria::where('kriteria_id','=',3)->get();
        $kelas = Kelas::all();
        $siswa = Siswa::findOrFail($id);

        return view('admin.siswa.edit', compact('siswa','kelas','subkriteria'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $kelas = Kelas::where('tingkat','=',$request->tingkat)->where('grade','=',$request->grade)->first();
        $requestData = $request->all();
        $requestData['kelas_id']=$kelas->id;
        $siswa = Siswa::findOrFail($id);
        
        $siswa->update($requestData);

        return redirect()->route('admin.siswa.index');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::destroy($id);
        return redirect()->back();   
    }
}
