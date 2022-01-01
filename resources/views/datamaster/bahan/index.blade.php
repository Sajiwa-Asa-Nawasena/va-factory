@extends('adminlte::page')

@section('title', 'Data Bahan')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Bahan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                <li class="breadcrumb-item active">Data Bahan</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Bahan</h3>
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
                            <a class="btn btn-success" href="{{ route('data-bahan.create') }}"> Tambah Data Bahan</a>
                        </div>
                        <thead>
                            <tr>
                                <th>Kode Bahan</th>
                                <th>Nama Bahan</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($databahan as $key => $bahan)
                                <tr class="text-center">
                                    <td>{{ $bahan->kode_bahan }}</td>
                                    <td>{{ $bahan->nama_bahan }}</td>
                                    <td>{{ $bahan->harga }}</td>
                                    <td>
                                        {{-- <a class="btn btn-sm btn-info" href="{{ route('data-bahan.index', $bahan->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('data-bahan.edit', $bahan->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a> --}}
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['data-bahan.destroy', $bahan->id], 'style' => 'display:inline']) !!}

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
