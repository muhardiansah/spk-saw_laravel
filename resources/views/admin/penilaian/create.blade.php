@extends('adminlte::page')

@section('content')
	<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Buat Penilaian</h3>
            </div>
                @if(Session::has('success'))
                <div class="alert alert-danger">
                  {{ Session::get('success')}}
                </div>
                @endif
                <div class="box-body">
                  
                
                <table id="datatables" class="table table-bordered">
                            @if (!$siswa->count())
                            <p>no data</p>
                            @else
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Peringkat Kelas</th>
                                        <th>Jml Tanggungan</th>
                                        <th>Status Anak</th>
                                        <th>Pengahsilan Ortu</th>
                                      <!--   <th>Status</th> -->
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
                                        <td>{{ $item->peringkat_kls}}</td>
                                        <td>{{ $item->jml_tanggungan}}</td>
                                        <td>{{ $item->status_anak}}</td>
                                        <td><?php echo 'Rp '.number_format($item->penghasilan_ortu);?></td>
                                     <!--    <td>sudah/belum</td> -->
                                        <td width="">
                                          
                                          @if (!count($item->penilaian))

                                          <a href="{!!route('admin.penilaian.edit', $item->id)!!}"> <button class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></button> </a> 
                                          
                                          @else
                                            sudah
                                          @endif
                                          <a href="{!!route('admin.penilaian.show', $item->id)!!}"> <button class="btn btn-success" title="Detail"><i class="fa fa-external-link"></i></button> </a> 
<!-- 
                                          <a href="{!!route('admin.siswa.destroy', $item->id)!!}"> <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" title="Hapus"><i class="fa fa-trash"></i></button> </a>  -->
                              
                                  </td>
                                    </tr>
                              @endforeach
                                  </tbody>
                            @endif 
                        </table>

                        <form class="form-horizontal" action="{{ route('admin.penilaian.hitung')}}" method="post">
                          {{ csrf_field()}}
                            <div class="box-body">
                              @foreach($penilaianNotNull as $item)
                              <input type="hidden" name="siswa_id[]" value="{{ $item->siswa_id }}">
                              @endforeach
                              <div class="form-group">
                                <label for="tp" class="col-sm-2 control-label">Tahun Ajaran</label>
                                <div class="col-sm-8">
                                <select class="form-control" name="tahun_ajaran_id">
                                    @foreach($tahun_ajaran as $item)
                                      <option value="{{$item->id}}">{{$item->keterangan}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              </div>
                              
                         </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-sm-offset-5 col-sm-4">
                                  
                                 <button type="submit" class="btn btn-primary">Proses</button>
                                  <a href="{{ route('admin.penilaian.create')}}"></a>
                              </div>
                              </div>
                             
                            </div>
                    </form>
                      
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