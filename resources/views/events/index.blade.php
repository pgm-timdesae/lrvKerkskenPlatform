@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="h-layout">
    <h1>Evenementen</h1>

    @auth
      <a class="btn-add" href="/events/create">
        <span>Maak nieuw evenement +</span>
      </a>
    @endauth

    <div class="search-box">
      <form action="#" method="GET">
        <div class="flex">
          <input class="search-input" type="text" name="search" placeholder="Zoek op naam van evenement">
          <button class="search-btn" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5" fill="none" stroke="#000"/><line x1="20.4" y1="20.5" x2="15.5" y2="15.7" fill="none" stroke="#000"/></svg>        
          </button>
        </div>
      </form>
    </div>

    <div class="filter">
        <p>filter op categorie</p>
        <a href="/events" class="tag {{ request()->is('events') ? 'active' : '' }}">Alles</a>
        <a href="/categories/springen" class="tag {{ request()->is('categories/springen') ? 'active' : '' }}">Springen</a>
        <a href="/categories/dressuur" class="tag {{ request()->is('categories/dressuur') ? 'active' : '' }}">Dressuur</a>
        <a href="/categories/feest" class="tag {{ request()->is('categories/feest') ? 'active' : '' }}">Feest</a>
        <a href="/categories/eetfestijn" class="tag {{ request()->is('categories/eetfestijn') ? 'active' : '' }}">Eetfestijn</a>
        <a href="/categories/werkdag" class="tag {{ request()->is('categories/werkdag') ? 'active' : '' }}">Werkdag</a>
        <a href="/categories/tornooi" class="tag {{ request()->is('categories/tornooi') ? 'active' : '' }}">Tornooi</a>
    </div>

    <a href="/events/past" class="btn-link">Bekijk alle afgelopen evenementen</a>

    <ul class="events-home__list events-event__list">
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
                    <img src="{{ asset('storage/jureren.jpeg') }}" alt="banner">
                @endswitch
                <span class="image__date">{{ date('d - m', strtotime($event->date)) }} — {{ $event->location }}</span>
              </div>

              <div class="text">
                <a href="/events/{{ $event->id }}/edit">
                  <svg class="svg-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polygon points="7.5 16.5 8 13.5 18.5 3 19.5 3 21 4.5 21 5.5 10.5 16 7.5 16.5" fill="none" stroke="#000" stroke-miterlimit="10"/><line x1="16.5" y1="4.5" x2="19.5" y2="7.5" fill="none" stroke="#000" stroke-miterlimit="10"/><polyline points="16.5 15.5 16.5 21.5 2.5 21.5 2.5 7.5 8.5 7.5" fill="none" stroke="#000"/></svg>
                </a>

                <form action="/events/{{ $event->id }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="svg-delete" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="3 7 5 7 21 7" fill="none" stroke="#000"/><path d="M18.5,7l-1,14H6.5L5.5,7M8,7l.5-3.5h7L16,7" fill="none" stroke="#000"/><line x1="13.5" y1="16.5" x2="13.5" y2="11.5" fill="none" stroke="#000"/><line x1="10.5" y1="16.5" x2="10.5" y2="11.5" fill="none" stroke="#000"/></svg>
                  </button>
                </form>

                <p>
                  <a href="/categories/{{ $event->category->slug }}" class="tag">{{ $event->category->name }}</a>
                </p>

                <h3>{{ $event->name }}</h3>
                <p>{{ $event->description }}</p>
                <a class="btn-primary" href="/events/{{ $event->id }}">
                  <span>Bekijk event</span>
                </a>
              </div>
            </div>
          </div>
        </li>
      @endforeach
    </ul>

  </section>
</main>

@endsection

