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

                        <div class="form-group ">
                            <label for="kelurahan">Kelurahan</label>
                            <select name="kelurahan_id" class="selected2 form-control" id="cmbkelurahan">
                                <option value="">--Pilih Kelurahan--</option>
                                @foreach ($dataKelurahan as $kelurahan)
                                <option value="{{$kelurahan->id}}" {{$tps->kelurahan_id == $kelurahan->id ? "selected" : ""}}>{{'Kelurahan : '.$kelurahan->nama.', Kecamatan : '.$kelurahan->nama_kecamatan.', Kabupaten : '.$kelurahan->nama_kabupaten}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kelurahan'))
                            <span class="text-danger">
                                <strong id="textkelurahan">{{ $errors->first('kelurahan')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" id="nama" placeholder="Nama {{$title}}" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $tps->nama }}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textNama">{{ $errors->first('nama')}}</strong>
                            </span>
                            @endif
                        </div>
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
            $('#cmbkabupaten').select2({
                placeholder: '--- Pilih Kabupaten---',
                width: '100%'
            });
            $('#cmbkecamatan').select2({
                placeholder: '--- Pilih Kecamatan---',
                width: '100%'
            });
            $('#cmbkelurahan').select2({
                placeholder: '--- Pilih Kelurahan---',
                width: '100%'
            });
        });
    </script>
    @endpush