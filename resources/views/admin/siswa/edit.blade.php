@extends('adminlte::page')

@section('content')

	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Edit Siswa</h3>
            </div>
		
		<form class="form-horizontal" action="{{ route('admin.siswa.update', $siswa->id)}}" method="post">
			{{ csrf_field()}}
				<div class="box-body">
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Nama Siswa</label>
				    <div class="col-sm-8">
				   		<input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') ? old('nama_siswa') : $siswa->nama_siswa}}" required>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Jenis Kelamin</label>
				     <div class="col-sm-8">
					    <select name="jk" class="form-control">
					    	<option value="Laki - Laki" {{ ($siswa->jk == 'Laki - Laki') ? 'selected' : '' }}>Laki - Laki</option>
					    	<option value="Perempuan" {{ ($siswa->jk == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
					    </select>
				    </div>
				  </div>
				    <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Tingkat</label>
				    <div class="col-sm-8">
				    	<select class="form-control" name="tingkat">

				    		@for($i=1; $i<=6; $i++)
								<option value='{{$i}}'  {{$i == $siswa->kelas->tingkat ? 'selected' : '' }}>{{$i}}</option>
							@endfor

				    	</select>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Kelas</label>
				    <div class="col-sm-8">
				    	<select class="form-control" name="grade">

				    		<option value='A'  {{'A' == $siswa->kelas->grade ? 'selected' : '' }}>A</option>
							<option value='B'  {{'B' == $siswa->kelas->grade ? 'selected' : '' }}>B</option>
				    	</select>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Alamat</label>
				    <div class="col-sm-8">
				    	<textarea class="form-control" rows="3" name="alamat" value="{{ old('alamat') ? old('alamat') : $siswa->alamat}}" required>{{ old('alamat') ? old('alamat') : $siswa->alamat}}</textarea>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Peringkat Kelas</label>
				    <div class="col-sm-8">
				    	<input type="text" class="form-control" name="peringkat_kls" value="{{ old('peringkat_kls') ? old('peringkat_kls') : $siswa->peringkat_kls}}" required>
					</div>
				  </div>
				   <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Jumlah Tanggungan</label>
				    <div class="col-sm-8">
				    	<input type="text" class="form-control" name="jml_tanggungan" value="{{ old('jml_tanggungan') ? old('jml_tanggungan') : $siswa->jml_tanggungan}}" required>
					</div>
				  </div>
				  <!--  <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Status Anak</label>
				    <div class="col-sm-8">
				    	<input type="text" class="form-control" name="status_anak" value="{{ old('status_anak') ? old('status_anak') : $siswa->status_anak}}" required>
					</div>
				  </div> -->
				  <div class="form-group">
				    <label for="tp" class="col-sm-4 control-label">Status Anak</label>
				    <div class="col-sm-8">
				    <select class="form-control"  name="nama_subkriteria">
				    	@foreach($subkriteria as $item)
				    		<option value='{{$item->nama_subkriteria}}' {{$item->nama_subkriteria == $siswa->status_anak ? 'selected' : '' }}>{{$item->nama_subkriteria}}</option>
				    	@endforeach
				    </select>
					</div>
				  </div>
				 <div class="form-group">
				    <label for="kt" class="col-sm-4 control-label">Penghasilan Orangtua</label>
				    <div class="col-sm-8">
				    	<input type="text" class="form-control" name="penghasilan_ortu" value="{{ old('penghasilan_ortu') ? old('penghasilan_ortu') : $siswa->penghasilan_ortu}}" required>
					</div>
				  </div>
				   <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
						  <button type="submit" class="btn btn-primary">Simpan</button>
						  <a href="{{ route('admin.siswa.index')}}"></a>

						  <button type="submit" onclick="window.location='{{ route("admin.siswa.index")}}'" class="btn btn-default">Batal</button>
						</div>
					</div>
				 </div>
			</form>
		</div>
		  </div>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	
		</div>

@endsection