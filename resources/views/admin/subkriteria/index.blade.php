@extends('adminlte::page')

@section('content')

<div class="row">
	<div class="col-xs-12">					
		<div class="box">	
			<div class="box-header">
				<h3 class="box-title">Data Subkriteria</h3>
				@if(auth()->user()->role == 'admin')
				<a href="{{ route('admin.subkriteria.create')}}" class="btn btn-primary pull-right">Tambah</a>
				@endif
			</div>

			<div class="box-header">
				<div class="row">
					<div class="col-md-3">
						<select class="form-control" name="kriteria_id" onchange="getKriteria(this)">

							<?php 
							$k="";
							if(isset($_GET['kriteria'])){
								$k=$_GET['kriteria'];
							}

							 ?>
							 	<option>Pilih Kriteria</option>
							@foreach($kriteria as $item)
								<option {{ $k==$item->kriteria_id ? "selected" : "" }} value='{{$item->kriteria_id}}'>{{$item->kriteria->nama_kriteria}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

		<div class="box-body">
		<table id="datatables" class="table table-bordered table-hover">
			@if (!$subkriteria->count())
			<p>no data</p>
			@else
	        <thead>
	            <tr>
	                <th>No</th>
	                <th>Nama Subriteria</th>
	                <th>Nilai</th>
	                @if(auth()->user()->role == 'admin')
	                <th>Aksi</th>
	                @endif
	            </tr>
	        </thead>

	        <tbody>
	        	<?php $no=1; ?>
				@foreach($subkriteria as $item)
				
	            <tr>
	                <td>{{ $no++ }}</td>
	                <td>{{ $item->nama_subkriteria}}</td>
	                <td>{{ $item->nilai}}</td>
	                @if(auth()->user()->role == 'admin')
	                <td class="text-center">
	                	
						<a href="{!!route('admin.subkriteria.edit', $item->id)!!}"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button> </a> 

						<a href="{!!route('admin.subkriteria.destroy', $item->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a> 
						
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

<script type="text/javascript">
	function getKriteria(selectKriteria){
		var value = selectKriteria.value;
	window.location.href = window.location.href.split("?")[0]+"?kriteria="+value;
	}
</script>

   @section('js')
        	<script>
        		$(document).ready(function(){
        			$('#datatables').dataTable();
        		});
        	</script>
		@stop	

@endsection