<div class="entry_form" id="entry_form_{!! $entry->id !!}" style="display: none">
    <button type="button" class="close" data-entry-id="{!! $entry->id !!}">&times;</button>
    {!! Form::open(['class' => 'form-horizontal', 'id' => 'form_edit_entry_'.$entry->id, 'method' => 'put']) !!}
    {!! Form::hidden('id', $entry->id) !!}
    <div class="form-group">
        {!! Form::label('category', trans('label.category'), ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-8">
            {!! Form::select('category_id', isset($categories)?$categories:['1'=>'test'], $entry->category_id, ['class' => 'form-control', 'placeholder' => 'Pick a size...', 'id' => 'category_id_'.$entry->id]); !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('title', trans('label.title'), ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-8">
            {!! Form::text('title', $entry->title, ['class' => 'form-control', 'id' => 'title_'.$entry->id]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('body', trans('label.body'), ['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-8">
            {!! Form::textarea('body', $entry->body, ['class' => 'form-control', 'id' => 'body_'.$entry->id]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-5 col-md-offset-7">
            {!! Form::button(trans('label.save'), ['class' => 'btn btn-primary btn_save', 'id' => 'btn_save_'.$entry->id, 'data-entry-id' => $entry->id]) !!}

            @if(!$entry->published())
            {!! Form::button(trans('label.publish'), ['class' => 'btn btn-success btn_publish', 'id' => 'btn_publish_'.$entry->id, 'data-entry-id' => $entry->id]) !!}
            @endif
        </div>
    </div>
    {!! Form::close() !!}
</div>
