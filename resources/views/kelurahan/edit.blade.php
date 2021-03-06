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
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" class="selected2 form-control" id="cmbkecamatan">
                                <option value="">--Pilih kecamatan--</option>
                                @foreach ($dataKecamatan as $kecamatan)
                                <option value="{{$kecamatan->id}}" {{$kelurahan->kecamatan_id == $kecamatan->id ? "selected" : ""}}>{{'Kecamatan : '.$kecamatan->nama.', Kabupaten :'.$kecamatan->nama_kabupaten}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kecamatan'))
                            <span class="text-danger">
                                <strong id="textkecamatan">{{ $errors->first('kecamatan')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" id="nama" placeholder="Nama {{$title}}" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{ $kelurahan->nama }}" required>
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
        });
    </script>
    @endpush