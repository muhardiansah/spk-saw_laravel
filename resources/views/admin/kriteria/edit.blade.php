@extends('adminlte::page')

@section('content')

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
		 <div class="box box-info">
		  <div class="box-header with-border">
             <h3 class="box-title">Edit Kriteria</h3>
          </div>
		
		<form class="form-horizontal" action="{{ route('admin.kriteria.update', $kriteria->id)}}" method="post">
			{{ csrf_field()}}
				<div class="box-body">
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Nama Kriteria</label>
				    <div class="col-sm-8">
				 	   <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ old('nama_kriteria') ? old('nama_kriteria') : $kriteria->nama_kriteria}}" required>
 				  </div>
 				</div>
				  <div class="form-group">
				    <label for="tp" class="col-sm-4 control-label">Tipe Kriteria</label>
				    <div class="col-sm-8">
					    <select name="tipe_kriteria" class="form-control" id="tipe_kriteria">
					    	<option value="Benefit" {{ ($kriteria->tipe_kriteria == 'Benefit') ? 'selected' : '' }}>Benefit</option>
					    	<option value="Cost" {{ ($kriteria->tipe_kriteria == 'Cost') ? 'selected' : '' }}>Cost</option>
					    </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Bobot Kriteria</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" id="bobot" name="bobot" value="{{ old('bobot') ? old('bobot') : $kriteria->bobot }}" required>
				    </div>
				  </div>
				   <div class="form-group">
		                <div class="col-sm-offset-4 col-sm-10">
						  <button type="submit" class="btn btn-primary">Simpan</button>
						  <a href="{{ route('admin.kriteria.index')}}"></a>
						    <button type="submit" onclick="window.location='{{ route("admin.kriteria.index")}}'" class="btn btn-default">Batal</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		  </div>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	
		</div>
@endsection