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
          @if(Auth::user()->name == 'admin')
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 style="font-size: 34px">Rp. {{ $pengeluaran }}</h3>
                <p>Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
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
            <div class="card">
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
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- DONUT CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Chart Sapi</h3>

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

            <!-- BAR CHART -->
            {{-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

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
            </div> --}}
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
{{-- <script>
  var data = {!! json_encode($pemesananGrouped) !!};
  var labels = data.map(function(item) {
    return item.tipe;
  });
  var values = data.map(function(item) {
    return item.total;
  });
  console.log(data)
  console.log(labels)
  $(function() {
      var areaChartData = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sept', 'Okt', 'Nov', 'Des'],
          datasets: [{
                  label: 'Limosin',
                  backgroundColor: '#C40C0C',
                  borderColor: '#C40C0C',
                  pointRadius: false,
                  pointColor: '#3b8bba',
                  pointStrokeColor: 'rgba(60,141,188,1)',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(60,141,188,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
              {
                  label: 'Simental',
                  backgroundColor: '#FF6500',
                  borderColor: '#FF6500',
                  pointRadius: false,
                  pointColor: 'rgba(210, 214, 222, 1)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
              {
                  label: 'Brahman',
                  backgroundColor: '#FF8A08',
                  borderColor: '#FF8A08',
                  pointRadius: false,
                  pointColor: 'rgba(12, 52, 128, 0.7)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
              {
                  label: 'Bali',
                  backgroundColor: '#FFC100',
                  borderColor: '#FFC100',
                  pointRadius: false,
                  pointColor: 'rgba(24, 104, 86, 0.8)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
              {
                  label: 'Madura',
                  backgroundColor: '#BFEA7C',
                  borderColor: '#BFEA7C',
                  pointRadius: false,
                  pointColor: 'rgba(252, 16, 3, 0.4)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
              {
                  label: 'Jawa',
                  backgroundColor: 'rgba(36, 74, 192, 0.6)',
                  borderColor: 'rgba(36, 74, 192, 0.6)',
                  pointRadius: false,
                  pointColor: 'rgba(36, 74, 192, 0.6)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
              {
                  label: 'Malboro',
                  backgroundColor: 'rgba(8, 137, 215, 0.7)',
                  borderColor: 'rgba(8, 137, 215, 0.7)',
                  pointRadius: false,
                  pointColor: 'rgba(8, 137, 215, 0.7)',
                  pointStrokeColor: '#c1c7d1',
                  pointHighlightFill: '#fff',
                  pointHighlightStroke: 'rgba(220,220,220,1)',
                  data: [1, 5, 6, 2, 1, 7, 9]
              },
          ]
      }

      var areaChartOptions = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
              display: false
          },
          scales: {
              xAxes: [{
                  gridLines: {
                      display: false,
                  }
              }],
              yAxes: [{
                  gridLines: {
                      display: false,
                  }
              }]
          }
      }

      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = $.extend(true, {}, areaChartData)

      var stackedBarChartOptions = {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
              xAxes: [{
                  stacked: true,
              }],
              yAxes: [{
                  stacked: true
              }]
          }
      }

      new Chart(stackedBarChartCanvas, {
          type: 'bar',
          data: stackedBarChartData,
          options: stackedBarChartOptions
      })

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0

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
</script> --}}
<script>

var data = {!! json_encode($pemesananGrouped) !!};
var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var datasets = [];
var types = ['Limosin', 'Simental', 'Brahman', 'Bali', 'Madura', 'Jawa', 'Malboro'];

types.forEach(function(type) {
    var dataValues = [];
    labels.forEach(function(label) {
        var total = 0;
        data.forEach(function(entry) {
            if (entry.month === label) {
                entry.count.forEach(function(count) {
                    if (count.tipe === type) {
                        total += count.total;
                    }
                });
            }
        });
        dataValues.push(total);
    });
    datasets.push({
        label: type,
        backgroundColor: getRandomColor(), // You need to define this function to get random colors
        borderColor: getRandomColor(),
        data: dataValues
    });
});
// Create Chart.js configuration
var areaChartData = {
    labels: labels,
    datasets: datasets
};

// Render the chart using Chart.js
var ctx = document.getElementById('stackedBarChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: areaChartData,
    options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
});

// Function to generate random color
function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

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