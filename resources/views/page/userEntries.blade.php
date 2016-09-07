@extends('layouts.master')

@section('title', $user->name)

@section('main')
@if($entries->count()>0)
@foreach($entries as $entry)
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8">{!! $user->link() !!}</div>
            <div class="col-md-4">
                @if($entry->published())
                {!! $entry->published_at !!}
                @endif
            </div>
        </div>

    </div>

    <div class="panel-body">
        <div class="title" style="color: blue; font-size: 1.6em;">
            <a href="{!! route('entry.show',$entry->id) !!}">{!! $entry->title !!}</a>
        </div>
        <div class="body">
            {!! $entry->body !!}
        </div>
    </div>

    @if(!$entry->published())
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-2 col-md-offset-10">
                {!! Form::open(['route' => 'entry.publish']) !!}
                {!! Form::hidden('entry_id', $entry->id) !!}
                {!! Form::submit(trans('label.publish'),['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endif
</div>
@endforeach
@else
<h4>{!! trans('general.box_empty') !!}</h4>
@endif
@endsection

@section('breadCrumb')
<li><a href="{!! route('home') !!}">{!! trans('label.home') !!}</a></li>
<li class="active">{!! $user->name !!}</li> 
@endsection

@section('rightMenu')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">{!! trans('label.name') !!}</div><div class="col-md-8">{!! $user->name !!}</div>
            <div class="col-md-4">{!! trans('label.email') !!}</div><div class="col-md-8">{!! $user->email !!}</div>
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