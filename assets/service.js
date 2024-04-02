var utenti = [];
function employees() { 
    $.ajax({
        url: 'api/getEmployees.php', 
        dataType: 'json', //restituisce un oggetto JSON
        complete: function (dipendenti, stato) {
            console.log("RISPOSTA", dipendenti.responseJSON);
           
            var righe = dipendenti.responseJSON;
            utenti = righe;
            for (i = 0; i < righe.length; i++) {
                var riga = righe[i];
                var element = "<td>" + riga.id + "</td>";
                element += "<td>" + riga.nome + "</td>";
                element += "<td>" + riga.cognome + "</td>";
                element += "<td>" + riga.cf + "</td>";
                element += "<td>" + riga.annodinascita + "</td>";
                element += "<td>" + riga.ruolo + "</td>";
                element += '<td><button type="button" class="btn btn-sm btn-outline-secondary" onClick="viewUser(' + riga.id +')"><i class="fa-solid fa-eye"></i></button></td>';
                element += '<td><button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-square-pen"></i></button></td>';
                element += '<td><button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-trash"></i></button></td>';
                $("<tr/>")
                    .append(element)
                    .appendTo("#tabella");
            }

        }
    });
}

function viewUser(user) { 
    console.log(utenti[user]);
    var utente = utenti[user - 1];
    $("#nome-view").text(utente.nome);
    $("#cognome-view").text(utente.cognome);
    $("#cf-view").text(utente.cf);
    $("#nascita-view").text(utente.annodinascita);
    $("#ruolo-view").text(utente.ruolo);
    $("#assunzione-view").text(utente.assunzione);
    $("#telefono-view").text(utente.telefono);
    $("#email-view").text(utente.email);
    $('#viewUser').modal('show');
}

$(document).ready(function () {
    employees();
});
    
           