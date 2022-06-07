@extends('layouts.app')

@section('content')

<main class="main-content">
    <div class="h-layout">
      <h1>{{ __('Aanmelden') }}</h1>

      <div class="form form-auth">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form__group">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mailadres') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="timdesaeger@hotmail.be">

            @error('email')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
            @enderror
          </div>

          <div class="form__group">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Wachtwoord') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

            @error('password')
                <span class="invalid-feedback" role="alert">
                  {{ $message }}
                </span>
            @enderror
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Onthoud mij') }}
            </label>
          </div>

          <button type="submit" class="btn-primary btn-submit">
              {{ __('Login') }}
          </button>

          @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                  {{ __('Wachtwoord vergeten?') }}
              </a>
          @endif
        </form>
      </div>
    </div>
</main>
@endsection
