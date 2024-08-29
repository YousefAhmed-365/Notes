<nav id="navbar-section" class="navbar bg-body-tertiary px-2 mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <i id="brand-icon" class="fa-regular fa-note-sticky"></i>
            {{ env("APP_NAME", "Notes") }}
        </a>
        <div id="navbar-expand-section">
            <div class="dropdown">
                <button id="navbar-expand-button" class="btn btn-outline-dark border-0" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <ul id="navbar-expand-dropdown" class="dropdown-menu sp-dropdown-menu-center">
                    <li>
                        <form class="d-flex" role="search" action="{{ route('index.search') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control" type="search" name="query" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div id="navbar-expand-default">
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
                    <a href="{{ route('user.show', Auth::id()) }}"
                        class="mb-0 me-2 sp-hidden-link">{{ Auth::user()->name }}</a>
                @endauth
                @guest
                    <a href="{{ route('auth.loginIndex') }}" class="sp-hidden-link"><p class="mb-0 me-2">Guest</p></a>
                @endguest
                <i class="fa-solid fa-user user-profile"></i>
                @auth
                    <div class="dropdown ms-2">
                        <button class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul id="user-profile-dropdown" class="dropdown-menu">
                            <li><a href="{{ route('user.show', Auth::id()) }}" class="dropdown-item">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>