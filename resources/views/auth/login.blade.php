@extends('layouts.auth.app')

@section('css')
    <style>
        /* enable absolute positioning */
        .inner-addon {
            position: relative;
        }

        /* style icon */
        .inner-addon .fa {
            position: absolute;
            padding: 10px;
            pointer-events: visible;
            cursor: pointer;
        }

        /* align icon */
        .left-addon .fa  { left:  0px;}
        .right-addon .fa { right: 0px;}

        /* add padding  */
        .left-addon input  { padding-left:  30px; }
        .right-addon input { padding-right: 30px; }
    </style>
@endsection

@section('content')
    <form class="form-horizontal form-material" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group ">
            <div class="col-xs-12">
                <input id="email" placeholder="@lang('auth.email')" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="inner-addon right-addon">
                    <input id="password" placeholder="@lang('auth.password')" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="show-password"><i class="fa-pas fa fa-eye"></i></span>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 font-14">
                <div class="checkbox checkbox-primary pull-left p-t-0">
                    <input id="checkbox-signup" type="checkbox">
                    <label for="checkbox-signup">@lang('auth.remember_me')</label>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <div class="col-xs-12">
                <button class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light" type="submit">@lang('auth.login')</button>
            </div>
        </div>

    </form>
@endsection
