var rowel = [];
var idRow = null;
var statusVal = null;
var color = {};

function tablePagination() {
    $('table.display').DataTable({
        responsive: true,
        searchable: false,
        orderable: false,
        targets: 0
    });
}
function companyCall() { 
    $.ajax({
        url: 'api/getCompany.php', 
        dataType: 'json', //restituisce un oggetto JSON
        complete: function (dipendenti, stato) {
            console.log("RISPOSTA", dipendenti.responseJSON);
           
            var righe = dipendenti.responseJSON;
            rowel = righe;
            for (i = 0; i < righe.length; i++) {
                var riga = righe[i];
                var element = "<td>" + riga.id + "</td>";
                element += "<td>" + riga.name + "</td>";
                element += "<td>" + riga.piva + "</td>";
                element += "<td>" + riga.address + "</td>";
                element += "<td>" + riga.email + "</td>";
                element += "<td>" + riga.telephone + "</td>";
                if (riga.active == 1) {
                    element += '<td><button type="button" class="btn btn-sm btn-outline-secondary" onClick="changeStatus(' + riga.id + ', 0)"><i class="fa-solid fa-check" style="color: #349b08;"></i></button></td>';
                } else { 
                    element += '<td><button type="button" class="btn btn-sm btn-outline-secondary" onClick="changeStatus(' + riga.id + ', 1)"><i class="fa-solid fa-xmark" style="color: #ec0909;"></i></button></td>';
                }
                element += '<td><button type="button" class="btn btn-sm btn-outline-secondary" onClick="openModRow(' + riga.id + ')"><i class="fa-solid fa-square-pen"></i></button></td>';
                element += '<td><button type="button" class="btn btn-sm btn-outline-secondary" onClick="openUploadImg(' + riga.id + ')"><i class="fa-solid fa-image"></i></button></td>';
                element += '<td><button type="button" class="btn btn-sm btn-outline-secondary" onClick="openColor(' + riga.id + ')"><i class="fa-solid fa-palette"></i></button></td>';

                $("<tr/>")
                    .append(element)
                    .appendTo("#tabella");
            }
            tablePagination();
        }
    });
}

function resetColorModal() {
    $("#header-color-logo").val("");
    $("#header-color-barra").val("");
    $("#testo-color-menu").val("");
    color = {
        "logo": "",
        "header": "",
        "textmenu": ""
    }
}

function openColor(id) {
    var comp = searchCompany(id);
    idRow = id;
    resetColorModal();
    if (comp.colori) {
        var colori = jQuery.parseJSON(comp.colori);
        $("#header-color-logo").val(colori.logo);
        $("#header-color-barra").val(colori.header);
        $("#testo-color-menu").val(colori.textmenu);
    }
    $('#modalColor').modal('show');
}
function yesSendColor() {
    var logo = $("#header-color-logo").val();
    var header =$("#header-color-barra").val();
    var textmenu = $("#testo-color-menu").val();
    if ((logo != "") || (header != "") || (textmenu != "")) {
       color = {
            "logo": logo, 
            "header": header,
            "textmenu": textmenu
        }
        var data = searchCompany(idRow);
        data.colori = JSON.stringify(color);
        modRow(data); 
        $('#modalColor').modal('hide');
    } else {
        $("#error-color").text("Inserire codici colori");
    }
    
}

function searchCompany(id) { 
    var resp = null;
    for (var a = 0; a < rowel.length; a++){
        if (id == rowel[a].id) {
            resp = rowel[a];
        }
    }
    return resp;
}

function resetModalImg() {
    $(".spinner-border").addClass("hide");
    $(".button-close-send").attr("disabled", false);
    $(".button-send").attr("disabled", false);
    $("#img-area").removeClass("hide");
}

function openUploadImg(id) {
    var comp = searchCompany(id);
    idRow = id;
    resetModalImg();
    if (comp.foto) {
        $(".img-company").removeClass("hide");
        var img = "../../portale/logo_img/" + comp.foto;
        $(".img-company").attr("src", img);
    } else {
        $(".img-company").addClass("hide");
    }
    $('#modalImage').modal('show');
}

function yesSendImg() {
    $(".button-close-send").attr("disabled", true);
    $(".button-send").attr("disabled", true);
    $(".spinner-border").removeClass("hide");
    $("#img-area").addClass("hide");
    $("#error-image").text("");

    var upload = document.querySelector('#input-imgcompany').files[0];
    //console.log(upload);
    if (upload && controlFileTypeImg(upload)) {
            var reader = new FileReader();
            reader.readAsDataURL(upload);
            reader.onload = function () {
            file = reader.result;
                var data = searchCompany(idRow);
            modRow(data, file, upload.name);
        };
    } else {
        $("#error-image").text("Inserire un immagine valida");
        resetModalImg();
    }
}

