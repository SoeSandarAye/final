@extends('layouts.app')

@section('content')


<div class="container offset-md-4 col-md-4 my-3 py-3 shadow" style="margin-top: 100px;">
    <div class="row ml-5">
        <div class="col-md-2">
            <img src="{{asset('logo/social.png')}}" style="width: 50px;height: 50px">    
        </div>
         
        <div class="col-md-10 py-3 px-4">

             <h3  style="color: #4d636f;"><i><b>24/7 Social App</b></i></h3>
        </div>
       
    </div>
    <div class="row">
        
        <div  class="col">
            <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right"><b>{{ __('E-Mail Address:') }}</b></label>

                            
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-form-label text-md-right"><b>{{ __('Password:') }}</b></label>

                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">
                                 @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            
                        </div>

                        <div class="form-group row form-check mx-1">
                            
                                
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                
                        </div>

                        <div class="form-group mb-0 mx-1 py-3">
                            
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                                <div class="text-center">
                                      @if (Route::has('password.request'))
                                    <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                              

                                <div class="form-group text-center">
                            <a href="{{ route('userregister.index') }}" class="btn btn-link">Create an account</a>
                        </div>
                        </div>

                        
                    </form>
        </div>
    </div>
</div>
@endsection
