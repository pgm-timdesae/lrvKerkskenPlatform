@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="myprofile h-layout">
    <h1>Mijn profiel</h1>

    <div class="wrapper">
      <div class="image">
          <img src="{{ asset('storage/images/' . $user->image_path) }}" alt="profile picture"> 
      </div>
  
      <div class="text">
        <div class="text-group">
          <h2>{{ $user->name }}</h2>
          <span class="role">{{ $user->role }}</span>
        </div>
        
        <div class="text-group">
          <h3>Persoonlijke gegevens</h3>
          <span class="small-title">Email</span>
          <p>{{ $user->email }}</p>
        </div>
    
        <div class="text-group">
          <span class="small-title">Adres</span>
          <p>{{ $user->street }} {{ $user->bus }}</p>
          <p>{{ $user->zipcode }} {{ $user->city }}</p>
          <p>{{ $user->country }}</p>
        </div>
    
        <div class="text-group">
          <span class="small-title">Telefoonnummer</span>
          <p>+32{{ $user->phonenumber }}</p>
        </div>
      </div>

      <a href="{{ $user->id }}/edit">
        <svg class="svg-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polygon points="7.5 16.5 8 13.5 18.5 3 19.5 3 21 4.5 21 5.5 10.5 16 7.5 16.5" fill="none" stroke="#000" stroke-miterlimit="10"/><line x1="16.5" y1="4.5" x2="19.5" y2="7.5" fill="none" stroke="#000" stroke-miterlimit="10"/><polyline points="16.5 15.5 16.5 21.5 2.5 21.5 2.5 7.5 8.5 7.5" fill="none" stroke="#000"/></svg>
      </a>
    </div>


  </section>
</main>

@endsection