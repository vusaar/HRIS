@extends('tabler::auth.content-wrapper')

@section('content')
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                   
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="card-body p-3">
                           
                            <div class="form-group">
                            <span>
                             <img  src='images/logo.png' style= 'width:50%;padding:2px;display: block;margin-left: auto;margin-right: auto;'/>
                            </span>
                            </div>
                  <div class="form-group text-center">
                     <span class='text-center'>
                        <span class='btn bg-lime text-white'>YOUR</span>
                        <span class='btn bg-orange text-white'> HRIS</span>
                     </span>
                            </div>
                             
                            <div class="form-group">
                                <label class="form-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    {{ __('Password') }}
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"  class="float-right small success">I forgot password</a>
                                    @endif
                                </label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox" for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="custom-control-label">{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-success btn-block">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
