@extends('layouts.app')

@section('content')
  <main class="main-content">
    <section class="h-layout">
      <h1>Chatbot</h1>
      <h2>Snel inschrijven voor een training of wedstrijd? Dat kan nu via onze chatbot!</h2>

      <div>
        <h3>Wat is een chatbot?</h3>
        <p>Een chatbot is in principe een computerprogramma dat gesprekken tussen mensen (schriftelijk of gesproken) simuleert en verwerkt zodat mensen met digitale apparaten kunnen communiceren alsof ze met een echt persoon communiceren. Een chatbot kan een rudimentair programma zijn dat een eenvoudige vraag beantwoordt met één regel, of een geavanceerde digitale assistent die leert en evolueert en op basis van de verzamelde en verwerkte informatie steeds persoonlijker wordt.</p>
      </div>

      <div>
        <h3>Waar vind ik de chatbot terug?</h3>
        <p>De chatbot van LRV Kerksken is terug te vinden in onze Whatsapp group op jouw smartphone.</p>
      </div>

      <div>
        <h3>Welke vragen kan ik de chatbot allemaal stellen?</h3>
      </div>
    </section>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

    <script>

	    var botmanWidget = {

	        aboutText: 'lrvKerksken',

	        introMessage: "✋ Hallo! Ik ben de chatbot van LRV Kerksken "

	    };

    </script>

  

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
  </main>

  @endsection