<div class="panel-heading">
    <div class="row" style="position: relative">
        <div class="col-md-8">{!! $entry->user()->first()->link() !!}</div>
        <div class="col-md-4">
            @if($entry->published())
            {!! $entry->published_at->format(config('common.date_time_format')) !!}
            @endif
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
