@extends('layouts.app')

@section('content')

  <main class="main-content">
    <div class="detail-page h-layout">
      <div class="flex">
        <div class="detail-main">
          <h2>Schrijf je hier in</h2>
          <form action="/mycalendar" method="POST" class="form">
            @csrf  
            
            <div class="form__group">        
              <label for="time"><span class="number">02</span>Kies het tijdslot</label>
              <select name="time" id="time">
                <option value="one">Tijdslot 1: 18u00 - 18u30</option>
                <option value="two">Tijdslot 2: 18u30 - 19u00</option>
              </select>
            </div>
      
            @auth
              <button type="submit" class="btn-primary btn-submit">
                <span>Verzenden</span>
              </button>
            @endauth
            @guest
               <p>Om in te schrijven met je ingelogd zijn!</p> 
            @endguest
          </form>
        </div>
      </div>
    </div>
  </main>

@endsection

