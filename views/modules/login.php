
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Iniciar Sesión</h1>
            <p class="lead fw-normal text-white-50 mb-0">Para poder ingresar a nuestra plataforma, es necesario que los usuarios están registrados previamente.</p>
        </div>
    </div>
</header>

<!-- Formulario de Inicio de Sesión -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST">
                <div class="mb-3">
                    <label for="ingEmail" class="form-label">Usuario</label>
                    <input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Ingresa tu correo" required>
                </div>
                <div class="mb-3">
                    <label for="ingPassword" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Ingresa tu contraseña" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="bi bi-eye" id="icono"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    <?php
                        $login = new ControladorIngreso();
                        $login->ctrIngresoUsuario();
                    ?>
            </form>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#ingPassword');
    const icono = document.querySelector('#icono');

    togglePassword.addEventListener('click', function () {
        // Cambiar entre mostrar y ocultar la contraseña
        const tipo = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', tipo);

        // Alternar el icono
        icono.classList.toggle('bi-eye');
        icono.classList.toggle('bi-eye-slash');
    });
</script>


