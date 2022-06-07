@extends('layouts.app')

@section('content')

<main class="main-content">
  <section class="h-layout">
    <h1>Maak een nieuw evenement</h1>

    @if ($errors->any())
      <div class="danger">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </div>
    @endif

    <form action="/events" method="POST" class="form">
      @csrf
      <div class="form__group">
        <label for="name"><span class="number">01</span>Geef je evenement een naam</label>
        <input type="text" name="name" placeholder="Dressuurles paarden">
      </div>

      <div class="form__group">
        <label for="location"><span class="number">02</span>Waar vind het evenement plaats?</label>
        <input type="text" name="location" placeholder="Ninove">
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
        <input type="date" name="date" placeholder="Datum">
      </div>

      <div class="form__group">
        <label for="description"><span class="number">05</span>Beschrijving</label>
        <textarea id="description" name="description" rows="5" cols="33" placeholder="Geef een beetje uitleg over jouw evenement."></textarea>      
      </div>

      <button type="submit" class="btn-primary btn-submit">
        <span>Verzenden</span>
      </button>
    </form>
  </section>
</main>

@endsection

