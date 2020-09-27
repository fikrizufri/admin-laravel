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
                            <label for="saksi">Saksi</label>
                            <select name="saksi_id" class="selected2 form-control" id="cmbsaksi">
                                <option value="">--Pilih Saksi--</option>
                                @foreach ($dataSaksi as $saksi)
                                <option value="{{$saksi->id}}" {{old('saksi') == $saksi->id ? "selected" : ""}}>{{'Saksi : '.$saksi->nama.', No Hp :'.$saksi->nohp}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('saksi_id'))
                            <span class="text-danger">
                                <strong id="textsaksi">{{ $errors->first('saksi_id')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="paslon">Paslon</label>
                            <select name="paslon_id" class="selected2 form-control" id="cmbpaslon">
                                <option value="">--Pilih Paslon--</option>
                                @foreach ($dataPaslon as $paslon)
                                <option value="{{$paslon->id}}" {{old('paslon') == $paslon->id ? "selected" : ""}}>{{'Nama Paslon : '.$paslon->nama.', No Urut :'.$paslon->nourut}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('paslon'))
                            <span class="text-danger">
                                <strong id="textpaslon">{{ $errors->first('paslon')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="jumlah" class=" form-control-label">Jumlah {{$title}}</label>
                            </div>
                            <div>
                                <input type="text" name="jumlah" placeholder="Jumlah {{$title}}" id="jumlah" class="form-control  {{$errors->has('jumlah') ? 'form-control is-invalid' : 'form-control'}}" value="{{old('jumlah')}}" required>
                            </div>
                            @if ($errors->has('jumlah'))
                            <span class="text-danger">
                                <strong id="textjumlah">{{ $errors->first('jumlah')}}</strong>
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
            $("#jumlah").keypress(function() {
                $("#jumlah").removeClass("is-invalid");
                $("#textjumlah").html("");
            });
            $("#jumlah").inputFilter(function(value) {
                return /^\d*$/.test(value); // Allow digits only, using a RegExp
            });
            $('#cmbsaksi').select2({
                placeholder: '--- Pilih Saksi---',
                width: '100%'
            });
            $('#cmbpaslon').select2({
                placeholder: '--- Pilih Paslon---',
                width: '100%'
            });
        });
    </script>
    @endpush