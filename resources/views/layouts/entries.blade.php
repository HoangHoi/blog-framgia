@extends('layouts.master')

@section('main')
@if(count($entries)>0)
@foreach($entries as $entry)
<?php
$user = $entry->user()->first();
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8">{!! $user->link() !!}</div>
            <div class="col-md-4">{!! $entry->published_at !!}</div>
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
</div>
@endforeach
@else
<h4>{!! trans('general.box_empty') !!}</h4>
@endif
@endsection
