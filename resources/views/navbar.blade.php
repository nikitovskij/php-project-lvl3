<nav class="navbar navbar-expand-lg navbar-dark nav-bg fs-5">
    <div class="container-fluid pl-0">
        <a class="navbar-brand" href="{{ route('index') }}">ANALYZER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page"
                       href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('urls')) ? 'active' : '' }}" href="{{ route('urls.index') }}">Websites</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
