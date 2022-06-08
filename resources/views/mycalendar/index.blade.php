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
              <p class="time">Tijdslot</p>
              <p class="location">Locatie</p>
            </div>
          </li>
    
          @forelse ($user->events as $event)
          <li class="calendar-list-item">
            <div class="wrapper">
              <p class="datum">{{ $event->date }}</p>
              <p class="event">{{ $event->name }}</p>
              @switch($event->pivot->time)
                @case('one')
                <p class="event">tijdslot 1: 18u00-18u30</p>
                @break
                @case('two')
                <p class="event">tijdslot 2: 18u30-19u00</p>
                    @break
                @case('tree')
                <p class="event">tijdslot 3: 19u00-19u30</p>
                    @break
                @case('No')
                <p class="event">geen tijdslot</p>
                    @break
                @default
                <p class="event">geen tijdslot</p>
              @endswitch

              <p class="location">{{ $event->location }}</p>
                <a  class="circle" href="events/{{ $event->id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="14 19 21 12 14 5" fill="none" stroke="#000" stroke-miterlimit="10"/><line x1="21" y1="12" x2="2" y2="12" fill="none" stroke="#000" stroke-miterlimit="10"/></svg>
                </a>

                {{-- <form action="/mycalender/{{ $event->pivot->id }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn-delete" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="3 7 5 7 21 7" fill="none" stroke="#000"/><path d="M18.5,7l-1,14H6.5L5.5,7M8,7l.5-3.5h7L16,7" fill="none" stroke="#000"/><line x1="13.5" y1="16.5" x2="13.5" y2="11.5" fill="none" stroke="#000"/><line x1="10.5" y1="16.5" x2="10.5" y2="11.5" fill="none" stroke="#000"/></svg>
                  </button>
                </form> --}}
            </div>
          </li>
              
          @empty
              <p>Je hebt nog geen inschrijvingen...</p>
          @endforelse
        </ul>
      @endauth

      @guest
      <p>
        Om je kalender te bekijken moet je aangemeld zijn. <br/>
        Heb je nog geen profiel? Maak dan snel een account aan.
      </p>
      @endguest
    </div>
  </section>
</main>



@endsection

