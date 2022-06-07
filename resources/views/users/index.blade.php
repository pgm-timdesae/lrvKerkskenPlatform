@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="users-page h-layout">
    <h1>Leden</h1>

    <div class="search-box">
      <form action="#" method="GET">
        <div class="flex">
          <input class="search-input" type="text" name="search" placeholder="Zoek op naam">
          <button class="search-btn" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5" fill="none" stroke="#000"/><line x1="20.4" y1="20.5" x2="15.5" y2="15.7" fill="none" stroke="#000"/></svg>        
          </button>
        </div>
      </form>
    </div>

    <ul class="users-list">
      @foreach ($users as $user)
        <li class="users-list-item">
          <div class="wrapper">
            <div class="inner-wrap">
              <div class="image">
                <div class="image-left">
                  <img src="{{ asset('storage/images/' . $user->image_path) }}" alt="profile picture">
                </div>
                <div class="image-right">
                  <span class="role">{{ $user->role }}</span>
                  <h2>{{ $user->name }}</h2>
                </div>
              </div>

              <div class="stroke"></div>

              <div class="text">
                <div class="text-group">
                  <span class="small-title">Email</span>
                  <p>{{ $user->email }}</p>
                </div>

                <div class="text-group">
                  <span class="small-title">Adres</span>
                  <p>{{ $user->street }} {{ $user->bus }}</p>
                  <p>{{ $user->zipcode }} {{ $user->city }}</p>
                </div>

                <div class="text-group">
                  <span class="small-title">Telefoonnummer</span>
                  <p>+32{{ $user->phonenumber }}</p>
                </div>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>

  </section>
</main>

@endsection