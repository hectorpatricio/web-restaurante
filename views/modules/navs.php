<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <span style="color: blue;"><?= $_SESSION["nombre"] ?></span>
      <!-- <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Bootstrap -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio">inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="conf_platos_principal">Configurara Platos</a></li>
            <li><a class="dropdown-item" href="conf_bebidas_principal">Configurara Bebidas</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>


<!-- <div class="nav navbar-nav">
    <a class="nav-item nav-link active" aria-current="page">Usuario: <span style="color: blue;"><?= $_SESSION["nombre"] ?></span></a>
    <a class="nav-separator">|</a>
    <a class="nav-item nav-link" href="inicio">Home</a>
    <a class="nav-separator">|</a>
    <a class="nav-item nav-link" href="#">Contenido Menú</a>
    <a class="nav-separator">|</a>
    <a class="nav-item nav-link" href="conf_platos_principal">Platos</a>
    <a class="nav-separator">|</a>
    <a class="nav-item nav-link" href="entrada">Menú nuevo</a>
    <a class="nav-separator">|</a>
    <a class="nav-item nav-link" href="../usuario/index.php">Usuario</a>
    <a class="nav-separator">|</a>
    <a class="nav-item nav-link" href="salir">Cerrar Sesión</a>
</div>
</nav> -->