@extends('adminlte::page')

@section('title', __('cash_flows.manage_cash_flows'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>@lang("cash_flows.manage_cash_flows")</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">@lang("cash_flows.cash_flow_types")</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang("cash_flows.card_title_list")</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang("cash_flows.number")</th>
                                <th>@lang("cash_flows.date")</th>
                                <th>@lang("cash_flows.cash_flow_type")</th>
                                <th>@lang("cash_flows.payment_type")</th>
                                <th>@lang("cash_flows.amount")</th>
                                <th>@lang("cash_flows.description")</th>
                                <th>@lang("cash_flows.actions")</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cashFlows as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->date }}</td>
                                    <td>{{ $user->cash_flow_type }}</td>
                                    <td>{{ $user->payment_type }}</td>
                                    <td>{{ $user->amount }}</td>
                                    <td>{{ $user->description }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('cash-flows.index', $user->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('cash-flows.edit', $user->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['cash-flows.destroy', $user->id], 'style' => 'display:inline']) !!}

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
            // $("#example1").DataTable({
            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     columnDefs: [{
            //             className: 'text-center',
            //             targets: [0, 2]
            //         },
            //         {
            //             "width": "5%",
            //             "targets": 0
            //         },
            //         {
            //             "width": "15%",
            //             "targets": 2
            //         },
            //     ],
            //     language: {
            //         url: '/js/datatables/localisation/id.json'
            //     }
            // });
        });
    </script>
@stop
