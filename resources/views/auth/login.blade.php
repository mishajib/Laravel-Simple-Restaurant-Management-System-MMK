@extends('layouts.app')

@section('site-title', 'Login')

@section('main-content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-centers">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">{{ __('Login') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-5">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email" name="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                                       value="{{ old('email') }}" aria-describedby="emailHelp"
                                       placeholder="Enter your email" required autofocus>
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

                            <div class="form-check">
                                <label for="remember" class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                    <span class="form-check-sign">
              <span class="check"></span>
          </span>
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success ml-5">{{ __('Login') }}</button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mr-5" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
