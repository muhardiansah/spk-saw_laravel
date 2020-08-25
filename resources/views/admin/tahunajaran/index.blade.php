@extends('adminlte::page')

@section('content')
	<div class="row">
		<div class="col-xs-12">					
		<div class="box">	
			<div class="box-header">
				<h3 class="box-title">Data Tahun Ajaran</h3>
				 @if(auth()->user()->role == 'admin')
				<a href="{{ route('admin.tahunajaran.create')}}" class="btn btn-primary pull-right">Tambah</a>
				@endif
			</div>
			
	
			<br/>
			<div class="box-body">
			<table id="datatables" class="table table-bordered table-hover">
				@if (!$tahunajaran->count())
				<p>no data</p>
				@else
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Periode</th>
		                <th>Keterangan</th>
		                <th>Tanggal Mulai</th>
		                <th>Tanggal Selesai</th>
		                @if(auth()->user()->role == 'admin')
		                <th>Aksi</th>
		            	@endif
		            </tr>
		        </thead>

		        <tbody>
		        	<?php $no=1; ?>
					@foreach($tahunajaran as $item)
					
		            <tr>
		                <td>{{ $no++ }}</td>
		                <td>{{ $item->periode->nama_periode}}</td>
		                <td>{{ $item->keterangan}}</td>
		                <td>{{ $item->tgl_start}}</td>
		                <td>{{ $item->tgl_end}}</td>
						@if(auth()->user()->role == 'admin')
		                <td width="">  
							
		                <!-- 	<a href="{!!route('admin.tahunajaran.edit', $item->id)!!}"> <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>   -->
							
							<a href="{!!route('admin.tahunajaran.edit', $item->id)!!}"> <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a> 
							

		                	<a href="{!!route('admin.tahunajaran.destroy', $item->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a> 
							
							<!-- <form action="{{ route('admin.siswa.destroy', $item->id)}}" method="get"><button title="delete" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" type="submit"><i class="fa fa-trash-o"></i></button></form> -->
							
							
					    </td>
					    @endif
		            </tr>
					@endforeach
		        	</tbody>
				@endif
		    	</table>
		    	</div>
		    </div>
		   </div>
		</div>

        @section('js')
        	<script>
        		$(document).ready(function(){
        			$('#datatables').dataTable();
        		});
        	</script>
		@stop	
	
@endsection