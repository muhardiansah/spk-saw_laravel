@extends('adminlte::page')

@section('content')

<div class="row">
	<div class="col-xs-12">					
		<div class="box">	
			<div class="box-header">
				<h3 class="box-title">Data User</h3>
				@if(auth()->user()->role == 'admin')
				<!-- <a href="{{ route('admin.user.create')}}" class="btn btn-primary pull-right">Tambah</a> -->
				@endif
			</div>
			
			<br/>
			<div class="box-body">
			<table id="datatables" class="table table-bordered table-hover">
				@if (!$user->count())
				<p>no data</p>
				@else
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Nama Lengkap</th>
		                <th>Username</th>   
		                <th>Role</th>    
		                <th>Aksi</th>
		            </tr>
		        </thead>

		        <tbody>
		        	<?php $no=1; ?>
					@foreach($user as $item)
					
		            <tr>
		                <td>{{ $no++ }}</td>
		                <td>{{ $item->name}}</td>
		                <td>{{ $item->username}}</td>
		                <td>{{ $item->role}}</td>
		                @if(auth()->user()->role == 'admin')
		                <td>
		                	
							<a href="{!!route('admin.user.edit', $item->id)!!}"> <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>  
							
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