@extends('layouts.master')

@section('main')
@if($entries->count()>0)
@foreach($entries as $entry)
<div class="panel panel-default">
    @include('block.entryContent')
</div>
@endforeach
{!! $entries->render() !!}
@else
<h4>{!! trans('general.box_empty') !!}</h4>
@endif
@endsection
