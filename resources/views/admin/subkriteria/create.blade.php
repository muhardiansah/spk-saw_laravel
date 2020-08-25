@extends('adminlte::page')

@section('content')
	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Tambah Subkriteria</h3>
            </div>

		<form class="form-horizontal" action="{{ route('admin.subkriteria.store')}}" method="post">
			{{ csrf_field()}}
				<div class="box-body">
				  <div class="form-group">
				    <label for="tp" class="col-sm-4 control-label">Kriteria</label>
				    <div class="col-sm-8">
					    <select class="form-control" id="kriteria_id" name="kriteria_id">
					    	@foreach($kriteria as $item)
					    	<option value='{{$item->id}}'>{{$item->nama_kriteria}}</option>
					    	@endforeach
					    </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Nama Subkriteria</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" value="{{ old('nama_subkriteria')}}" required>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Min</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" name="min" value="{{ old('min')}}" required>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Max</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" id="max" name="max" value="{{ old('max')}}" required>
					</div>
				  </div>
				  
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Nilai</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" id="nilai" name="nilai" value="{{ old('nilai')}}" required>
					</div>
				  </div>
				   <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
						  <button type="submit" class="btn btn-primary">Simpan</button>
						  <a href="{{ route('admin.subkriteria.index')}}"></a>
						   <button type="submit" onclick="window.location='{{ route("admin.subkriteria.index")}}'" class="btn btn-default">Batal</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		  </div>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	
		</div>

@endsection