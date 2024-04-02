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
          <div class="btn-toolbar mb-2 mb-md-0">
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
          </div>
        </div>

        <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
        <div class="row">
          <div class="col">
            <div class="text-end">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addUser" data-bs-whatever="@mdo">Nuovo Dipendente</button>
            </div>
          </div>
        </div>


        <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserLabel">Nuovo Dipendente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="inputname" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" id="inputname">
                  </div>
                  <div class="mb-3">
                    <label for="inputsurname" class="col-form-label">Cognome:</label>
                    <input type="text" class="form-control" id="inputsurname">
                  </div>
                  <div class="mb-3">
                    <label for="inputcf" class="col-form-label">CF:</label>
                    <input type="text" class="form-control" id="inputcf">
                  </div>
                  <div class="mb-3">
                    <label for="inputnascita" class="col-form-label">Anno di nascita:</label>
                    <input type="text" class="form-control" id="inputnascita">
                  </div>
                  <div class="mb-3">
                    <label for="inputrole" class="col-form-label">Ruolo:</label>
                    <input type="text" class="form-control" id="inputrole">
                  </div>
                  <div class="mb-3">
                    <label for="inputeng" class="col-form-label">Data di assunzione:</label>
                    <input type="text" class="form-control" id="inputeng">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" class="btn btn-primary">Crea</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="viewUser" tabindex="-1" aria-labelledby="viewUserLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="addUserLabel">Visualizza dati dipendente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="text-center">
                        <img data-src="holder.js/200x200" class="rounded" alt="200x200" style="width: 200px; height: 200px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18e2832c287%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18e2832c287%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.41666603088379%22%20y%3D%22104.40000009536743%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                      </div>
                    </div>
                    <div class="col-md-7 ms-auto">
                      <p>Nome: <b><span id="nome-view"></span></b></p>
                      <p>Cognome: <b><span id="cognome-view"></span></b></p>
                      <p>Codice Fiscale: <b><span id="cf-view"></span></b></p>
                      <p>Anno di nascita: <b><span id="nascita-view"></span></b></p>
                      <p>Ruolo: <b><span id="ruolo-view"></span></b></p>
                      <p>Data Assunzione: <b><span id="assunzione-view"></span></b></p>
                      <p>Telefono: <b><span id="telefono-view"></span></b></p>
                      <p>E-mail: <b><span id="email-view"></span></b></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
              </div>
            </div>
          </div>
        </div>
        <h2>Dipendenti</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm" id="tabella">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">CF</th>
                <th scope="col">Anno di nascita</th>
                <th scope="col">Ruolo</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <!-- jQuery library -->
  <script src="../portale/assets/jquery/jquery-3.7.1.min.js"></script>
  <script src="../portaleassets/jquery-ui/jquery-ui.js"></script>
  <script src="../portaleassets/jquery-ui/datepicker-it.js"></script>
  <script src="../portaleassets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../portaleassets/fontawesome/js/all.min.js"></script>
  <script src="assets/service.js"></script>
  <script>
    $(document).ready(function() {
      $("#inputnascita").datepicker($.datepicker.regional['it']);
      $("#inputeng").datepicker($.datepicker.regional['it']);
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>