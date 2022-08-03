function vehicule_attente() {
    $.ajax({
        url: "../src/Controller/backofficeController.php",
        dataType: "JSON",
        type: "POST",
        data: {
            request: "vehiculeAttente",
        },
        success: function (response) {
            if (response["status"] == 1) {
                $("#vehiculeAttente").html(response["msg"]);
            }
            if (response["status"] == 0) {
                $("#noAttente").html(response["msg2"]);
            }
        },
        error: function () {
            console.log("PHP");
        },
    });
}

//
//
//
function priseEnCharge(data) {
    var idInter = data;
    $.ajax({
        url: "../src/Controller/backofficeController.php",
        dataType: "JSON",
        type: "POST",
        data: {
            request: "prise_en_charge",
            idControle: idInter,
        },
        success: function (response) {
            if (response) {
                $("#modalTech").modal("show");
                $("#modalBody").html(response["msg"]);
                $("#modalTitre").html(response["msg2"]);
                $("#modalFoot").html(response["msg3"]);
            } else {
                alert("Erreur2");
            }
        },
        error: function () {
            console.log("PHP");
        },
    });
}

//
//
//
function basculerIntervention(id) {
    var id_controle = id;
    var id_tech = $("#idTechnicien").val();
    $.ajax({
        url: "../src/Controller/backofficeController.php",
        dataType: "JSON",
        type: "POST",
        data: {
            request: "baculer_intervention",
            idControle: id_controle,
            idTech: id_tech,
        },
        success: function (response) {
            if (response) {
                $("#interventionTab").html(response["msg"]);
            } else {
                alert("ErreurDDDDDD");
            }
            $("#modalTech").hide("hide");
            vehicule_attente();
            loadIntervEnCours();
        },
        error: function () {
            console.log("PHP");
        },
    });
}

//
//
//
function loadIntervEnCours() {
    $.ajax({
        url: "../src/Controller/backofficeController.php",
        dataType: "JSON",
        type: "POST",
        data: {
            request: "interv_en_cours",
        },
        success: function (response) {
            if (response["status"] == 1) {
                $("#interventionTab").html(response["msg"]);
            }
            if (response["status"] == 0) {
                $("#noInterv").html(response["msg2"]);
            }
        },
        error: function () {
            console.log("PHP");
        },
    });
}

let logout = function () {

    console.log(1);
    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'logout',
            login: $(".user_login").html()
        },
        success: function (response) {

            iziToast.success({

                timeout: 2000,
                progressBar: true,
                message: response['msg'],
                position: 'topRight',

            });

            setTimeout(() => {
                window.location.href = "index.html";
            }, 2300);

        },
        error: function () {

        }
    });
}


function login() {

    // console.log(1);
    $.ajax({

        url: '../src/Controller/backofficeController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'user_login',
        },
        success: function (response) {
            // console.log(2);
            $(".user_login").html(response['login']);

        },
        error: function () {

        }
    });
}


//
//
//
//
//
//

$(document).ready(function () {
    vehicule_attente();
    loadIntervEnCours();
    login();
    $("#logout").on('click', logout);

});
