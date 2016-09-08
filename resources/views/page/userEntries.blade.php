@extends('layouts.master')

@section('title', $user->name)

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

@section('breadCrumb')
<li><a href="{!! route('home') !!}">{!! trans('label.home') !!}</a></li>
<li class="active">{!! $user->name !!}</li> 
@endsection

@section('rightMenu')
<div class="panel panel-info">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">{!! trans('label.name') !!}</div><div class="col-md-9">{!! $user->name !!}</div>
            <div class="col-md-3">{!! trans('label.email') !!}</div><div class="col-md-9">{!! $user->email !!}</div>
            <div class="col-md-3">{!! trans('label.num_entry') !!}</div><div class="col-md-9">{!! $entries->count() !!}</div>
            @if(Auth::check() && Auth::user()->id != $user->id)
            <div class="col-md-4 col-md-offset-7">
                {!! Form::open(['route' => 'user.follow']) !!}
                {!! Form::hidden('user_id', $user->id) !!}

                @if(Auth::user()->isFollow($user->id))
                {!! Form::hidden('action', 'unfollow') !!}
                {!! Form::submit(trans('label.unfollow'),['class' => 'btn btn-primary', 'style' => 'margin-top: 15px']) !!}
                @else
                {!! Form::hidden('action', 'follow') !!}
                {!! Form::submit(trans('label.follow'),['class' => 'btn btn-primary', 'style' => 'margin-top: 15px']) !!}
                @endif
                {!! Form::close() !!}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
