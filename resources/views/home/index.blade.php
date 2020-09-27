@extends('template.app')

@section('content')


<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">

    <div class="col-md-12">

      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title"> Bar Chart</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="stackedBarChart" style="height:230px; min-height:230px"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  <div class="row">

    <!-- small box -->
    @foreach($paslon as $value)
    <div class="col-md-3">
      <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-info">
          <h3 class="widget-user-username">{{$value->nourut}}</h3>
          <h5 class="widget-user-desc">{{$value->nama}}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle elevation-2" width="20%" @if ($value->foto == NULL )
          src="{{asset('img/default-icon.png')}}"
          @else
          src="{{ asset('storage/paslon/thumbnail/'.$value->foto)}}"
          @endif>
        </div>
        <div class="card-footer">
          <div class="row">

            <!-- /.col -->
            <div class="col-sm-12">
              <div class="description-block">
                <h4 class="description-header">Jumlah Suara</h4>
                <span class="description-text">{{$value->suara}}</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
    </div>
    @endforeach
    <!-- ./col -->
    <!-- ./col -->

    <!-- ./col -->
    <!-- 
      <div class="col-lg-3 col-6">
        <!-- small box 
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> 
      -->
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->

  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@stop

@push('chart')
<script>
  var nourut = @json($nourut);
  var suara = @json($suara);
  console.log(suara);
  $(document).ready(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.


    var areaChartData = {
      labels: nourut,
      datasets: [{
        label: 'Jumlah Suara',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: suara
      }]
    }
    var stackedBarChartCanvas = $('#stackedBarChart').get(0);
    var barChartData = jQuery.extend(true, {}, areaChartData);
    var stackedBarChartData = $.extend(true, {}, barChartData)

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

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
@endpush
@push('script')

<!-- <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script> -->

@endpush