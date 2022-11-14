@extends('layouts.app')

@section('content')



            <body>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

                <div class="container">
                  <div class="content">
                    <div class="left-content">
                      <div class="carousell">
                        <div class="slider-wrapper">
                          <div class="overflow-wrapper">
                            <img src="{{ asset('front/assets/slider1.png') }}" alt="">
                            <img src="{{ asset('front/assets/slider2.png') }}" alt="">
                            <img src="{{ asset('front/assets/slider3.png') }}" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="right-content">
                      <div class="data">
                        <div class="logo">
                          <img src="{{  asset('front/assets/trolley.png')  }}" alt="">
                          <p>ZenIT</p>
                        </div>
                        <div class="form-data">
                          <h1>Welcome Back</h1>
                          <form method="POST" action="{{ route('login') }}" id="registration">
                            @csrf

                            <div class="email">
                              <label for="email">{{ __('Email Address') }}</label>
                              <input type="email" class="input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email">
                            </div>


                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                            <div class="password">
                              <label for="password">Password</label>
                              <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                              >
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            <div class="btn-submit">
                              <button type="submit" value="Login" id="submit">Login</button>
                            </div>
                          </form>
                          <div class="signin">
                            <p>Didn't have account yet? <span><a href="registseller.html">Sign Up</a></span></p>
                          </div>
                          <div class="flex items-center justify-end mb-4 align-middle ">
                            <a href="/auth/google">
                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                            </a>
                        </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </body>


@endsection



