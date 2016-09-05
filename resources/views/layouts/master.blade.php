@extends('layouts.basic')

@section('content')
<div class="row">
    <div class="col-lg-3" style="position: static">
        @include('block.leftMenu')
    </div>
    <div class="col-lg-6">
        @yield('main')
    </div>
    <div class="col-lg-3">
        @include('block.rightMenu')
    </div>
</div>
@endsection
