@extends('adminlte::page')

@section('title', __('Settings'))

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>@lang("Settings")</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">@lang("Settings")</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12 col-12">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <!-- ./col -->

    </div>
    <!-- /.row -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(function() {

        });
    </script>
@stop
