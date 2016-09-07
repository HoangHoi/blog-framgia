@extends('layouts.master')

@section('title', $entry->title)

@section('main')
<div class="panel panel-success">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8">{!! $entry->user()->first()->link() !!}</div>
            <div class="col-md-4">{!! $entry->published_at->format(config('common.date_time_format')) !!}</div>
        </div>
    </div>
    <div class="panel-body">
        {!! $entry->body !!}
    </div>
    <div class="panel-footer">
        <ul class="comment list-group" style="margin-bottom: 10px">

            @foreach($entry->f_comments as $comment)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <div style="color: blue;font-weight: 900">
                            {!! $comment->user_owner->link() !!}
                        </div>
                        <div style="font-size: 0.7em">
                            {!! $comment->updated_at->format(config('common.date_time_format')) !!}
                        </div>
                    </div>
                    <div class="col-md-9">
                        {!! $comment->content !!}
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
        @if(Auth::check() && Auth::user()->allowComment($entry))
        {!! Form::open(['route' => 'entry.comment','class' => 'form-horizontal','id' => 'comment_form']) !!}
        {!! Form::hidden('entry_id',$entry->id) !!}
        {!! Form::text('content', '', ['class' => 'form-control', 'id' => 'comment_text', 'placeholder' => 'Write comment...']) !!}
        {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection

@section('script')
{!! Html::script('js/comment.js') !!}
@endsection

@section('breadCrumb')
<li><a href="{!! route('home') !!}">{!! trans('label.home') !!}</a></li>
<li>{!! $entry->categoryLink() !!}</li>
@endsection
