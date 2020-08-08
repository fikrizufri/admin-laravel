@extends('template.app')

@section('content')


<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$user}}</h3>

          <p>Pengguna</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('user.index')}}" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
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

@push('script')

@endpush