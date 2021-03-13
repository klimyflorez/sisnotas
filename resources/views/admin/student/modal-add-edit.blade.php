{!! Form::open(['class' => 'save-ajax', 'url' => $student->exists? route('students.update', ['student' => $student->id]) : route('students.store'),
    'method' => $student->exists? 'PUT' : 'POST']) !!}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if($student->exists)
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/student.actions.edit') - {{ $student->first_name }}</h4>
                    @else
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/student.actions.add')</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- START REPEAT THIS COL -->
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::number('identification', $student->identification, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                {!! Form::label('identification', __('models/student.fillable.identification')) !!}
                                <div class="invalid-feedback" data-feedback="item"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::text('first_name', $student->first_name, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                {!! Form::label('first_name', __('models/student.fillable.first_name')) !!}
                                <div class="invalid-feedback" data-feedback="item"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::text('last_name', $student->item, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                {!! Form::label('last_name', __('models/student.fillable.item')) !!}
                                <div class="invalid-feedback" data-feedback="item"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::text('phone', $student->phone, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                {!! Form::label('phone', __('models/student.fillable.phone')) !!}
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
