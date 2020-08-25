@extends('adminlte::page')

@section('content')
	<div class="row">
		<div class="col-xs-12">					
		<div class="box">
				
			<div class="box-header">
				<h3 class="box-title">Data Siswa</h3>
				@if(auth()->user()->role == 'admin')
				<a href="{{ route('admin.siswa.create')}}" class="btn btn-primary pull-right">Tambah</a>
				@endif
			</div>
			<div class="box-header">
				<div class="row">
					<div class="col-md-3">
						<h5>Tingkat</h5>
						<select class="form-control" name="kelas_id" onchange="getTingkat(this)">

							<?php 
							$k="";
							if(isset($_GET['tingkat'])){
								$k=$_GET['tingkat'];
							}

							 ?>
							 	<option>Semua</option>
							<!-- @foreach($kelas as $item)
								<option {{ $k==$item->id ? "selected" : "" }} value='{{$item->id}}'>{{$item->tingkat}}</option>
							@endforeach -->
								@for($i=1; $i<=6; $i++)
								<option {{ $k==$i ? "selected" : "" }} value='{{$i}}'>{{$i}}</option>
								@endfor
						</select>
					</div>
					<div class="col-md-3">
						<h5>Kelas</h5>
						<select class="form-control" name="kelas_id" onchange="getGrade(this)">

							<?php 
							$k="";
							if(isset($_GET['grade'])){
								$k=$_GET['grade'];
							}

							 ?>
							 	<option>Semua</option>
							<!-- @foreach($kelas as $item)
								<option {{ $k==$item->id ? "selected" : "" }} value='{{$item->id}}'>{{$item->grade}}</option>
							@endforeach -->
								<option {{ $k=='A' ? "selected" : "" }} value='A'>A</option>
								<option {{ $k=='B' ? "selected" : "" }} value='B'>B</option>
						</select>
					</div>
				</div>
			</div>
	
			<br/>
			<div class="box-body">
			<table id="datatables" class="table table-bordered table-hover">
				@if (!$siswa->count())
				<p>no data</p>
				@else
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Nama Siswa</th>
		                <th>Jenis Kelamin</th>
		                <th>Tingkat</th>
		                <th>Kelas</th>
		                <th>Aksi</th>
		            </tr>
		        </thead>

		        <tbody>
		        	<?php $no=1; ?>
					@foreach($siswa as $item)
					
		            <tr>
		                <td>{{ $no++ }}</td>
		                <td>{{ $item->nama_siswa}}</td>
		                <td>{{ $item->jk}}</td>
		                <td>{{ $item->tingkat}}</td>
		                <td>{{ $item->grade}}</td>

		                <td width="">

		                	<a href="{!!route('admin.siswa.show', $item->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-eye"></i></button> </a>  
							@if(auth()->user()->role == 'admin')
		                	<a href="{!!route('admin.siswa.edit', $item->id)!!}"> <button class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></button> </a>  

		                	<a href="{!!route('admin.siswa.destroy', $item->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a> 
		                	@endif
						
							<!-- <form action="{{ route('admin.siswa.destroy', $item->id)}}" method="get"><button title="delete" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" type="submit"><i class="fa fa-trash-o"></i></button></form> -->
							
							
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
		<script type="text/javascript">
			function getParameterByName(name, url) {
		    if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, '\\$&');
		    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';
		    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
			function getTingkat(selectTingkat){
				var value = selectTingkat.value;
				// alert(value);
				var grade = getParameterByName('grade');
				// alert (tingkat);
				if (grade!=null){
				window.location.href = window.location.href.split("?")[0]+"?tingkat="+value+'&grade='+grade;
				}else{
					window.location.href = window.location.href.split("?")[0]+"?tingkat="+value;		
				}

			}


			function getGrade(selectGrade){
				var value = selectGrade.value;
				var tingkat = getParameterByName('tingkat');
				// alert (tingkat);
				if (tingkat!=null){
				window.location.href = window.location.href.split("?")[0]+"?grade="+value+'&tingkat='+tingkat;
				}else{
					window.location.href = window.location.href.split("?")[0]+"?grade="+value;		
				}

			
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