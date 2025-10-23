


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <span style="color: blue;"><?= $_SESSION["nombre"]  ." (". ucfirst($_SESSION["perfil"]).")"?></span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="inicio">Mesas</a>
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
          <a class="nav-link disabled" href="salir" tabindex="-1" aria-disabled="true">Salir</a>
        </li>


        <?php 
          if($_SESSION["id_perfil"] == 1)
          {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Configuración Administrador
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="administrador">Administrador (Configurar)</a></li>
                  <li><a class="dropdown-item" href="usuarios">Usuarios (Agregar/Modificar)</a></li>
                </ul>
              </li>
            <?php
          }
        ?>


      </ul>
    </div>
  </div>
</nav>
