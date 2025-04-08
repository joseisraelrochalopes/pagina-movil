<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">WebPhone</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('productos') }}">Tipos y Modelos</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('productos.populares') }}">Celulares del Momento</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Marcas</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('contactar') }}">Dudas o Consejos</a>
              </li>
          </ul>
      </div>
  </div>

  @if(auth()->user() != null)
      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                  <li>
                      <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item">Cerrar sesión</button>
                      </form>
                  </li>
              </ul>
          </li>
      </ul>
  @else
      <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Registrar</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
          </li>
      </ul>
  @endif
</nav>
