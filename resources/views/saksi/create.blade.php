@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah {{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="tps">TPS</label>
                            <select name="tps_id" class="selected2 form-control" id="cmbtps">
                                <option value="">--Pilih TPS--</option>
                                @foreach ($dataTps as $tps)
                                <option value="{{$tps->id}}" {{old('tps_id') == $tps->id ? "selected" : ""}}>{{'No TPS : '.$tps->nama.', Kelurahan : '.$tps->nama_kelurahan.', Kecamatan : '.$tps->nama_kecamatan.', Kabupaten : '.$tps->nama_kabupaten}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tps_id'))
                            <span class="text-danger">
                                <strong id="texttps_id">{{ $errors->first('tps_id')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="nama" class=" form-control-label">Nama {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nama" placeholder="Nama {{$title}}" id="nama" class="form-control  {{$errors->has('nama') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nama')}}" required>
                            </div>
                            @if ($errors->has('nama'))
                            <span class="text-danger">
                                <strong id="textNama">{{ $errors->first('nama')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="nik" class=" form-control-label">NIK {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nik" placeholder="NIK {{$title}}" id="nik" class="form-control  {{$errors->has('nik') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nik')}}" required>
                            </div>
                            @if ($errors->has('nik'))
                            <span class="text-danger">
                                <strong id="textnik">{{ $errors->first('nik')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="hp" class=" form-control-label">No HP {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="nohp" placeholder="No HP {{$title}}" id="nohp" class="form-control  {{$errors->has('nohp') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('nohp')}}" required>
                            </div>
                            @if ($errors->has('nohp'))
                            <span class="text-danger">
                                <strong id="textnohp">{{ $errors->first('nohp')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="alamat" class=" form-control-label">Alamat {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="alamat" placeholder="Alamat {{$title}}" id="alamat" class="form-control  {{$errors->has('alamat') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('alamat')}}" required>
                            </div>
                            @if ($errors->has('alamat'))
                            <span class="text-danger">
                                <strong id="textalamat">{{ $errors->first('nik')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="foto" class="control-label">Foto {{$title}}</label>
                            <input type="file" value="foto" name="foto" id="icon" class="form-control" value="{{old('foto')}}">
                        </div>
                        <div class="preview"></div>
                        <div>
                            <br>
                            @if ($errors->has('foto'))
                            <span class="text-danger">Mohon isi foto, upload foto dengan benar. File harus berekstensi JPG, PNG, BMP atau JPEG</span>
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
            $("#nik").keypress(function() {
                $("#nik").removeClass("is-invalid");
                $("#textnik").html("");
            });
            $("#nik").inputFilter(function(value) {
                return /^\d*$/.test(value); // Allow digits only, using a RegExp
            });
            $("#nohp").inputFilter(function(value) {
                return /^\d*$/.test(value); // Allow digits only, using a RegExp
            });
            $("#nohp").keypress(function() {
                $("#nohp").removeClass("is-invalid");
                $("#textnohp").html("");
            });
            $("#alamat").keypress(function() {
                $("#alamat").removeClass("is-invalid");
                $("#textalamat").html("");
            });
            $('#cmbtps').select2({
                placeholder: '--- Pilih TPS---',
                width: '100%'
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(".preview").html("<img src='" + e.target.result + "' width='310' id='image'>");
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#icon").change(function() {
                readURL(this);
                $('.img-responsive').remove();
            });

            $('.close').on('click', function() {
                $('#image').remove();
            });
        });
    </script>
    @endpush