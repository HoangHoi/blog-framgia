
<div class="panel-heading">
    <div class="row"  style="position: relative">
        <div class="col-md-8">
            <div style="font-weight: 900">
                {!! $entry->user()->first()->link() !!}
            </div>
            <div style="color: red; font-size: 0.9em">
                @if($entry->published())
                {!! $entry->published_at->format(config('common.date_time_format')) !!}
                @else
                {!! Form::open(['route' => 'entry.publish']) !!}
                {!! Form::hidden('entry_id', $entry->id) !!}
                {!! Form::close() !!}
                <a href="#" class="publish_button" style="color: red">Publish</a>
                @endif
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i> {!! $entry->view_count !!}
        </div>
        @if($entry->isYourEntry())
        @include('block.entryMenu')
        @endif
    </div>
</div>

<div class="panel-body">
    <div class="" id="entry_content_{!! $entry->id !!}">
        <div class="title" style="color: blue; font-size: 1.6em;">
            <a href="{!! route('entry.show',$entry->id) !!}">{!! $entry->title !!}</a>
        </div>
        <div class="body">
            {!! $entry->body !!}
        </div>
    </div>
    @if($entry->isYourEntry())
    @include('block.entryForm')
    @endif
</div>
