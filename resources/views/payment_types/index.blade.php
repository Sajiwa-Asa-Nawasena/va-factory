@extends('adminlte::page')

@section('title', __('payment_types.manage_payment_types'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>@lang("payment_types.manage_payment_types")</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">@lang("payment_types.payment_types")</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang("payment_types.card_title_list")</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang("payment_types.number")</th>
                                <th>@lang("payment_types.name")</th>
                                <th>@lang("payment_types.actions")</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentTypes as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('payment-types.index', $user->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('payment-types.edit', $user->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['payment-types.destroy', $user->id], 'style' => 'display:inline']) !!}

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
                        "width": "5%",
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
