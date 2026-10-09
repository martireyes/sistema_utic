<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Tabla de Cargos</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tabla de Cargos </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                  <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-4">
                      <h3 class="card-title">Cargos</h3>
                    </div>
                    <div class="col-12 col-md-8">
                      <div class="d-flex flex-wrap justify-content-md-end gap-2">
                        <div class="input-group input-group-sm w-auto">
                          <span class="input-group-text">
                            <i class="bi bi-search" aria-hidden="true"></i>
                          </span>
                          <input type="search" id="cargo-search" class="form-control" placeholder="Buscar cargos..." style="width: 180px" />
                        </div>
                        <a href="menu.php?ruta=referenciales/cargos/cargo_add.php" class="btn btn-sm btn-primary">
                          <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                          Nuevo cargo
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2 mb-3">
                        <button id="export-csv" type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>
                            Exportar a CSV
                        </button>
                        <button id="export-json" type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-filetype-json me-1" aria-hidden="true"></i>
                            Exportar a JSON
                        </button>
                        <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-printer me-1" aria-hidden="true"></i>
                            Imprimir
                        </button>
                    </div>
                  <!--  <div class="col-md-12 col-xs-12 col-lg-12">
                        <?php
                        $cargo = consultas::get_datos("select * from cargo");
                        if (!empty($cargo)) { ?>
                                        <div class="table-responsive">
                                            <table class="table col-lg-12 col-md-12 col-xs-12 table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Descripción</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cargo as $car) { ?>
                                                    <tr>
                                                        <td data-title="Descripción"><?php echo $car['car_descri'];?></td>
                                                        <td data-title="Acciones" class="text-center">
                                                            <a href="cargo_edit.php?vcar_cod=<?php echo $car['car_cod'];?>" class="btn btn-warning btn-sm" role="button" data-title = "Editar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </a>
                                                            <a href="cargo_del.php?vcar_cod=<?php echo $car['car_cod'];?>" class="btn btn-danger btn-sm" role="button" data-title = "Borrar" rel="tooltip" data-placement="top">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php }else { ?>
                                        <div class="alert alert-info flat">
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            No se han registrado cargos...
                                        </div>
                                        <?php } ?>
                    </div> -->
                    <div class="card-body p-0">
                      <?php
                      $cargo = consultas::get_datos("select * from cargo");
                      if (!empty($cargo)) { ?>
                      <div class="table-responsive">
                        <table class="table table-hover align-middle m-0">
                          <thead>
                            <tr>
                              <th>Descripción</th>
                              <th>Estado</th>
                              <th>Creado</th>
                              <th class="text-end">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($cargo as $car) { ?>
                            <tr>
                              <td data-title="Descripción"><?php echo $car['car_descri'];?></td>
                              <td data-title="Estado">
                                <span class="badge text-bg-<?php echo ($car['car_estado'] == 'activo') ? 'success' : 'danger'; ?>">
                                  <?php echo $car['car_estado']; ?>
                                </span>
                              </td>
                              <td data-title="Creado"><?php echo $car['created_at'];?></td>
                              <td data-title="Acciones" class="text-end">
                                <div class="btn-group btn-group-sm">
                                  <a href="cargo_edit.php?vcar_cod=<?php echo $car['car_cod'];?>" class="btn btn-outline-secondary" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                  </a>
                                  <a href="cargo_del.php?vcar_cod=<?php echo $car['car_cod'];?>" class="btn btn-outline-danger" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrar">
                                    <i class="bi bi-trash" aria-hidden="true"></i>
                                  </a>
                                </div>
                              </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <?php }else { ?>
                      <div class="alert alert-info rounded-0 d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <div>No se han registrado cargos...</div>
                        <?php } ?>
                      </div>
                      <div class="card-footer clearfix">
                        <div class="float-start pt-1 fs-7 text-body-secondary">
                          Mostrando del 1 al 9 of 42 users
                        </div>
                        <ul class="pagination pagination-sm m-0 float-end">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous"> &laquo; </a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next"> &raquo; </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>