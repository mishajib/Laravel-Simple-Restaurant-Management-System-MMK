@extends('layouts.app')

@section('site-title', 'Register')

@section('main-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-centers">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ __('Register') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mb-5">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                           value="{{ old('name') }}" aria-describedby="emailHelp"
                                           placeholder="Enter your name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group mb-5">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input type="email" name="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           id="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group mb-5">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" name="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           id="password" placeholder="Enter your password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group mb-5">
                                    <label for="email">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="email"
                                           placeholder="Enter your confirm password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-5">{{ __('Register') }}</button>
                                    <a href="{{ route('login') }}">If you're already register! Click Here to Login.</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
