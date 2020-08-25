@extends('adminlte::page')

@section('content')
	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Tambah Siswa</h3>
            </div>

		<form class="form-horizontal" action="{{ route('admin.siswa.store')}}" method="post">
			{{ csrf_field()}}
				<div class="box-body">
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Nama Siswa</label>
				    <div class="col-sm-8">
				    	<input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa')}}" required>
				    </div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Jenis Kelamin</label>
				    <div class="col-sm-8">
				    <select class="form-control" name="jk">
				    	<option value='Laki - Laki'>Laki - Laki</option>
				    	<option value='Perempuan'>Perempuan</option>
				    </select>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Tingkat</label>
				    <div class="col-sm-8">
				    	<select class="form-control" name="tingkat">
				    		<!-- @foreach($kelas as $item)
				    		<option value="{{$item->id}}">{{$item->tingkat}}</option>
				    		@endforeach -->
				    		@for($i=1; $i<=6; $i++)
								<option value='{{$i}}'>{{$i}}</option>
							@endfor
				    	</select>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Kelas</label>
				    <div class="col-sm-8">
				    	<select class="form-control" name="grade">
				    		<!-- @foreach($kelas as $item)
				    		<option value="{{$item->id}}">{{$item->grade}}</option>
				    		@endforeach -->
				    		<option value='A'>A</option>
							<option value='B'>B</option>
				    	</select>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Alamat</label>
				    <div class="col-sm-8">
				    <textarea class="form-control" rows="3" name="alamat" value="{{ old('alamat')}}" required></textarea>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Peringkat Kelas</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" name="peringkat_kls" value="{{ old('peringkat_kls')}}" required>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Jumlah Tanggungan</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" name="jml_tanggungan" value="{{ old('jml_tanggungan')}}" required>
					</div>
				  </div>
				   <!-- <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Status Anak</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" name="status_anak" value="{{ old('status_anak')}}" required>
					</div>
				  </div> -->
				   <div class="form-group">
				    <label for="tp" class="col-sm-4 control-label">Status Anak</label>
				    <div class="col-sm-8">
					    <select class="form-control" name="status_anak">
					    	@foreach($subkriteria as $item)
					    	<option value='{{$item->nama_subkriteria}}'>{{$item->nama_subkriteria}}</option>
					    	@endforeach
					    </select>
				    </div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Penghasilan Orangtua</label>
				    <div class="col-sm-8">
				    <input type="text" class="form-control" name="penghasilan_ortu" value="{{ old('penghasilan_ortu')}}" required>
					</div>
				  </div>
			
				 	<div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                     	<button type="submit" class="btn btn-primary">Simpan</button>
				 		 <!-- <a href="{{ route('admin.siswa.index')}}"></a> -->

				 		 <a href="{{ route("admin.siswa.index")}}" class="btn btn-default">Batal</a>
<!-- 
				 		<button type="submit" onclick="window.location='{{ route("admin.siswa.index")}}'" class="btn btn-default">Batal</button> -->
                    </div>
                  	</div>
				 
				 </div>
			</form>
			</div>
		</div>
	</div>
	
@endsection