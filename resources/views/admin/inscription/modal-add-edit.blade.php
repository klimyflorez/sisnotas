{!! Form::open(['class' => 'crud_ajax', 'url' => $inscription->exists? route('inscriptions.update', ['inscription' => $inscription->id]) : route('inscriptions.store'), 'method' => $inscription->exists? 'PUT' : 'POST']) !!}
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if($inscription->exists)
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/inscription.actions.edit') - {{ $inscription->label }}</h4>
                    @else
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('models/inscription.actions.add')</h4>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- START REPEAT THIS COL -->
                        <div class="col-md-6">
                            <div class="form-group m-b-40 focused">
                                {!! Form::text('item', $inscription->item, ['class' => 'form-control']) !!}
                                <span class="bar"></span>
                                {!! Form::label('item', __('models/inscription.fillable.item')) !!}
                                <div style="color:red" data-feedback="item"></div>
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
