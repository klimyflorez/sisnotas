{!! Form::open(['class' => 'floating-labels delete-ajax', 'url' => route('subjects.destroy', ['subject' => $subject->id])]) !!}
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">@lang('models/subject.actions.destroy') - {{ $subject->label }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h4 class="text-center text-danger">@lang('global.confirm_delete', ['label' => $subject->label])</h4>
            </div>
            <div class="modal-footer">
                {!! Form::button(__('global.no'), ['class' => 'btn btn-danger waves-effect text-left', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit(__('global.yes'), ['class' => 'btn btn-success waves-effect text-left']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
