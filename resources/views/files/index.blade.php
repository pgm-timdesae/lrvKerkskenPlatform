@extends('layouts.app')

@section('content')

  <main class="main-content">
    <div class="document-page h-layout">
      <h1>Documenten</h1>
      <p class="intro">Hier vind je alle documenten die handig kunnen zijn ivm de club zoals ledenlijsten of verslagen van onze vergaderingen.</p>

      @auth
        <a class="btn-add" href="/files/create">
          <span>Upload document +</span>
        </a>
      @endauth

      <ul class="documents-list">
        @foreach ($files as $file)
          <li class="documents-list-item">
            <div class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14,2H4V22H20V8Z" fill="none" stroke="#000" stroke-miterlimit="10"/><polyline points="14 2 14 8 20 8" fill="none" stroke="#000" stroke-miterlimit="10"/></svg>
              <h3>{{ $file->name }}</h3>
              <p class="created">{{ date('d - m - Y', strtotime($file->created_at)) }}</p>
              @auth
              <a  href="/files/download/{{ $file->id }}" class="btn-primary">
                <span>Download</span>
              </a>

              <form action="/files/{{ $file->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn-delete" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polyline points="3 7 5 7 21 7" fill="none" stroke="#000"/><path d="M18.5,7l-1,14H6.5L5.5,7M8,7l.5-3.5h7L16,7" fill="none" stroke="#000"/><line x1="13.5" y1="16.5" x2="13.5" y2="11.5" fill="none" stroke="#000"/><line x1="10.5" y1="16.5" x2="10.5" y2="11.5" fill="none" stroke="#000"/></svg>
                </button>
              </form>
              @endauth
            </div>
          </li>
        @endforeach
      </ul>

    </div>
  </main>


@endsection

