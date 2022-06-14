@extends('layouts.app')

@section('content')
  <main class="main-content chatbot-page">
    <section class="text h-layout">
      <h1>Chatbot</h1>
      <h2>Snel inschrijven voor een training of wedstrijd? Dat kan nu via onze chatbot!</h2>

      <div>
        <h3>Wat is een chatbot?</h3>
        <p>Een chatbot is in principe een computerprogramma dat gesprekken tussen mensen (schriftelijk of gesproken) simuleert en verwerkt zodat mensen met digitale apparaten kunnen communiceren alsof ze met een echt persoon communiceren.</p>
      </div>

      <div>
        <h3>Waar vind ik de chatbot terug?</h3>
        <p>De chatbot van LRV Kerksken is terug te vinden in onze Whatsapp group op jouw smartphone en ook onderaan rechts op deze pagina.</p>
      </div>

      <div>
        <h3>Hoe werkt de chatbot?</h3>
        <p>De chatbot werkt via een vaste flow zodat inschrijven heel erg makkelijk wordt.</p>
        <ul class="list-green">
          <li>
            <span class="number">01</span> 
            <p>
              Geef je naam en e-mailadress in.
            </p>
          </li>
          <li>
            <span class="number">02</span>
            <p>
              Vervolgens krijg je een lijst van alle evenementen.
              Klik op het evenement waarvoor jij wenst in te schrijven.
            </p>
          </li>
          <li>
            <span class="number">03</span>
            <p>
              Nadien kan je een tijdslot kiezen.
            </p>
          </li>
          <li>
            <span class="number">04</span>
            <p>
              Is het overzicht juist? Druk dan op 'JA' en jouw inschrijving is afgerond.
            </p>
          </li>
        </ul>
      </div>
    </section>

    <script>

	    var botmanWidget = {

          title: 'LRV Kerksken chatbot',

	        aboutText: 'made by Tim',

	        placeholderText: 'Verzend een bericht',

          mainColor: '#92EB68',

          bubbleBackground: '#92EB68',

          bubbleAvatarUrl: 'storage/images/boticon.png',

	        introMessage: "✋ Hallo! Ik ben de chatbot van LRV Kerksken "

	    };

    </script>

  

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
  </main>

  @endsection