@extends('adminlte::page')

@section('title', 'Data Jenis')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Jenis</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                <li class="breadcrumb-item active">Data Jenis</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Jenis</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table id="example1" class="table table-bordered table-striped">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('data-jenis.create') }}"> Tambah Data Jenis</a>
                        </div>
                        <thead>
                            <tr>
                                <th>Kode Bahan</th>
                                <th>Kode Jenis</th>
                                <th>Nama Jenis</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datajenis as $key => $jenis)
                                <tr class="text-center">
                                    <td>{{ $jenis->kode_bahan }}</td>
                                    <td>{{ $jenis->kode_jenis }}</td>
                                    <td>{{ $jenis->nama_jenis }}</td>
                                    <td>{{ $jenis->harga }}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['data-jenis.destroy', $jenis->id], 'style' => 'display:inline']) !!}

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                columnDefs: [{
                        className: 'text-center',
                        targets: [0, 2]
                    },
                    {
                        "width": "20%",
                        "targets": 0
                    },
                    {
                        "width": "15%",
                        "targets": 2
                    },
                ],
                language: {
                    url: '/js/datatables/localisation/id.json'
                }
            });
        });
    </script>
@stop
