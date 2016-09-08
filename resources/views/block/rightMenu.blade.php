@foreach($best_entries as $entry)
<div class="panel panel-default">
    <div class="panel-body">
        <div style="font-size: 1.3em"><a href="{!! route('entry.show',$entry->id) !!}">{!! $entry->title !!}</a></div>
        <div>{!! Str::words($entry->body, 10, "...") !!}</div>
        <div style="font-size: 0.9em">
            {!! $entry->user()->first()->link() !!}
            {!! $entry->published_at->format(config('common.date_time_format')) !!}
        </div>
    </div>
</div>
@endforeach
<!--<div class="panel panel-default">
    <div class="panel-body">Panel Content</div>
</div>-->
