<div class="sidebar-wrap  sidebar-fullmenu">
  <!-- Add pushcontent or fullmenu instead overlay -->
  <div class="closemenu text-opac">Close Menu</div>
  <div class="sidebar">
      <div class="row mt-4 mb-3">
          @auth
            <div class="col-auto">
                <figure class="avatar avatar-60 rounded mx-auto my-1">
                    <img src="{{ asset('assets/img/user2.jpg') }}" alt="">
                </figure>
            </div>
            <div class="col align-self-center ps-0">
                <h6 class="mb-0">{{ ucfirst(trans(auth()->user()->full_name)) }}</h6>
                <p class="text-opac">{{ ucfirst(trans(auth()->user()->address)) }}</p>
            </div>
          @else
            <div class="col-auto">
                <figure class="avatar avatar-60 rounded mx-auto my-1">
                    <img src="{{ asset('assets/img/user2.jpg') }}" alt="">
                </figure>
            </div>
            <div class="col align-self-center ps-0">
                <h6 class="mb-0">Guest</h6>
                <p class="text-opac">Indonesia</p>
            </div>
          @endauth
      </div>
      <div class="row">
          <div class="col-12">
              <ul class="nav nav-pills">
                  <li class="nav-item">
                      <a class="nav-link  {{ request()->is('/*') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                          <div class="col">Home</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link {{ request()->is('booking/*') ? 'active' : '' }}" href="{{ route('all_booking') }}" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-list-ul"></i></div>
                          <div class="col">Pesanan</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link {{ request()->is('user/*') ? 'active' : '' }}" href="{{ route('profile') }}" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-person-circle"></i></div>
                          <div class="col">Profil</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" tabindex="-1">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                        <div class="col">Logout</div>
                        <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                    </a>
                </li>
                @endauth
              </ul>
          </div>
      </div>
  </div>
</div>