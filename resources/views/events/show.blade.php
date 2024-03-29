@extends('layouts.app')

@section('content')

@if ($event)
  <main class="main-content">
    <div class="detail-page h-layout">
      <h1>{{ $event->name }}</h1>

      @if (Session::has('message'))
        <div class="succes" role="alert">
            {{ Session::get('message') }}
        </div>
      @endif


      <div class="flex">
        <div class="detail-main">
          <h2>Schrijf je hier in</h2>
          <form action="/mycalendar" method="POST" class="form">
            @csrf  
            
            <div class="form__group">        
              <label for="time"><span class="number">01</span>Kies je tijdslot of klasse</label>
              <select name="time" id="time">
                <option value="one">Tijdslot 1: 18u00 - 18u30</option>
                <option value="two">Tijdslot 2: 18u30 - 19u00</option>
                <option value="tree">Tijdslot 3: 19u00 - 19u30</option>
                <option value="no">Geen tijdslot nodig</option>
              </select>
            </div>

            <div class="form__group">        
              <input type="hidden" name="event_id" value="{{ $event->id }}">
            </div>
      
            @auth
              <button type="submit" class="btn-primary btn-submit">
                <span>Inschrijven</span>
              </button>
            @endauth
            @guest
               <p>Om in te schrijven met je ingelogd zijn!</p> 
            @endguest
          </form>
        </div>
  
        <div class="detail-sidebar">
          <div class="text-group">
            <span class="small-title">Datum</span>
            <p>{{ $event->date }}</p>
          </div>

          <div class="text-group">
            <span class="small-title">Locatie</span>
            <p>{{ $event->location }}</p>
          </div>

          <div class="text-group">
            <span class="small-title">Categorie</span>
            <p>
              <a href="#" class="tag">{{ $event->category->name }}</a>
            </p>
          </div>

          <div class="text-group">
            <span class="small-title">Beschrijving</span>
            <p>{{ $event->description }}</p>
          </div>
        </div>
      </div>

      <div class="going">
        <h2>Deze leden zijn reeds ingeschreven!</h2>
        <ul class="users-list">
          @forelse ($event->users as $user)
          <li class="users-list-item">
            <p class="username">{{ $user->name }}</p>

            @switch($user->pivot->time)
            @case('one')
            <p class="time">tijdslot 1: 18u00-18u30</p>
            @break
            @case('two')
            <p class="time">tijdslot 2: 18u30-19u00</p>
                @break
            @case('tree')
            <p class="time">tijdslot 3: 19u00-19u30</p>
                @break
            @case('No')
            <p class="time">geen tijdslot</p>
                @break
            @default
            <p class="time">geen tijdslot</p>
          @endswitch
          </li>
              
          @empty
              <p>Nog niemand gaat pfff...</p>
          @endforelse
        </ul>
      </div>
    </div>
  </main>
    
@endif


@endsection

