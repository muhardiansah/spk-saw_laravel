@extends('adminlte::page')

@section('content')

	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Detail Penilaian Tiap Siswa</h3>
            </div>
			<div class="box-body">
				<table class="table table-stripped" width="100%">
					<tr>
						<td width="35%">Nama Siswa</td>
						<td width="1%"> : </td>
						<td>{{$siswa->nama_siswa}}</td>
					</tr>
					@foreach($penilaian as $item)
					<tr>
						<td width="35%">{{$item->kriteria->nama_kriteria}}</td>
						<td width="1%"> : </td>
						<td>
							<ul>
								<li>{{$item->subkriteria->nama_subkriteria}}</li>
							</ul>
						</td>
					</tr>
					@endforeach
					
				</table>
				<br>
				 <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
						<button type="submit" onclick="window.location='{{ route('admin.penilaian.create')}}'" class="btn btn-primary">Kembali</button>
					</div>
				</div>
			</div>
		</div>
		  </div>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	
		</div>

@endsection