@extends('layouts.app')

@section('content')

<main class="main-content">
  <div class="home-main">
    <section class="h-layout">
      @guest
        <h1><span class="green">Hallo!</span> Welkom op het digitaal platform.</h1>
      @else
        <h1><span class="green">Hallo {{ Auth::user()->name }}!</span> Welkom op jouw digitaal platform.</h1>
      @endguest
    </section>
  
    <section class="events-home h-layout">
      <div class="events-home__header">
        <h2>Aankomende evenementen</h2>
        <a href="/events" class="btn-link">Alles bekijken</a>
      </div>
  
      <ul class="events-home__list">
        @foreach ($events as $event)
          <li class="events-home__list-item">
            <div class="wrapper">
              <div class="inner-wrap">
                <div class="image">
                  @switch($event->category_id)
                    @case('1')
                    <img src="{{ asset('storage/jumping.jpeg') }}" alt="banner">
                        @break
                    @case('2')
                    <img src="{{ asset('storage/prijsuitreiking.jpeg') }}" alt="banner">
                        @break
                    @case('3')
                    <img src="{{ asset('storage/jureren.jpeg') }}" alt="banner">
                        @break
                    @case('4')
                    <img src="{{ asset('storage/LRV.jpeg') }}" alt="banner">
                        @break
                    @case('5')
                    <img src="{{ asset('storage/medaille.jpeg') }}" alt="banner">
                        @break
                    @default
                    <img src="{{ asset('storage/LRV.jpeg') }}" alt="banner">
                  @endswitch

                  <span class="image__date">{{ date('d - m', strtotime($event->date)) }} — {{ $event->location }}</span>
                </div>
                <div class="text">
                  <h3>{{ $event->name }}</h3>
                  <p>{{ $event->description }}</p>
                  <a  href="events/{{ $event->id }}" class="btn-primary">
                    <span>Bekijk event</span>
                  </a>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
    </section>
  </div>

  <div class="home-sidebar h-layout">
    <div class="home-sidebar__announcement">
      <h3>! Belangrijke mededeling</h3>
      <p>In 2023 organiseert onze club het provinciaal ruitertornooi. Gelieve de eerste 2 weken van september vrij te houden zodat we samen een mooi evenement kunnen organiseren.</p>
    </div>

    <div class="home-sidebar__upcoming">
      <h3>Afgelopen evenement</h3>
      @foreach ($latestEvent as $event)
        <p>{{ $event->name }}</p> 
        <p>{{ date('d - m - Y', strtotime($event->date)) }}</p>
        <a href="/events/past" class="btn-link">Bekijk alle afgelopen evenementen</a>
      @endforeach
    </div>
    
    <div class="home-sidebar__doc">
      <h3>Documenten</h3>
      @foreach ($latestDocument as $doc)
        <p>{{ $doc->name }}</p>
        <a href="/files" class="btn-link">Bekijk alle documenten</a>
      @endforeach
    </div>
  </div>
  
</main>

@endsection

