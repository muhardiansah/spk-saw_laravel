@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">        
              <div class="box-header">
                  <h4>Dashboard</h4>
              </div>
                <div class=""><div id="container2" style="min-width: 310px; max-width: 95%; height: 500px; margin: 0"></div></div>     
        </div>
    </div>
    
   <!--  <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                 

                    Selamat Datang di Aplikasi Sistem Pendukung Keputusan Untuk Pemberian Beasiswa
                </div>

            </div>
        </div>
    </div> -->
</div>
    @section('js')
        <script>
        var chart1; // globally available
        $(document).ready(function() {
              chart1 = new Highcharts.Chart({
                 chart: {
                    renderTo: 'container2',
                    type: 'column'
                 },  
                 title: {
                    text: 'Grafik Perangkingan '
                 },
                 xAxis: {
                    categories: ['Nama Siswa']
                 },
                 yAxis: {
                    title: {
                       text: 'Jumlah Nilai Akhir'
                    }
                 },
                      series: [
                                
                                <?php foreach ($hasil as $item): ?>
                                    {
                                        name:'{{$item->siswa->nama_siswa}}',
                                        data:[{{$item->hasil_penilaians}}]   
                                    },
                                    
                                <?php endforeach ?>
                                   
                      ]   
                   
              });
           });  
           </script>
    @endsection
@endsection
