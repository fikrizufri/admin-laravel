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
                            <label for="kelurahan">Kelurahan</label>
                            <select name="kelurahan_id" class="selected2 form-control" id="cmbkelurahan">
                                <option value="">--Pilih kelurahan--</option>
                                @foreach ($dataKelurahan as $kelurahan)
                                <option value="{{$kelurahan->id}}" {{old('kelurahan_id') == $kelurahan->id ? "selected" : ""}}>{{'Kelurahan : '.$kelurahan->nama.', Kecamatan : '.$kelurahan->nama_kecamatan.', Kabupaten : '.$kelurahan->nama_kabupaten}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kelurahan_id'))
                            <span class="text-danger">
                                <strong id="textkelurahan_id">{{ $errors->first('kelurahan_id')}}</strong>
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

            $("#cmbkabupaten").on("change", function(e) {
                var selected = [];
                selected = $(e.currentTarget).val();

                var _token = $("input[name='_token']").val();

                $.ajax({
                    type: 'get',
                    url: "{{route('kecamatan.detail')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: selected
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {

                            var result = data.map(item => ({
                                id: item.id,
                                text: item.nama
                            }));
                            if (result === undefined || result.length == 0) {
                                $('#cmbkecamatan').val(null).trigger('change');
                                $('#cmbkecamatan').find("option").remove();
                                $('#cmbkecamatan').select2({
                                    containerCssClass: function(e) {
                                        return $(e).attr('required') ? 'required' : '';
                                    }
                                });
                            } else {
                                $('#cmbkecamatan').val(null).trigger('change');
                                $('#cmbkecamatan').find("option").remove();
                                $('#cmbkecamatan').select2({
                                    containerCssClass: function(e) {
                                        return $(e).attr('required') ? 'required' : '';
                                    }
                                });
                                $('#cmbkecamatan').select2({
                                    data: result,
                                }).trigger('change');

                            }
                        }
                    }
                });
            });

            $("#cmbkecamatan").on("change", function(e) {
                var selected = [];
                selected = $(e.currentTarget).val();

                var _token = $("input[name='_token']").val();

                $.ajax({
                    type: 'get',
                    url: "{{route('kelurahan.detail')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: selected
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {

                            var result = data.map(item => ({
                                id: item.id,
                                text: item.nama
                            }));
                            if (result === undefined || result.length == 0) {
                                $('#cmbkelurahan').val(null).trigger('change');
                                $('#cmbkelurahan').find("option").remove();
                                $('#cmbkelurahan').select2({
                                    containerCssClass: function(e) {
                                        return $(e).attr('required') ? 'required' : '';
                                    }
                                });
                            } else {
                                $('#cmbkelurahan').val(null).trigger('change');
                                $('#cmbkelurahan').find("option").remove();
                                $('#cmbkelurahan').select2({
                                    containerCssClass: function(e) {
                                        return $(e).attr('required') ? 'required' : '';
                                    }
                                });
                                $('#cmbkelurahan').select2({
                                    data: result,
                                }).trigger('change');

                            }
                        }
                    }
                });
            });
        });
    </script>
    @endpush