@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="calendar-page">
    <div class="h-layout">
      <h1>Mijn kalender</h1>
      
      @auth
        <ul class="calendar-list">
          <li class="calendar-list-item">
            <div class="wrapper">
              <p class="datum">Datum</p>
              <p class="event">Naam</p>
              <p class="location">Locatie</p>
            </div>
          </li>
    
          @forelse ($user->events as $event)
          <li class="calendar-list-item">
            <div class="wrapper">
              <p class="datum">{{ $event->date }}</p>
              <p class="event">{{ $event->name }}</p>
              <p class="location">{{ $event->location }}</p>
                <a  class="circle" href="events/{{ $event->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="14 19 21 12 14 5" fill="none" stroke="#000" stroke-miterlimit="10"/><line x1="21" y1="12" x2="2" y2="12" fill="none" stroke="#000" stroke-miterlimit="10"/></svg>
                </a>
            </div>
          </li>
              
          @empty
              <p>Je hebt nog geen inschrijvingen...</p>
          @endforelse
        </ul>
      @endauth

      @guest
          Om je kalender te bekijken moet je aangemeld zijn. 
          Heb je nog geen profiel? Maak dan snel een account aan.

          <a class="btn-primary" href="/login">
            <span>Aanmelden</span>
          </a>

          <a class="btn-primary" href="/login">
            <span>Registreren</span>
          </a>

      @endguest
    </div>
  </section>
</main>



@endsection

