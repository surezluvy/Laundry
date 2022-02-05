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
                      <a class="nav-link active" aria-current="page" href="stats.html">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                          <div class="col">Dashboard</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                          aria-expanded="false">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-shop"></i></div>
                          <div class="col">Shop</div>
                          <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                          </div>
                      </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item nav-link active" href="home.html">
                                  <div class="avatar avatar-40 rounded icon"><i class="bi bi-bag"></i></div>
                                  <div class="col">Shop home</div>
                                  <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                              </a></li>
                          <li><a class="dropdown-item nav-link" href="product.html">
                                  <div class="avatar avatar-40 rounded icon"><i class="bi bi-binoculars"></i></div>
                                  <div class="col">Product</div>
                                  <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                              </a></li>
                          <li><a class="dropdown-item nav-link" href="cart.html">
                                  <div class="avatar avatar-40 rounded icon"><i class="bi bi-basket3"></i></div>
                                  <div class="col">Cart</div>
                                  <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                              </a></li>
                          <li><a class="dropdown-item nav-link" href="payment.html">
                                  <div class="avatar avatar-40 rounded icon"><i class="bi bi-credit-card"></i></div>
                                  <div class="col">Payment</div>
                                  <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                              </a></li>
                          <li><a class="dropdown-item nav-link" href="my-orders.html">
                                  <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-seam"></i></div>
                                  <div class="col">My Orders</div>
                                  <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                              </a></li>
                      </ul>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="chat.html" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-chat-text"></i></div>
                          <div class="col">Messages</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="notifications.html" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-bell"></i></div>
                          <div class="col">Notification</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="settings.html" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-gear"></i></div>
                          <div class="col">Settings</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="pages.html" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-file-earmark-text"></i></div>
                          <div class="col">Pages <span class="badge bg-info fw-light">new</span></div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="signin.html" tabindex="-1">
                          <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                          <div class="col">Logout</div>
                          <div class="arrow"><i class="bi bi-arrow-right"></i></div>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>