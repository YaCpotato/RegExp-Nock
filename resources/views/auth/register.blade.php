@extends('layouts.app')

@section('content')
<section class="hero is-primary is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                    <div class="card auth-card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                    <p class="control has-icons-left has-icons-right">
                                            <input id="name" class="input" type="text" class="input is-primary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-user-alt"></i>
                                            </span>
                                        </p>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <p class="control has-icons-left has-icons-right">
                                            <input class="input" type="email" placeholder="Email" class="input is-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                            </span>
                                        </p>
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
                                        <p class="control has-icons-left has-icons-right">
                                            <input id="password" class="input is-primary @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-key"></i>
                                            </span>
                                        </p>
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
                                        <p class="control has-icons-left has-icons-right">
                                            <input id="password-confirm" class="input is-primary @error('password') is-invalid @enderror" type="password" name="password_confirmation" value="{{ old('password') }}" required autocomplete="new-password">
                                            <span class="icon is-small is-left">
                                            <i class="fas fa-key"></i>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="button is-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
