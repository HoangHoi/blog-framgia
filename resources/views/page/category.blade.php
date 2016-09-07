@extends('layouts.entries')

@section('breadCrumb')
<li><a href="{!! route('home') !!}">{!! trans('label.home') !!}</a></li>
<li class="active">{!! $category->content !!}</li> 
@endsection
