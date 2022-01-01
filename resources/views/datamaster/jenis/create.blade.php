@extends('adminlte::page')

@section('title', "Tamabah Data Jenis")

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah Data Jenis</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                <li class="breadcrumb-item active">Tambah Data Jenis</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Jenis</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'data-jenis.store', 'method' => 'POST']) !!}
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode_bahan">Kode Bahan</label>
                        <select class="form-control" name="kode_bahan">
                          @foreach($databahan as $item)
                            <option value="{{$item->kode_bahan}}">{{$item->nama_bahan}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_Jenis">Kode Jenis</label>
                        {!! Form::text('kode_jenis', null, ['placeholder' => 'Masukan Kode Jenis', 'class' => 'form-control' ,'required']) !!}
                    </div>
                    <div class="form-group">
                        <label for="nama_Jenis">Nama Jenis</label>
                        {!! Form::text('nama_jenis', null, ['placeholder' => 'Masukan Nama Jenis', 'class' => 'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        <label for="harga">Haarga</label>
                        {!! Form::number('harga', null, ['placeholder' => 'Masukan Harga', 'class' => 'form-control','required']) !!}
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
