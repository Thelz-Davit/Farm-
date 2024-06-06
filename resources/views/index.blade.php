@extends('layout')
@section('content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            <p>{{ Auth::user()->name }}</p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $countPemesanan }}</h3>

                <p>Pemesanan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('pemesanan/table') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $count }}</h3>
                <p>Jumlah Sapi Tersedia</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('sapi/table') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @if(Auth::user()->name == 'owner')
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>RP. {{ $pemasukanKotor }}</h3>

                <p>Total Revenue</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('pemesanan/table') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
            <div class="col">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>Rp. {{ $difference }}</h3>
                  <p>Total Income</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ url('pemesanan/table') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @else
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 style="font-size: 34px">Rp. {{ $pengeluaran }}</h3>
                <p>Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="{{ url('pengeluaran/table') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          @endif
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengeluaran</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pemesanan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div> 
              <!-- /.card-body --> 
            </div> --}}
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- DONUT CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sapi Tersedia</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script>
  var data = {!! json_encode($sumsByJenisPengeluaran) !!};
  var judul = data.map(function(item) {
    return item.jenis_pengeluaran;
  });
  var isi = data.map(function(item) {
    return item.total_cost;
  });
  $(function() {
      var areaChartData = {
          labels: judul,
          datasets: [{
                  label: 'Pengeluaran',
                  backgroundColor: '#f56954',
                  borderColor: '#f56954',
                  pointRadius: false,
                  pointColor: '#3b8bba',
                  pointStrokeColor: 'rgba(60,141,188,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data: isi
              }
          ]
      }

      // var areaChartOptions = {
      //     maintainAspectRatio: false,
      //     responsive: true,
      //     legend: {
      //         display: false
      //     },
      //     scales: {
      //         xAxes: [{
      //             gridLines: {
      //                 display: false,
      //             }
      //         }],
      //         yAxes: [{
      //             gridLines: {
      //                 display: false,
      //             }
      //         }]
      //     }
      // }

      // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      // var stackedBarChartData = $.extend(true, {}, areaChartData)

      // var stackedBarChartOptions = {
      //     responsive: true,
      //     maintainAspectRatio: false,
      //     scales: {
      //         xAxes: [{
      //             stacked: true,
      //         }],
      //         yAxes: [{
      //             stacked: true
      //         }]
      //     }
      // }

      // new Chart(stackedBarChartCanvas, {
      //     type: 'bar',
      //     data: stackedBarChartData,
      //     options: stackedBarChartOptions
      // })

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  });
</script>
<script>
  var data = {!! json_encode($groupBySapi) !!};
  var labels = data.map(function(item) {
    return item.tipe;
  });
  var values = data.map(function(item) {
    return item.total;
  });
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData = {
      labels: labels,
      datasets: [{
          data: values,
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#EA899A'],
      }]
  }
  var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
  });
</script>
@endsection