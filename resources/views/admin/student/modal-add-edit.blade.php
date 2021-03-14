{!! Form::open(['class' => 'crud_ajax', 'url' => $student->exists? route('students.update', ['student' => $student->id]) : route('students.store'),
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
                                {!! Form::label('identification', __('models/student.fillable.identification')) !!}
                                {!! Form::number('identification', $student->identification, ['class' => 'form-control']) !!}
                                <p class="invalid" data-feedback="identification"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('first_name', __('models/student.fillable.first_name')) !!}
                                {!! Form::text('first_name', $student->first_name, ['class' => 'form-control']) !!}
                                <p class="invalid" data-feedback="first_name"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('last_name', __('models/student.fillable.last_name')) !!}
                                {!! Form::text('last_name', $student->last_name, ['class' => 'form-control']) !!}
                                <p class="invalid" data-feedback="last_name"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('phone', __('models/student.fillable.phone')) !!}
                                {!! Form::number('phone', $student->phone, ['class' => 'form-control']) !!}
                                <p class="invalid" data-feedback="phone"></p>
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
