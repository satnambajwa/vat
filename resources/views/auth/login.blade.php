@extends('layouts.site')
@section('content')
<section class="login-sec">
   <div class="container">
        <div class="row login-mid">
        <div class="col-md-6 d-none d-lg-block">

            <div class="login-img">
            
                <img src="assets/images/form.jpg" class="img-fluid" alt="form">
        
            </div>
        </div>
        <div class="col-md-6 col-sm-12 side-form">
             <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div style="margin: 0 auto; display: table;" >
                            <a class="btn btn-link" href="{{ route('site') }}">
                                <img src="assets/images/form-logo.png" class="img-fluid" alt="logo">
                            </a>
                        </div>
                        <p class="login-text">Sign In</p>
                        <div class="form-group ">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} login-box" name="email" value="{{ old('email') }}" required autofocus>
                            
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} login-box" name="password" required>
                    
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group form-check">
                            <div class="row">
                                <div class="col-md-5 col-sm-12 col-12 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                
                                    </div>
                                </div>

                                <div class="col-md-7 col-sm-12 col-12 ">
                                
                                <div class="forgot">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                               </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info login-btn ">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
         </div>
         
      </div>
   </div>
</section>
@endsection