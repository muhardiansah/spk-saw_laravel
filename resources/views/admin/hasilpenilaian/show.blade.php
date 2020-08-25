@extends('adminlte::page')

@section('content')

	<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Detail Hasil Akhir Penilaian</h3>
            </div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12"></div>
					<div class="box-header">
						
						<div class="row">
							<div class="box-header">
							<label for="tp" class=" col-sm-2 control-label">Tahun Ajaran</label>
							<label class=" col-sm-0 control-label">:</label>
							<label>
								@foreach($hasilpenilaian->take(1) as $item)
									{{ $item->tahun_ajaran->keterangan }}
								@endforeach
							</label>			
								
							</div>
						</div>
						 
					</div>
				</div>
		
				<table id="datatables" class="table table-bordered table-stripped">
					
					<thead>
						<tr>
							<th>Ranking</th>
							<th>Nama</th>
							<th>Hasil Penilaian</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						@foreach($hasilpenilaians as $item)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$item->siswa->nama_siswa}}</td>
							<td>{{$item->hasil_penilaians}}</td>
						</tr>
						@endforeach
					</tbody>
					
					
				</table>

				<br>
				<div class="form-group">
					<div class="row">
					<div class="col-sm-1">
						<button type="submit" onclick="window.location='{{ route('admin.hasilpenilaian.index')}}'" class="btn btn-primary">Kembali</button>
					</div>
					@if(auth()->user()->role == 'admin')
					<div class="col-sm-1">
						<a href="{{ route('admin.hasilpenilaians.cetak', $id)}}"  target="_blank" class="btn btn-success">Cetak</a>
					</div>
					@endif
					</div>
                    
				</div>
			</div>
			
				 
			</div>
			
				 
			</div>
		</div>
	 </div>
	 @section('js')
        	<script>
        		$(document).ready(function(){
        			$('#datatables').dataTable();
        		});

        		$(document).ready(function(){
        			$('#datatables2').dataTable();
        		});
        	</script>
		@stop

@endsection