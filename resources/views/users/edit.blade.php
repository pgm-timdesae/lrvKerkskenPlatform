@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="h-layout">
    <h1>Bewerk profiel</h1>

    @if ($errors->any())
    <div class="danger">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif


    <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="form">
      @csrf
      @method('PUT')
      <div class="form__group">
        <label for="name"><span class="number">01</span>Jouw naam</label>
        <input type="text" name="name" value="{{ $user->name }}">
      </div>

      <div class="form__group">
        <label for="image"><span class="number">02</span>Kies een profielfoto</label>
        <input type="file" name="image" value="{{ $user->image_path }}">
      </div>

      <div class="form__group">
        <label for="email"><span class="number">03</span>Email</label>
        <input type="email" name="email" value="{{ $user->email }}">
      </div>

      <div class="form__group"><span class="number">04</span>Wachtwoord - enkel invullen wanneer je een nieuw wachtwoord wilt.</label>
        <input type="password" name="password" value="{{ $user->password }}">
      </div>

      <div class="form__group">
        <label for="country"><span class="number">05</span>In welk land woon je?</label>
        <input type="text" name="country" value="{{ $user->country }}">
      </div>

      <div class="form__group">
        <label for="city"><span class="number">06</span>Gemeente</label>
        <input type="text" name="city" value="{{ $user->city }}">
      </div>

      <div class="form__group">
        <label for="street"><span class="number">07</span>Straat</label>
        <input type="text" name="street" value="{{ $user->street }}">
      </div>

      <div class="form__group">
        <label for="zipcode"><span class="number">08</span>Postcode</label>
        <input type="number" name="zipcode" value="{{ $user->zipcode }}">
      </div>

      <div class="form__group">
        <label for="bus"><span class="number">09</span>Bus / huisnummer</label>
        <input type="number" name="bus" value="{{ $user->bus }}">
      </div>

      <div class="form__group">
        <label for="phonenumber"><span class="number">10</span>Telefoonnummer</label>
        <input type="number" name="phonenumber" value="0{{ $user->phonenumber }}">
      </div>

      <div class="form__group">        
        <label for="role"><span class="number">11</span>Selecteer je rol binnen de club</label>
        <select name="role" id="role" value="{{ $user->role }}">
          <option value="bestuurslid" {{ $user->role == 'bestuurslid' ? 'selected' : '' }}>bestuurslid</option>
          <option value="wedstrijdruiter" {{ $user->role == 'wedstrijdruiter' ? 'selected' : '' }}>wedstrijdruiter</option>
          <option value="wandelruiter" {{ $user->role == 'wandelruiter' ? 'selected' : '' }}>wandelruiter</option>
          <option value="ouder" {{ $user->role == 'ouder' ? 'selected' : '' }}>ouder</option>
        </select>
      </div>

      <button type="submit" class="btn-primary btn-submit">
        <span>Wijzig profiel</span>
      </button>
    </form>

  </section>
</main>

@endsection