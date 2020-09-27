@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail {{$title}}</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="form-group">
                        <div>
                            <label for="sender" class=" form-control-label">Pengirim</label>
                        </div>
                        <div>
                            <input type="text" name="sender" placeholder="sender" id="sender" class="form-control  {{$errors->has('sender') ? 'form-control is-invalid' : 'form-control'}}" value="{{$inbox->sender}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="Content" class=" form-control-label">Isi Pesan</label>
                        </div>
                        <div>
                            <input type="text" name="Content" placeholder="Content" id="Content" class="form-control  {{$errors->has('Content') ? 'form-control is-invalid' : 'form-control'}}" value="{{$inbox->content}}" readonly>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="{{route('inbox.index')}}" class="btn btn-primary">Kembali</a>
                </div>

            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->

@stop

@push('script')
<script>

</script>
@endpush