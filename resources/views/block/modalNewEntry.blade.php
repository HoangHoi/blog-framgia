<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{!! trans('general.create_entry') !!}</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['class' => 'form-horizontal', 'id' => 'form_new_entry']) !!}
                <div class="form-group">
                    {!! Form::label('category', trans('label.category'), ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::select('category_id', isset($categories)?$categories:['1'=>'test'], null, ['class' => 'form-control', 'placeholder' => 'Pick a size...', 'id' => 'category_id']); !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('title', trans('label.title'), ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::text('title', '', ['class' => 'form-control', 'id' => 'title']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('body', trans('label.body'), ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('body', '', ['class' => 'form-control', 'id' => 'body']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-7">
                        {!! Form::button(trans('label.save'), ['class' => 'btn btn-primary', 'id' => 'btn_save']) !!}
                        {!! Form::button(trans('label.publish'), ['class' => 'btn btn-success', 'id' => 'btn_publish']) !!}
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
