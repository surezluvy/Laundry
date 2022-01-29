<a href="javascript:void(0)" class="overlay-sidebar"></a>
<div class="header-sidebar">

    @auth
      <a href="profile-setting.html" class="user-panel">
        <img src="assets/images/user/1.png" class="img-fluid user-img" alt="">
        <span>Hello, {{ auth()->user()->full_name }}</span>
        <i class="iconly-Arrow-Right-2 icli"></i>
      </a>
    @else
      <a href="{{ route('login') }}" class="user-panel">
        <img src="assets/images/user/1.png" class="img-fluid user-img" alt="">
        <span>Hello, Guest</span>
        <i class="iconly-Arrow-Right-2 icli"></i>
      </a>
    @endauth
    <div class="sidebar-content">
      <ul class="link-section">
        <li>
          <a href="pages.html">
            <i class="iconly-Paper icli"></i>
            <div class="content">
              <h4>Pages</h4>
              <h6>Elements & Other Pages</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="index.html">
            <i class="iconly-Home icli"></i>
            <div class="content">
              <h4>Home</h4>
              <h6>Offers, Top Deals, Top Brands</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="category.html">
            <i class="iconly-Category icli"></i>
            <div class="content">
              <h4>Shop by Category</h4>
              <h6>Men, Women, Kids, Beauty.. </h6>
            </div>
          </a>
        </li>
        <li>
          <a href="order-history.html">
            <i class="iconly-Document icli"></i>
            <div class="content">
              <h4>Orders</h4>
              <h6>Ongoing Orders, Recent Orders..</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="wishlist.html">
            <i class="iconly-Heart icli"></i>
            <div class="content">
              <h4>Your Wishlist</h4>
              <h6>Your Save Products</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="profile.html">
            <i class="iconly-Profile icli"></i>
            <div class="content">
              <h4>Your Account</h4>
              <h6>Profile, Settings, Saved Cards...</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="#">
            <img src="assets/images/flag.png" class="img-fluid" alt="">
            <div class="content">
              <h4>Langauge</h4>
              <h6>Select your Language here..</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="notification.html">
            <i class="iconly-Notification icli"></i>
            <div class="content">
              <h4>Notification</h4>
              <h6>Offers, Order tracking messages..</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="settings.html">
            <i class="iconly-Setting icli"></i>
            <div class="content">
              <h4>Settings</h4>
              <h6>Dark mode, RTL, Notification</h6>
            </div>
          </a>
        </li>
      </ul>
      <div class="divider"></div>
      <ul class="link-section">
        <li>
          <a href="about-us.html">
            <i class="iconly-Info-Square icli"></i>
            <div class="content">
              <h4>About us</h4>
              <h6>About Multikart</h6>
            </div>
          </a>
        </li>
        <li>
          <a href="help.html">
            <i class="iconly-Call icli"></i>
            <div class="content">
              <h4>Help/Customer Care</h4>
              <h6>Customer Support, FAQs</h6>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
<!-- header end -->