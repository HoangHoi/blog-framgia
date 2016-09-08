<div class="dropdown" style="position: absolute; right: 2%;">
    <div class="" style="cursor: pointer" data-toggle="dropdown"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
    <ul class="dropdown-menu">
        <li><a href="#" class="edit_button" data-entry-id ="{!! $entry->id !!}" >Edit</a></li>
        <li>
            {!! Form::open(['action' => ['EntryController@destroy', $entry->id], 'method' => 'delete']) !!}
            {!! Form::hidden('entry_id', $entry->id) !!}
            {!! Form::close() !!}
            <a href="#" class="delete_button">Delete</a>
        </li>
        @if(!$entry->published())
        <li>
            {!! Form::open(['route' => 'entry.publish']) !!}
            {!! Form::hidden('entry_id', $entry->id) !!}
            {!! Form::close() !!}
            <a href="#" class="publish_button">Publish</a>
        </li>
        @endif
    </ul>
</div>
