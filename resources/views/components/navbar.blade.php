<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
            </li>
            @if (Auth::user()->rolId == 1)
            <li class="nav-item">
                <a class="nav-link active" href="/empleados">Empleados</a>
              </li>
            @endif
            @if (Auth::user()->rolId == 1 || Auth::user()->rolId == 2)
            <li class="nav-item">
                <a class="nav-link active" href="/clientes">Clientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/cobradores">Cobradores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/avales">Avales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/prestamos">Prestamos</a>
              </li>
            @endif
            @if (Auth::user()->rolId == 3)
            <li class="nav-item">
                <a class="nav-link active" href="/clienteCobrador">Mis clientes</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link active" href="{{url('singOut')}}">Cerrar Sesión</a>
            </li>
        </ul>
      </div>
    </div>
</nav>
