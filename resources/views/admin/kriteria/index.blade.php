@extends('adminlte::page')

@section('content')

<div class="row">
	<div class="col-xs-12">					
		<div class="box">	
			<div class="box-header">
				<h3 class="box-title">Data Kriteria</h3>
				@if(auth()->user()->role == 'admin')
				<a href="{{ route('admin.kriteria.create')}}" class="btn btn-primary pull-right">Tambah</a>
				@endif
			</div>
			
			<br/>
			<div class="box-body">
			<table id="datatables" class="table table-bordered table-hover">
				@if (!$kriteria->count())
				<p>no data</p>
				@else
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Nama Kriteria</th>
		                <th>Tipe Kriteria</th>
		                <th>Bobot Kriteria</th>  
		            	 @if(auth()->user()->role == 'admin')          
		                <th>Aksi</th>
						@endif
		            </tr>
		        </thead>

		        <tbody>
		        	<?php $no=1; ?>
					@foreach($kriteria as $item)
					
		            <tr>
		                <td>{{ $no++ }}</td>
		                <td>{{ $item->nama_kriteria}}</td>
		                <td>{{ $item->tipe_kriteria}}</td>
		                <td>{{ $item->bobot}}</td>
		                @if(auth()->user()->role == 'admin')
		                <td>
		                	
							<a href="{!!route('admin.kriteria.edit', $item->id)!!}"> <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>  

		                	<a href="{!!route('admin.kriteria.destroy', $item->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a> 
							
				   		 </td>
				   		 @endif
        	    	</tr>
					@endforeach
      	 	 	</tbody>
		@endif
    		</table>
    		<p><i style="color: red;">* </i>Catatan: Jumlah total bobot harus 1</p>
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