<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAjaran;
use App\Periode;

class TahunAjaranController extends Controller
{
    public function index()
    {
    	$tahunajaran = TahunAjaran::All();
        return view('admin.tahunajaran.index', compact('tahunajaran')); 
    }

    public function create()
    {
        $periode = Periode::all();   
    	return view('admin.tahunajaran.create',compact('periode'));
    }

    public function store(Request $request)
    {
    	$tahunajaran = TahunAjaran::create($request->all());

        return redirect()->route('admin.tahunajaran.index');
    }

    public function edit($id)
    {
        $periode = Periode::all();
    	$tahunajaran = TahunAjaran::findOrFail($id);

        return view('admin.tahunajaran.edit', compact('periode','tahunajaran')); 
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $tahunajaran = TahunAjaran::findOrFail($id);
        
        $tahunajaran->update($requestData);

        return redirect()->route('admin.tahunajaran.index');       
    }

    public function destroy($id)
    {
    	TahunAjaran::destroy($id);
        return redirect()->back();
    }
}
