<!DOCTYPE html>
<html>
<head>
	<title>SPK SDN Kludan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>SDN Kludan Tanggulangin</h5>	
	</center>
	
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
	<table class="table table-bordered table-stripped">
					
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

</body>
</html>