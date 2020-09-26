@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ubah {{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama Satuan</label>
                            </div>
                            <div>
                                <input type="text" name="nama" id="nama" placeholder="Nama Satuan" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $kabupaten->nama }}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textNama">{{ $errors->first('nama')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="kabupaten">kabupaten</label>
                        <select name="kabupaten" class="selected2 form-control" id="cmbkabupaten">
                            <option value="">--Pilih Kabupaten--</option>
                            @foreach ($datakabupaten as $kabupaten)
                            <option value="{{$kabupaten->id}}" {{$kecamatan->kabupaten_id == $kabupaten->id ? "selected" : ""}}>{{$kabupaten->nama}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('kabupaten'))
                        <span class="text-danger">
                            <strong id="textsatuan">{{ $errors->first('satuan')}}</strong>
                        </span>
                        @endif
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

    @stop

    @push('script')
    <script>
        $(function() {
            $("#nama").keypress(function() {
                $("#nama").removeClass("is-invalid");
                $("#textNama").html("");
            });

            // $("#id_rt").keypress(function(){
            //   $("#id_rt").removeClass("is-invalid");
            //   $("#textid_rt").html("");
            // });
        });
    </script>
    @endpush