<footer class="footer">
  <div class="container">
      <ul class="nav nav-pills nav-justified">
          <li class="nav-item">
              <a class="nav-link {{ request()->is('booking/*') ? 'active' : '' }}" href="{{ route('all_booking') }}">
                  <span>
                      <i class="nav-icon bi bi-list-ul"></i>
                      <span class="nav-text">Pemesanan</span>
                  </span>
              </a>
          </li>
          <li class="nav-item center-item">
              <a class="nav-link" href="{{ route('home') }}">
                  <span>
                      <i class="nav-icon bi bi-house"></i>
                      <span class="nav-text">Home</span>
                  </span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ request()->is('user/*') ? 'active' : '' }}" href="{{ route('profile') }}">
                  <span>
                      <i class="nav-icon bi bi-person-circle"></i>
                      <span class="nav-text">Profil</span>
                  </span>
              </a>
          </li>
      </ul>
  </div>
</footer>