{!! Form::open(['class' => 'crud_ajax', 'url' => route('course-student.store'), 'method' => 'POST']) !!}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">@lang('models/note.action.add')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    {!! Form::hidden('inscription_id', 1) !!}
                    {!! Form::hidden('subject_id', $subject_id) !!}
                        <!-- START REPEAT THIS COL -->
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('value', __('models/note.fillable.value')) !!}
                                {!! Form::number('value', null,['class' => 'form-control']) !!}
                                <p style="color:red" data-feedback="value"></p>
                            </div>
                        </div>
                        <!-- END REPEAT THIS COL -->
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button(__('global.close'), ['class' => 'btn btn-danger waves-effect text-left', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit(__('global.save'), ['class' => 'btn btn-success waves-effect text-left']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
