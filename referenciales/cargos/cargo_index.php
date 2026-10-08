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
                    <h3 class="card-title">Cargos</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 16rem">
                            <span class="input-group-text">
                                <i class="bi bi-search" aria-hidden="true"></i>
                            </span>
                            <input id="table-filter" type="search" class="form-control" placeholder="Filter rows&hellip;" aria-label="Filter rows" />
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
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Estado</th>
                            <th>Creado</th>
                            <th class="text-end">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($cargo as $car) { ?>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img src="./assets/img/user1-128x128.jpg" alt="" class="img-size-32 rounded-circle me-2" />
                                <span class="fw-medium">Alexander Pierce</span>
                              </div>
                            </td>
                            <td>alexander.pierce@example.com</td>
                            <td>
                              <span class="badge text-bg-danger"> Administrator </span>
                            </td>
                            <td>
                              <span class="badge text-bg-success">Active</span>
                            </td>
                            <td>Mar 12, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Alexander Pierce"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Alexander Pierce"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user3-128x128.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Sarah Bullock</span>
                              </div>
                            </td>
                            <td>sarah.bullock@example.com</td>
                            <td>
                              <span class="badge text-bg-primary">Editor</span>
                            </td>
                            <td>
                              <span class="badge text-bg-success">Active</span>
                            </td>
                            <td>Apr 3, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Sarah Bullock"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Sarah Bullock"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user6-128x128.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Daniel Cooper</span>
                              </div>
                            </td>
                            <td>daniel.cooper@example.com</td>
                            <td>
                              <span class="badge text-bg-info">Author</span>
                            </td>
                            <td>
                              <span class="badge text-bg-warning">Pending</span>
                            </td>
                            <td>Apr 28, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Daniel Cooper"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Daniel Cooper"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user4-128x128.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Nora Vans</span>
                              </div>
                            </td>
                            <td>nora.vans@example.com</td>
                            <td>
                              <span class="badge text-bg-primary">Editor</span>
                            </td>
                            <td>
                              <span class="badge text-bg-success">Active</span>
                            </td>
                            <td>May 9, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Nora Vans"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Nora Vans"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user7-128x128.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Jane Holland</span>
                              </div>
                            </td>
                            <td>jane.holland@example.com</td>
                            <td>
                              <span class="badge text-bg-secondary"> Subscriber </span>
                            </td>
                            <td>
                              <span class="badge text-bg-success">Active</span>
                            </td>
                            <td>May 21, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Jane Holland"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Jane Holland"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user8-128x128.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Kenneth Miles</span>
                              </div>
                            </td>
                            <td>kenneth.miles@example.com</td>
                            <td>
                              <span class="badge text-bg-info">Author</span>
                            </td>
                            <td>
                              <span class="badge text-bg-danger"> Suspended </span>
                            </td>
                            <td>Jun 2, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Kenneth Miles"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Kenneth Miles"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user2-160x160.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium"> Nadia Carmichael </span>
                              </div>
                            </td>
                            <td>nadia.carmichael@example.com</td>
                            <td>
                              <span class="badge text-bg-secondary"> Subscriber </span>
                            </td>
                            <td>
                              <span class="badge text-bg-success">Active</span>
                            </td>
                            <td>Jun 15, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Nadia Carmichael"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Nadia Carmichael"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/user5-128x128.jpg"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Marcus Reed</span>
                              </div>
                            </td>
                            <td>marcus.reed@example.com</td>
                            <td>
                              <span class="badge text-bg-primary">Editor</span>
                            </td>
                            <td>
                              <span class="badge text-bg-warning">Pending</span>
                            </td>
                            <td>Jun 24, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Marcus Reed"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Marcus Reed"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img
                                  src="./assets/img/avatar5.png"
                                  alt=""
                                  class="img-size-32 rounded-circle me-2"
                                />
                                <span class="fw-medium">Elena Weber</span>
                              </div>
                            </td>
                            <td>elena.weber@example.com</td>
                            <td>
                              <span class="badge text-bg-secondary"> Subscriber </span>
                            </td>
                            <td>
                              <span class="badge text-bg-success">Active</span>
                            </td>
                            <td>Jul 1, 2025</td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  aria-label="Edit Elena Weber"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  aria-label="Delete Elena Weber"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->
                  <div class="card-footer clearfix">
                    <div class="float-start pt-1 fs-7 text-body-secondary">
                      Showing 1 to 9 of 42 users
                    </div>
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous"> &laquo; </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">4</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">5</a>
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