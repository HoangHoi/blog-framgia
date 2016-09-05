@extends('layouts.basic')

@section('title',trans('title.error'))

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
            <div class="panel-heading">{!! trans('title.error') !!}</div>

            <div class="panel-body">
                {!! trans('general.error_503') !!}
            </div>
        </div>
    </div>
</div>
@endsection
