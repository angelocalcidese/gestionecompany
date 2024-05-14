<!doctype html>
<html lang="it" data-bs-theme="auto">
<?php include("../portale/head.php"); ?>

<body>
  <?php include("../portale/header.php"); ?>

  <div class="container-fluid">
    <div class="row">
      <?php include("../portale/menu.php"); ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Gestione</h1>
          <!--<div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
              <svg class="bi">
                <use xlink:href="#calendar3" />
              </svg>
              This week
            </button>
          </div>-->
        </div>

        <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
        <div class="row">
          <div class="col">
            <div class="text-end">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addRow" data-bs-whatever="@mdo">Nuova Società</button>
            </div>
          </div>
        </div>


        <div class="modal fade" id="addRow" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserLabel">Nuovo Società</h1>
                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
              </div>
              <div class="modal-body">
                <div class="alert alert-primary hide" id="alert-success" role="alert"></div>
                <div class="alert alert-danger hide" id="alert-error" role="alert"></div>
                <form id="form-add">
                  <div class="name">
                    <label for="input-name" class="col-form-label">Rag. Sociale:</label>
                    <input type="text" class="form-control" id="input-name">
                  </div>
                  <div class="mb-3">
                    <label for="input-piva" class="col-form-label">P.Iva:</label>
                    <input type="text" class="form-control" id="input-piva">
                  </div>
                  <div class="mb-3">
                    <label for="input-address" class="col-form-label">Indirizzo:</label>
                    <input type="text" class="form-control" id="input-address">
                  </div>
                  <div class="mb-3">
                    <label for="input-email" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" id="input-email">
                  </div>
                  <div class="mb-3">
                    <label for="input-telefone" class="col-form-label">Telefono:</label>
                    <input type="text" class="form-control" id="input-telephone">
                  </div>

                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="closeModal()">Chiudi</button>
                <button type="button" class="btn btn-primary" id="add-button" onClick="controlForm()">Invia</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalChoice" tabindex="-1" aria-labelledby="choiceModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content rounded-3 shadow">
              <div class="modal-body p-4 text-center">
                <h5 class="mb-0" id="choice-title"></h5>
                <p class="mb-0" id="choice-text"></p>
                <input type="hidden" id="input-id">
              </div>
              <div class="modal-footer flex-nowrap p-0">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end" onClick="yesStatus()"><strong>Si</strong></button>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>

        <h2>Società</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm display" id="tabella" style="width:100%">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Rag. Sociale</th>
                <th scope="col">P.IVA</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Active</th>
                <th scope="col">Mod.</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <?php include("../portale/javascript.php"); ?>
  <?php include("../portale/footer.php"); ?>
</body>

</html>