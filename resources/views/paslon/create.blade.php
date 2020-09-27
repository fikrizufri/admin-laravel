@extends('template.app')

@section('content')

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <div>
                                <label for="kode" class=" form-control-label">Kode {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="kode" placeholder="Kode {{$title}}" id="kode" class="form-control  {{$errors->has('kode') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('kode')}}" required>
                            </div>
                            @if ($errors->has('kode'))
                            <span class="text-danger">
                                <strong id="textKode">{{ $errors->first('kode')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="nourut" class=" form-control-label">No Urut</label>
                            </div>
                            <div>
                                <select name="nourut" class="form-control" required>
                                    <option value="">-- Pilih No Urut</option>
                                    <option value="01" {{old('nourut') == '01' ? 'selected' : ''}}>01</option>
                                    <option value="02" {{old('nourut') == '02' ? 'selected' : ''}}>02</option>
                                    <option value="03" {{old('nourut') == '03' ? 'selected' : ''}}>03</option>
                                    <option value="04" {{old('nourut') == '04' ? 'selected' : ''}}>04</option>
                                </select>
                            </div>
                            @if ($errors->has('nourut'))
                            <span class="text-danger">
                                <strong id="textNourut">{{ $errors->first('kode')}}</strong>
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
            $("#kode").keypress(function() {
                $("#kode").removeClass("is-invalid");
                $("#textKode").html("");
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