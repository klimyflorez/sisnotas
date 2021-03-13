{!! Form::open(['class' => 'crud_ajax', 'url' => $course->exists? route('courses.update', ['course' => $course->id]) : route('courses.store'), 'method' => $course->exists? 'PUT' : 'POST']) !!}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if($course->exists)
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/course.actions.edit') - {{ $course->name }}</h4>
                    @else
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/course.actions.add')</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- START REPEAT THIS COL -->
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('name', __('models/course.fillable.name')) !!}
                                {!! Form::text('name', $course->name, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                <div class="invalid-feedback" data-feedback="item"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('description', __('models/course.fillable.description')) !!}
                                {!! Form::textarea('description', $course->description, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                <div class="invalid-feedback" data-feedback="item"></div>
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
