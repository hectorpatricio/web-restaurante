<?php
    $usuario = ControladorUsuarios::vistaUsuarios(); 
?>

  <div class="pc-container">
      <div class="pc-content">
          <!-- [ breadcrumb ] start -->
          <div class="page-header">
              <div class="page-block">
                  <div class="row align-items-center">
                      <div class="col-md-12">
                          <div class="page-header-title">
                              <h5 class="m-b-10">Usuarios</h5>
                          </div>
                          <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                              <li class="breadcrumb-item" aria-current="page">Lista de clientes</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-sm-12">
                  <div class="card">
                      <div class="card-header">
                          <h5>Centros de Abastecimiento</h5>
                      </div>
                      <div class="card-body">
                          <div class="row gy-4">
                              <div class="col-md-12">

                                  <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre </th>
                                            <th>Rut</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Perfil</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                      <?php foreach ($usuario as $key => $value) { 
                                        $badgeClasses = [
                                            1 => 'rounded-pill text-bg-success',
                                            2 => 'rounded-pill text-bg-primary',
                                            'default' => 'rounded-pill text-bg-info',
                                        ];
                                        $estadoClass = $badgeClasses[$value["id_perfil"]] ?? $badgeClasses['default'];
                                        $perfil = "<span class='badge {$estadoClass}'>{$value["des_perfil"]}</span>";
                                    ?>
                                            <tr>
                                                <td><?= $value["nombre_completo"] ?></span></td>
                                                <td><?= $value["rut"] ?></td>
                                                <td><?= $value["email"] ?></td>
                                                <td><?= $value["telefono"] ?></td>
                                                <td><?= $value["direccion"] ?></td>
                                                <td><?= $perfil ?></td>
                                                <td>
                                                    <a href="index.php?ruta=usuarioDetalle&cliente=<?= $value["id"] ?>" class="btn btn-primary btn-sm" data-original-title="Editar" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ver detalles">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- [ link-button ] end -->
          </div>
      </div>
  </div>