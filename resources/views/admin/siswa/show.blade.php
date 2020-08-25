@extends('adminlte::page')

@section('content')

	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-6">
		  <div class="box box-info">
		  	<div class="box-header with-border">
              <h3 class="box-title">Detail Siswa</h3>
            </div>
			<div class="box-body">
				<table class="table table-stripped" width="100%">
					<tr>
						<td width="35%">Nama Siswa</td>
						<td width="1%"> : </td>
						<td>{{$siswa->nama_siswa}}</td>
					</tr>
					<tr>
						<td width="35%">Jenis Kelamin</td>
						<td width="1%"> : </td>
						<td>
							@if($siswa->jk == 'Laki - Laki') Laki - Laki @endif
							@if($siswa->jk == 'Perempuan') Perempuan @endif
						</td>
					</tr>
					<tr>
						<td width="35%">Tingkat</td>
						<td width="1%"> : </td>
						<td>{{$siswa->kelas->tingkat}}</td>
					</tr>
					<tr>
						<td width="35%">Kelas</td>
						<td width="1%"> : </td>
						<td>{{$siswa->kelas->grade}}</td>
					</tr>	
					<tr>
						<td width="35%">Alamat</td>
						<td width="1%"> : </td>
						<td>{{$siswa->alamat}}</td>
					</tr>
					<tr>
						<td width="35%">Peringkat Kelas</td>
						<td width="1%"> : </td>
						<td>{{$siswa->peringkat_kls}}</td>
					</tr>
					<tr>
						<td width="35%">Jumlah Tanggungan</td>
						<td width="1%"> : </td>
						<td>{{$siswa->jml_tanggungan}}</td>
					</tr>
					<tr>
						<td width="35%">Status Anak</td>
						<td width="1%"> : </td>
						<td>{{$siswa->status_anak}}</td>
					</tr>
					<tr>
						<td width="35%">Penghasilan Orangtua</td>
						<td width="1%"> : </td>
						<td><?php echo 'Rp '.number_format($siswa->penghasilan_ortu);?></td>
						<!-- <td>{{$siswa->penghasilan_ortu}}</td> -->
					</tr>
				</table>
				<br>
				 <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
						<button type="submit" onclick="window.location='{{ route("admin.siswa.index")}}'" class="btn btn-primary">Kembali</button>
					</div>
				</div>
			</div>
		</div>
		  </div>
		  <div class="col-xs-12 col-sm-3 col-md-3">
		  	
		</div>

@endsection