{!! Form::open(['class' => 'crud_ajax', 'url' => $subject->exists? route('subjects.update', ['subject' => $subject->id]) : route('subjects.store'), 'method' => $subject->exists? 'PUT' : 'POST']) !!}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if($subject->exists)
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/subject.actions.edit') - {{ $subject->name }}</h4>
                    @else
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/subject.actions.add')</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- START REPEAT THIS COL -->
                        <div class="col-md-12">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('name', __('models/subject.fillable.name')) !!}
                                {!! Form::text('name', $subject->name, ['class' => 'form-control']) !!}
                                <p style="color:red" data-feedback="name"></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40 focused">
                                {!! Form::label('description', __('models/subject.fillable.description')) !!}
                                {!! Form::textarea('description', $subject->description, ['class' => 'form-control']) !!}
                                <p style="color:red" data-feedback="description"></p>
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
