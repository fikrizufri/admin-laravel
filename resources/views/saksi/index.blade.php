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
                <th>NIK</th>
                <th>No Hp</th>
                <th>Nama</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>TPS</th>
                <th class="text-center" width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataSaksi as $index => $item)

              <tr>
                <td>{{ $index+1+(($dataSaksi->CurrentPage()-1)*$dataSaksi->PerPage()) }}</td>
                <td>{{$item->nik}}</td>
                <td>{{$item->nohp}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->nama_kelurahan}} </td>
                <td>{{$item->nama_kecamatan}} </td>
                <td>{{$item->nama_kabupaten}} </td>
                <td>{{$item->nama_tps}} </td>
                <td class="text-center">
                  <a href="{{route($route.'.edit',$item->id)}}" class="btn btn-sm btn-warning text-light">
                    <i class="nav-icon fas fa-edit"></i> Ubah</a>
                  <form id="form-{{$item->id}}" action="{{ route($route.'.destroy', $item->id)}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                  </form>
                  <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick=deleteconf("{{$item->id}}")>
                    <i class="fa fa-trash"></i> Hapus
                  </button>
                </td>
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
          {{ $dataSaksi->links() }}
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