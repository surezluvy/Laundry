<header class="container-fluid header">
    <div class="row">
        <div class="col-auto align-self-center">
            <button type="button" class="btn btn-link menu-btn text-color-theme">
                <i class="bi bi-list size-24"></i>
            </button>
        </div>
        <div class="col text-center">
            <div class="logo-small">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img">
                <h6>Nyuci.in</h6>
            </div>
        </div>
        <div class="col-auto align-self-center">
            @auth
                <a href="{{ route('profile') }}" class="link text-color-theme">
                    <i class="bi bi-person-circle size-22"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="link text-color-theme">
                    <i class="bi bi-person-circle size-22"></i>
                </a>
            @endauth
        </div>
    </div>
</header>