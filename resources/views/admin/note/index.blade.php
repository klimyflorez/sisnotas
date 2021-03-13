@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-b-0 float-left">{{trans_choice('models/note.module', 2)}}</h4>
                    <a href="{{ route('notes.create') }}" class="btn btn-outline-secondary btn-rounded btn-sm float-right open-modal"><i class="mdi mdi-counter"></i>&nbsp;&nbsp;@lang('models/note.actions.add')</a>
                    <div class="table-responsive mt-40">
                        {!! $table->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! $table->scripts() !!}
@endsection
