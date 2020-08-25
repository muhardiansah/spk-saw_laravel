<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subkriteria;
use App\Kriteria;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(isset($_GET['kriteria'])){
            $q=$_GET['kriteria'];
             $subkriteria = Subkriteria::where('kriteria_id',$q)->get();
            // return $q;
        } else {
             $subkriteria = Subkriteria::where('kriteria_id',00)->get();
        }
        // $kriteria = Kriteria::all();
            $kriteria = Subkriteria::groupBy('kriteria_id')
                ->selectRaw('sum(id) as sum, kriteria_id')
                ->get();
        return view('admin.subkriteria.index', compact('subkriteria', 'kriteria'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view ('admin.subkriteria.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subkriteria = Subkriteria::create($request->all());

        return redirect()->route('admin.subkriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Penilaian::create([
        //     'periode_id' => $request->get('periode')
        //     'sisw_id' => $request->get('siswa')
        // ]);
        $kriteria = Kriteria::all();
        $subkriteria = Subkriteria::findOrFail($id);

        return view('admin.subkriteria.edit', compact('subkriteria', 'kriteria'));
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $subkriteria = Subkriteria::findOrFail($id);

        $subkriteria->update($requestData);

        return redirect()->route('admin.subkriteria.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subkriteria::destroy($id);
        return redirect()->back();    
    }

    // SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`ta_spk_saw`.`penilaians`, CONSTRAINT `penilaians_subkriteria_id_foreign` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriterias` (`id`)) (SQL: delete from `subkriterias` where `id` = 34)
    // 
    // Trying to get property 'nilai_sub' of non-object
}
