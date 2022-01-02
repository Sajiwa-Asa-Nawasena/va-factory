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
                    <h3 class="card-title">@lang("cash_flows.card_title_create")</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!! Form::open(['route' => 'cash-flows.store', 'method' => 'POST']) !!}
                {!! Form::hidden('users_id', Auth::id()) !!}
                <div class="card-body">
                    <div class="form-group">
                        <label for="cash_flow_type">Jenis Kas</label>
                        <select name="cash_flow_types_id" id="cash_flow_type" class="form-control">
                            <option value="" selected disabled>-- PILIH SATU --</option>
                            @foreach ($cashFlowTypes as $cashFlowType)
                                <option value="{{ $cashFlowType->id }}">{{ $cashFlowType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_type">Jenis Pembayaran</label>
                        <select name="payment_types_id" id="payment_type" class="form-control">
                            <option value="" selected disabled>-- PILIH SATU --</option>
                            @foreach ($paymentTypes as $paymentType)
                                <option value="{{ $paymentType->id }}">{{ $paymentType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        {!! Form::text('date', null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'date']) !!}
                    </div>
                    <div class="form-group">
                        <label for="amount">Jumlah nominal</label>
                        {!! Form::text('amount', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
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
    <script type="text/javascript">
        $(function() {
            $("#date").datepicker({
                todayHighlight: true,
                autoclose: true,
                dateFormat: 'dd-mm-yy',
                maxDate: new Date()
            });
        });
    </script>
@stop
