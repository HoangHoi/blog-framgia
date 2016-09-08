@extends('layouts.basic')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('block.leftMenu')
    </div>
    <div class="col-md-6">
        <ul class="breadcrumb">
            @yield('breadCrumb')
        </ul>
        <div id="message"></div>
        @yield('main')
    </div>
    <div class="col-md-3">
        <div class="panel-group">
            @yield('rightMenu')
            @include('block.rightMenu')
        </div>
    </div>
</div>
@endsection
