@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="h-layout">
    <h1>Wijzig een evenement</h1>

    @if ($errors->any())
    <div class="danger">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif


    <form action="/events/{{ $event->id }}" method="POST" class="form">
      @csrf
      @method('PUT')
      <div class="form__group">
        <label for="name"><span class="number">01</span>Geef je evenement een naam</label>
        <input type="text" name="name" value="{{ $event->name }}">
      </div>

      <div class="form__group">
        <label for="location"><span class="number">02</span>Waar vind het evenement plaats?</label>
        <input type="text" name="location" value="{{ $event->location }}">
      </div>

      <div class="form__group">        
        <label for="category_id"><span class="number">03</span>Selecteer het type evenement</label>
        <select name="category_id" id="category_id">
          <option value="1">Springen</option>
          <option value="2">Dressuur</option>
          <option value="3">Feest</option>
          <option value="4">Tornooi</option>
          <option value="5">Werkdag</option>
          <option value="6">Eetfestijn</option>
        </select>
      </div>

      <div class="form__group">
        <label for="date"><span class="number">04</span>Selecteer de datum van het evenement</label>
        <input type="date" name="date" value="{{ $event->date }}">
      </div>

      <div class="form__group">
        <label for="description"><span class="number">05</span>Beschrijving</label>
        <textarea id="description" name="description" rows="5" cols="33">{{ $event->description }}</textarea>      
      </div>

      <button type="submit" class="btn-primary btn-submit">
        <span>Wijzig</span>
      </button>
    </form>
  </section>
</main>

@endsection

