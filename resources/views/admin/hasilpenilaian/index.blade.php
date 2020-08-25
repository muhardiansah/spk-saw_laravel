@extends('adminlte::page')

@section('content')

<div class="row">
	<div class="col-xs-12">					
		<div class="box">	
			<div class="box-header">
				<h3 class="box-title">Hasil Penilaian</h3>
			</div>
			
			<br/>
			<div class="box-body">
			<table id="datatables" class="table table-bordered table-hover">
				@if (!$hasilpenilaian->count())
				<p>no data</p>
				@else
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Tahun Ajaran</th>        
		                <th>Aksi</th>
		            </tr>
		        </thead>

		        <tbody>
		        	<?php $no=1; ?>
					@foreach($hasilpenilaian as $item)
		        	@if ($item->hasil_penilaian->count() == 0)
					@continue
		        	@endif
					
		            <tr>
		                <td>{{ $no++ }}</td>
		                <td>{{ $item->keterangan }}</td>
		                <td>
		                	
							 <a href="{!!route('admin.hasilpenilaian.show', $item->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-external-link"></i></button> </a> 
							
				   		 </td>
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