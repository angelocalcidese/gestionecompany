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
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="imageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0" id="image-title">Carica Logo Società</h5>
                <p class="mb-0" id="image-text"></p>
                <div id="mounth-image">
                    <h6 class="mt-2" style="color:#FF0000" id="error-image"></h6>
                </div>
                <div id="img-area">
                    <img class="img-company mb-3 hide" src="" width="200" />
                    <div id="upload-int-file" class="input-group">
                        <input type="file" class="form-control" id="input-imgcompany" aria-describedby="inputGroupFileAddon" aria-label="Upload">
                    </div>
                </div>
                <div class="spinner-border text-warning mt-3 hide" role="status">
                    <span class="sr-only">Loading...</span>
                </div>


            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end button-send " onClick="yesSendImg()"><strong>Si</strong></button>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 button-close-send" onclick="closeModal()">Chiudi</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalColor" tabindex="-1" aria-labelledby="colorModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-body p-4 text-center">
                <h5 class="mb-0" id="color-title">Cambia colori</h5>
                <p class="mb-0" id="color-text"></p>
                <div id="mounth-color">
                    <h6 class="mt-2" style="color:#FF0000" id="error-color"></h6>
                </div>
                <div class="form-floating w-50">
                    <input type="text" class="form-control" id="header-color-logo" placeholder="#00000">
                    <label for="header-color-logo">Header Colore Logo</label>
                </div>
                <div class="form-floating w-50 mt-3">
                    <input type="text" class="form-control" id="header-color-barra" placeholder="#00000">
                    <label for="header-color-barra">Header Colore Intestazione</label>
                </div>
                <div class="form-floating w-50 mt-3">
                    <input type="text" class="form-control" id="testo-color-menu" placeholder="#00000">
                    <label for="testo-color-menu">Colore Testo Menu</label>
                </div>
                <div class="spinner-border text-warning mt-3 hide" role="status">
                    <span class="sr-only">Loading...</span>
                </div>


            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end button-send " onClick="yesSendColor()"><strong>Salva</strong></button>
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 button-close-send" onclick="closeModal()">Chiudi</button>
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