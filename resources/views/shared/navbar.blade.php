<nav id="navbar-section" class="navbar navbar-expand-md bg-body-tertiary px-2 mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <i id="brand-icon" class="fa-regular fa-note-sticky"></i>
            {{ env("APP_NAME", "Notes") }}
        </a>
        <div class="d-flex flex-column justify-content-center">
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" role="search" action="{{ route('index.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center">
                @auth
                    <a href="{{ route('user.show', Auth::id()) }}" class="mb-0 me-2 sp-hidden-link">{{ Auth::user()->name }}</a>
                @endauth
                @guest
                    <p class="mb-0 me-2">Guest</p>
                @endguest
                <i class="fa-solid fa-user user-profile"></i>
            </div>
        </div>
    </div>
</nav>