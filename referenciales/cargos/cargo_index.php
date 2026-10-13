<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="mb-0 fs-3">Cargos</h1>
        </div>
        <div class="col-sm-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cargos</li>
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
          <h3 class="card-title">Cargos</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 16rem">
              <span class="input-group-text">
                <i class="bi bi-search" aria-hidden="true"></i>
              </span>
              <input id="table-filter" type="search" class="form-control" placeholder="Filtrar registros..." aria-label="Filter rows" />
              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-cargo" >
                <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                Nuevo cargo
              </button>
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
            <!--INICIO: Modal para agregar cargo-->
            <div class="modal fade" id="modal-add-cargo" tabindex="-1" aria-labelledby="modal-add-cargo-label" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="referenciales/cargos/cargo_control.php" method="post" accept-charset="utf-8">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-cargo-label">Agregar nuevo cargo</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <input type="hidden" name="accion" value="1">
                        <label for="vcar_descri" class="form-label"> Descripción </label>
                        <input type="text" name="vcar_descri" class="form-control" id="vcar_descri" placeholder="Ej: Administrador" required />
                      </div>
                      <div class="mb-3">
                        <label for="vcar_estado" class="form-label"> Estado </label>
                        <select id="vcar_estado" name="vcar_estado" class="form-select">
                          <option selected>activo</option>
                          <option>inactivo</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--FIN:: Modal para agregar cargo-->
    </div>
</div>
</main>