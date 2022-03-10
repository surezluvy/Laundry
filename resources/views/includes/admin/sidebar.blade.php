<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{ asset('admin_assets/assets/img/profile-17.jpeg') }}" alt="avatar">
                <h6 class="">{{ ucfirst(trans(auth()->user()->full_name)) }}</h6>
                <p class="">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin-dashboard') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span>Menu {{ auth()->user()->level }}</span></div>
            </li>

            @if(auth()->user()->level == 'admin')
            <li class="menu {{ request()->is('admin/mitra') ? 'active' : '' }}">
                <a href="{{ route('mitra-data') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Daftar mitra</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ request()->is('admin/customer') ? 'active' : '' }}">
                <a href="{{ route('customer-data') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Daftar customer</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ request()->is('admin/laundry') ? 'active' : '' }}">
                <a href="{{ route('laundry-data') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Daftar laundry</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ request()->is('admin/ongkir') ? 'active' : '' }}">
                <a href="{{ route('ongkir-data') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Daftar ongkir</span>
                    </div>
                </a>
            </li>
            @endif
            
            @if(auth()->user()->level == 'mitra' && auth()->user()->hasLaundry() && auth()->user()->laundryStatus() == 'Sudah dikonfirmasi')
            <li class="menu {{ request()->is('admin/booking') ? 'active' : '' }}">
                <a href="{{ route('booking-data') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Daftar pesanan</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ request()->is('admin/layanan') ? 'active' : '' }}">
                <a href="{{ route('layanan-data') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        <span>Daftar layanan</span>
                    </div>
                </a>
            </li>
            @elseif(auth()->user()->level == 'mitra' && auth()->user()->hasLaundry() && auth()->user()->laundryStatus() == 'Belum dikonfirmasi')
            <li class="menu {{ request()->is('admin/booking') ? 'active' : '' }}">
                <div class="text-center">
                    <span>Mohon tunggu admin untuk <br> konfirmasi laundry untuk <br> akses menu</span>
                    <form method="post" action="{{ route('send-notif', [auth()->user()->laundryId(), auth()->user()->user_id]) }}">
                        @csrf
                        <div class="modal-body text-center">
                            <span>Kirim notifikasi ke admin</span>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                        </div>
                    </form>
                </div>
            </li>
            @endif

        </ul>
        
    </nav>

</div>