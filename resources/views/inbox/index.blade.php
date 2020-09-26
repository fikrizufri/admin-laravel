@extends('template.app')

@section('content')

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar {{$title}}</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Pengirim</th>
                <th>Content</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataInbox as $index => $item)

              <tr>
                <td>{{ $index+1+(($dataInbox->CurrentPage()-1)*$dataInbox->PerPage()) }}</td>
                <td>{{$item->sender}}</td>
                <td>{{$item->content}}</td>
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
          {{ $dataInbox->links() }}
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