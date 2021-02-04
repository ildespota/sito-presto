<x-layout
    title="Register"
>
<div class="container-fluid mt-n5 p-5" style="background-color: white;">
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-12 col-md-4 box3 text-light">
                <h1>{{ __('Register') }}</h1>
                <div class="h1"><i class="fas fa-arrow-right"></i></div>
            </div>
            <div class="col-12 col-md-7">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="">{{ __('Name') }}</label>

                    
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  

                    <div class="form-group row">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>

                     
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  

                    <div class="form-group row">
                        <label for="password" class="">{{ __('Password') }}</label>

                      
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                 

                    <div class="form-group row">
                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                      
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                   

                    <div class="form-group row mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-custom">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-layout>