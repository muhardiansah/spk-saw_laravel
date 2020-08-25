@extends('adminlte::page')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Input Penilaian Siswa</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<div class="col-sm-12">
				    		<input type="text" class="form-control form-penilaian-label" name="nama_siswa" value="{{ old('nama_siswa') ? old('nama_siswa') : $siswa->nama_siswa}}" disabled>
				    	</div>
					</div>
					<br>
					<br>
					
						<ul class="list-caption">
							@foreach($kriteria as $item)
							<li><label for="tp" class="control-label caption">{{$item->nama_kriteria}} ({{$item->bobot}})</label></li>
							@endforeach
						</ul>
					 <form action="{{ route('admin.penilaian.store')}}" method="post">
					 	 {{ csrf_field()}}
					 	<input type="hidden" class="form-control form-penilaian-label" name="siswa_id" value="{{ $siswa->id}}" >
						<ul class="list-select">
							@foreach($kriteria as $item)
						<li>
							<input type="hidden" name="kriteria_id[]" value="{{ $item->id }}">
							
								<!-- <select class="form-penilaian-input" name="subkriteria_id[]"> -->
									<!-- <option>-Pilih {{ $item->nama_kriteria }}-</option> -->
								 			<!-- <option value="{{$itemSub->id" -->  
				 				<?php
				 				$id = "";
				 				$nama= "";
								 	foreach($subkriteria as $itemSub){
								 		if($item->id == $itemSub->kriteria_id){
													if($item->id==1){
														if( $siswa->peringkat_kls >= $itemSub->min && $siswa->peringkat_kls <= $itemSub->max ){
															$id = $itemSub->id;
															$nama = $itemSub->nama_subkriteria;
														}
													} else if($item->id==2){
														if( $siswa->jml_tanggungan >= $itemSub->min && $siswa->jml_tanggungan <= $itemSub->max ){
															$id = $itemSub->id;
															$nama = $itemSub->nama_subkriteria;
														}
													} else if($item->id==3){

														if( $siswa->status_anak == $itemSub->nama_subkriteria ){
															$id = $itemSub->id;
															$nama = $itemSub->nama_subkriteria;
														}
													} else if($item->id==4){

														if( $siswa->penghasilan_ortu >= $itemSub->min && $siswa->penghasilan_ortu <= $itemSub->max ){
															$id = $itemSub->id;
															$nama = $itemSub->nama_subkriteria;
														}
													} 
								 		}
								 	}
								 ?>

								<input type="hidden" class="form-penilaian-input" name="subkriteria_id[]" value="{{ $id }}">
								<input type="text" class="form-penilaian-input" name="" value=" {{ $nama }} " readonly="">
								 <!-- </select>	 -->
							</li>
							@endforeach

						</ul>
						<div class="form-group">
		                    <div class="col-sm-offset-4 col-sm-10">
		                     	<button type="submit" class="btn btn-primary">Simpan</button>
						 		 <a href="{{ route('admin.penilaian.create')}}"></a>

						 		<button type="button" onclick="window.location='{{ route("admin.penilaian.create")}}'" class="btn btn-default">Batal</button>
		                    </div>
		                </div>
					 </form>
				</div>
			</div>
		</div>
	</div>
@endsection