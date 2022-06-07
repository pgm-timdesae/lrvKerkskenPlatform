@extends('layouts.app')

@section('content')

<main class="main-content">
  <div class="h-layout">
    <h1>{{ __('Registreer') }}</h1>

    <div class="form form-auth">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form__group">
              <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Naam') }}</label>

              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tim De Saeger">

              @error('name')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
              @enderror
            </div>

            <div class="form__group">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mailadres') }}</label>

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="timdesaeger@hotmail.be">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
              @enderror
            </div>

            <div class="form__group">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Paswoord') }}</label>

              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
              @enderror
            </div>

            <div class="form__group">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Bevestig Paswoord') }}</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">
              </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registreer') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
</main>
@endsection
