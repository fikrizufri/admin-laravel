@extends('template.app')

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar {{$title}}</h3>
          <a href="{{route($route.'.create')}}" class="btn btn-sm btn-primary float-right text-light">
            <i class="fa fa-plus"></i>Tambah Data
          </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>No Urut</th>
                <th>Paslon</th>
                <th>Saksi</th>
                <th>TPS</th>
                <th>Kabupaten</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataPerhitungan as $index => $item)

              <tr>
                <td>{{ $index+1+(($dataPerhitungan->CurrentPage()-1)*$dataPerhitungan->PerPage()) }}</td>
                <td>{{$item->nourut}}</td>
                <td>{{$item->nama_paslon}}</td>
                <td>{{$item->nama_saksi}}</td>
                <td>{{$item->nama_tps}}</td>
                <td>{{$item->nama_kelurahan}}</td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->jumlah}}</td>
              </tr>
              @empty
              <tr>
                <td colspan="10">Data {{$title}} tidak ada</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          {{ $dataPerhitungan->links() }}
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->

  @stop

  @push('script')

  @endpush