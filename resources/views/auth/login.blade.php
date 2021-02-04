<x-layout
    title="Login"
>
<div class="container-fluid mt-n5 p-5">
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-12 col-md-4 box3 text-light">
                <div class="h1">{{ __('Login') }}</div>
                <div class="h1"><i class="fas fa-arrow-right"></i></div>
            </div>
            <div class="col-12 col-md-7">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                   

                    <div class="form-group row">
                        <label for="password">{{ __('Password') }}</label>

                        
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                   

                    <div class="form-group row">
                       
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                  

                    <div class="form-group row mb-0">
                        
                            <button type="submit" class="btn btn-custom">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                
                </form>
            </div>
        </div>
    </div>
</div>
</x-layout>
