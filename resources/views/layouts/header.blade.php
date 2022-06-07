<div class="header__user">
  <ul class="nav__list">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav__list__item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Aanmelden') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav__list__item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registreer') }}</a>
            </li>
        @endif
    @else
        <li class="nav__list__item">
          <a class="header__user-name" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
        </li>
        
        <li class="nav__list__item">
          <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">
              Mijn profiel
          </a>
        </li>

        <li class="nav__list__item">
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              {{ __('Afmelden') }}
          </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endguest
  </ul>
</div> 

<nav class="header__nav">
  <ul class="nav__list">
    <li class="nav__list__item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,11V21H20V11L12,3Z" fill="none" stroke="#000"/><polyline points="9.5 21 9.5 13 14.5 13 14.5 21" fill="none" stroke="#000"/></svg>
      <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
    </li>
    <li class="nav__list__item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="15" fill="none" stroke="#000"/><line x1="15.5" y1="3" x2="15.5" y2="7" fill="none" stroke="#000"/><line x1="8.5" y1="3" x2="8.5" y2="7" fill="none" stroke="#000"/><line x1="3" y1="10" x2="21" y2="10" fill="none" stroke="#000"/></svg>
      <a href="/events" class="{{ request()->is('events') ? 'active' : '' }}">Evenementen</a>
    </li>
    <li class="nav__list__item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14,2H4V22H20V8Z" fill="none" stroke="#000" stroke-miterlimit="10"/><polyline points="14 2 14 8 20 8" fill="none" stroke="#000" stroke-miterlimit="10"/></svg>
      <a href="/files" class="{{ request()->is('files') ? 'active' : '' }}">Documenten</a>
    </li>
    <li class="nav__list__item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="8.5" cy="7" r="4" fill="none" stroke="#000"/><polyline points="1 20.5 1 16.5 4 13.5 8.5 15 13 13.5 16 16.5 16 20.5" fill="none" stroke="#000"/><path d="M13.9,3.3A4.1,4.1,0,0,1,15.5,3,4,4,0,1,1,14,10.7" fill="none" stroke="#000"/><polyline points="17 14.5 20 13.5 23 16.5 23 20.5" fill="none" stroke="#000"/></svg>
      <a href="/users" class="{{ request()->is('users') ? 'active' : '' }}">Leden</a>
    </li>
    <li class="nav__list__item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><polygon points="6 22 18 22 17 19 7 19 6 22" fill="none" stroke="#000"/><line x1="11" y1="15" x2="10" y2="19" fill="none" stroke="#000"/><line x1="13" y1="15" x2="14" y2="19" fill="none" stroke="#000"/><path d="M6,2V9A6,6,0,0,0,18,9V2Z" fill="none" stroke="#000"/><path d="M17.93,9.93a2.12,2.12,0,0,0,.57.07,2.5,2.5,0,0,0,0-5,2.73,2.73,0,0,0-.5,0" fill="none" stroke="#000"/><path d="M6,5.05a2.73,2.73,0,0,0-.5,0,2.5,2.5,0,0,0,0,5,2.12,2.12,0,0,0,.57-.07" fill="none" stroke="#000"/></svg>
      <a href="/mycalendar" class="{{ request()->is('mycalendar') ? 'active' : '' }}">Mijn kalender</a>
    </li>
    <li class="nav__list__item">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.1,18.76A8.18,8.18,0,0,1,2,11.89c0-4.7,4.47-8.51,10-8.51s10,3.81,10,8.51-4.48,8.5-10,8.5a11.67,11.67,0,0,1-1.89-.15L5.66,22.49Z" fill="none" stroke="#000"/><path d="M12,10.75l-.44-.39a1.5,1.5,0,0,0-2.12,2.12L12,15.08l2.56-2.6a1.5,1.5,0,0,0-2.12-2.12Z" fill="none" stroke="#000"/></svg>      
      <a href="/chatbot" class="{{ request()->is('chatbot') ? 'active' : '' }}">Chatbot</a>
    </li>
  </ul>
</nav>


<div class="header__info">
  <h3>Hulp nodig?</h3>
  <a href="tel:0472857598">
    <span>0472 85 75 98</span>
  </a>
  <a href="mailto:timdesaeger@hotmail.be">
    <span>mail bestuur</span>
  </a>
</div>