function searchData(id) {
    var data = "";
    for (var a = 0; a < rowel.length; a++) {
        if (id == rowel[a].id) {
            data = rowel[a];
        }
    }
    return data;
}

function modRow(data, file, nomefile) {
    console.log("DATA", data);
    
    $.ajax({
        method: "POST",
        url: "api/modCompany.php",
        data: JSON.stringify({ id: data.id, name: data.name, piva: data.piva, address: data.address, email: data.email, telephone: data.telephone, active: data.active, foto: data.foto, file: file, nomeFile: nomefile, colori: data.colori }),
        contentType: "application/json",
        success: function (data) {
            if (file) {
                resetModalImg();
                $('#modalImage').modal('hide');
                location.reload();
            } else {
             console.log("funzione chiamata quando la chiamata ha successo (response 200)", data);
            $("#alert-success").removeClass("hide");
            $("#alert-success").text("Società inserita correttamente");
            $("#form-add").addClass("hide");
            $("#add-button").addClass("hide");
            cleanInput();   
            }
            

        },
        error: function (error) {
            if (file) {
                $("#error-image").text("Errore durante il caricamento dell'immagine");
                resetModalImg();
            } else {
              console.log("funzione chiamata quando la chiamata fallisce", error);
                $("#alert-error").removeClass("hide");
                $("#alert-error").text(error);  
            }
            
        }
    });
}

function openModRow(id) {
    var data = searchData(id);
    idRow = data.id;
    $("#input-name").val(data.name);
    $("#input-piva").val(data.piva);
    $("#input-address").val(data.address);
    $("#input-email").val(data.email);
    $("#input-telephone").val(data.telephone);
    $('#addRow').modal('show');
}

function yesStatus() { 
    var data = searchData(idRow);
    data.active = statusVal;
    modRow(data);
    closeModal();
}

function changeStatus(id, status) {
    
    idRow = id;
    statusVal = status;
    $('#choice-title').text("Sei sicuro?");
    if (status == 1) {
        $('#choice-text').html("Stai per abilitare <b>" + searchData(id).name + "</b>");
         } else {
        $('#choice-text').html("Stai per disabilitare <b>" + searchData(id).name + "</b>");
        }
    $('#modalChoice').modal('show');
}

function cleanInput() {
    $("#input-id").val("");
    $("#input-name").val("");
    $("#input-piva").val("");
    $("#input-address").val("");
    $("#input-email").val("");
    $("#input-telephone").val("");
   
}

function controlForm() { 
    var name = $("#input-name").val();
    var piva = $("#input-piva").val();
    var address = $("#input-address").val();
    var email = $("#input-email").val();
    var tel = $("#input-telephone").val();

    var count = 0;
    var html = "<ul>";
    if (name == "") { html += "<li>Inserire Ragione Sociale</li>"; count++; }
    if (piva == "") { html += "<li>Inserire Partita Iva</li>"; count++; }
    if (address == "") { html += "<li>Inserire Indirizzo</li>"; count++; }
    if (email == "") { html += "<li>Inserire Email</li>"; count++; }
    if (tel == "") { html += "<li>Inserire Telefono</li>"; count++; }
    html += "</ul>";
    if (count > 0) {
        $("#alert-error").removeClass("hide");
        $("#alert-error").html(html);
    } else {
        if (idRow) {
            var data = searchData(idRow);
            data.name = name;
            data.piva = piva;
            data.address = address;
            data.email = email;
            data.telephone = tel;
            modRow(data);
        } else {
            addRow();
        }
    }
}

function addRow() {
    var name = $("#input-name").val();
    var piva = $("#input-piva").val();
    var address = $("#input-address").val();
    var email = $("#input-email").val();
    var tel = $("#input-telephone").val();

    $.ajax({
        method: "POST",
        url: "api/createCompany.php",
        data: JSON.stringify({ name: name, piva: piva, address: address, email: email, telephone : tel }),
        contentType: "application/json",
        success: function (data) {
            console.log("funzione chiamata quando la chiamata ha successo (response 200)", data);
            $("#alert-success").removeClass("hide");
            $("#alert-success").text("Società inserita correttamente");
            $("#form-add").addClass("hide");
            $("#add-button").addClass("hide");
            cleanInput();
        },
        error: function (error) {
            console.log("funzione chiamata quando la chiamata fallisce", error);
            $("#alert-error").removeClass("hide");
            $("#alert-error").text(error);
        }
    });

}

function closeModal() {
    window.location.reload(true);
}


$(document).ready(function () {
    companyCall();
});
    
           