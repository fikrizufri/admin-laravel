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
          <table class="table table-bordered  table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Pengirim</th>
                <th>Content</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($dataInbox as $index => $item)

              <tr role="button" data-href="{{route('inbox.show', $item->id)}}">
                <td>{{ $index+1+(($dataInbox->CurrentPage()-1)*$dataInbox->PerPage()) }}</td>
                <td>{{$item->sender}}</td>
                <td>{{$item->content}}</td>
                <td>@if($item->status == 'tidak')<span class="badge bg-danger">Belum dibaca</span>
                  @else <span class="badge bg-primary">Sudah Dibaca</span>
                  @endif</td>
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

  @push('style')
  <style>
    [data-href] {
      cursor: pointer;
    }
  </style>
  @endpush
  @push('script')
  <script>
    $(".table").on("click", "tr[role=\"button\"]", function(e) {
      window.location = $(this).data("href");
    });
  </script>
  @endpush