@extends('frontend.authmain')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{--<input type="hidden" name="type" value="agent">--}}
                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" required autocomplete="name" autofocus>

                                @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" required autocomplete="name" autofocus>

                                @error('l_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">User Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    @php

                     $languages = \Illuminate\Support\Facades\DB::table('languages')

                                ->select('id','name','locale')

                                // ->where('default','=',0)

                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

                                ->orderBy('name','ASC')

                                ->get();

                 \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

                @endphp
                <div class="ps-page ps-page--inner ps-page--auth">

                </div>
    <div class="ps-page__content">
        <div class="container">
            <form class="ps-form--auth ps-form--sinup" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="ps-form__top">
                    <h3>Register New Account</h3>
                    <p>Let's get you all set up so you can verify your personal account and begin setting up your profile.</p>
                </div>
                <div class="ps-form__fields">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="ps-form underline">
                                    <input class="form-control" type="text" name="f_name" value="{{ old('f_name') }}" required autocomplete="name" autofocus placeholder=" " />
                                    <label>First Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="ps-form underline">
                                    <input class="form-control" type="text" name="l_name" value="{{ old('l_name') }}" required autocomplete="name" autofocus placeholder=" " />
                                    <label>Last Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="ps-form underline">
                                    <input class="form-control" type="text" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder=" " />
                                    <label>Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="ps-form underline">
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder=" " />
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="ps-form underline">
                                    <input class="form-control" id="password" type="password" name="password" required autocomplete="new-password" placeholder=" ">
                                    <label for="password">{{ __('Password') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="ps-form underline">
                                    <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder=" ">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="ps-checkbox">
                            <input class="form-control" type="checkbox"  name="remember" id="remember" checked>
                            <label for="remember">I agree to all <a href="{{URL::asset('/terms')}}">Terms & Conditions</a></label>
                        </div>
                    </div>
                </div>
                <div class="ps-form__submit">
                    <button class="ps-btn" type="submit">{{ __('Register') }}</button>
                </div>
                <div class="ps-form__links">
                    <p>Already have an account?<a href="{{url('/login')}}"> {{ trans('file.login') }}</a></p>
                </div>
            </form>
        </div>
    </div></div>
    <br><br><br><br>
@endsection
