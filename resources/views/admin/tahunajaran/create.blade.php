@extends('adminlte::page')

@section('content')
	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Tambah Tahun Ajaran</h3>
            </div>

		<form class="form-horizontal" action="{{ route('admin.tahunajaran.store')}}" method="post">
			{{ csrf_field()}}
				<div class="box-body">
					<div class="form-group">
					    <label for="tp" class="col-sm-4 control-label">Periode</label>
					    <div class="col-sm-8">
						    <select class="form-control" name="periode_id">
						    	@foreach($periode as $item)
						    	<option value='{{$item->id}}'>{{$item->nama_periode}}</option>
						    	@endforeach
						    </select>
					    </div>
				  	</div>
					<div class="form-group">
						<label for="kt" class="col-sm-4 control-label">Keterangan</label>
					    <div class="col-sm-8">
					    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan')}}" required>
						</div>
					</div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Tanggal Mulai</label>
				    <div class="col-sm-8">
				    	<div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="date" name="tgl_start" class="form-control pull-right" id="datepicker" required="">
		                </div>
				    </div>
				    
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Tanggal Selesai</label>
				    <div class="col-sm-8">
				    	<div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="date" name="tgl_end" class="form-control pull-right" id="datepicker" required="">
		                </div>
					</div>
				  </div>
				  	<div class="form-group">
                   		<div class="col-sm-offset-4 col-sm-10">
							 <button type="submit" class="btn btn-primary">Simpan</button>
					 		 <a href="{{ route('admin.tahunajaran.index')}}"></a>

					 		 <button type="submit" onclick="window.location='{{ route("admin.tahunajaran.index")}}'" class="btn btn-default">Batal</button>
				 		</div>
				 	</div>
				 </div>
			</form>
			</div>
		</div>
	</div>

@endsection