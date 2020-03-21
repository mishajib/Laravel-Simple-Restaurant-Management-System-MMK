@extends('layouts.app')
@section('site-title', 'Forgot Password')

@section('main-content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-centers">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title">{{ __('Reset Password') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email" name="name"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="name"
                                       value="{{ old('name') }}" aria-describedby="emailHelp"
                                       placeholder="Enter your name" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-danger">{{ __('Send Password Reset Link') }}</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
