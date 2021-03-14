{!! Form::open(['class' => 'crud_ajax', 'url' => route('course-subjects.store'), 'method' => 'POST']) !!}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">@lang('models/inscription.actions.add')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    {!! Form::hidden('inscription_id', $course_id) !!}
                    {!! Form::hidden('subject_id', $course_id) !!}
                        <!-- START REPEAT THIS COL -->
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('value', __('models/course.fillable.name')) !!}
                                {!! Form::text('value', null,['class' => 'form-control']) !!}
                                <p class="invalid" data-feedback="value"></p>
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
