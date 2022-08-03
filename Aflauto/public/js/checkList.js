// controle technique ok

function ctOk() {
    id_controle = $("#id_controle").val();
    $.ajax({
        url: "../src/Controller/checklistController.php",
        dataType: "JSON",
        type: "POST",
        data: {
            request: "ctOk",
            id_controle:$("#id_controle").val(),
            freinService: $("#freinService").val(),
            freinStationnement: $("#freinStationnement").val(),
            pedaleFrein: $("#pedaleFrein").val(),
            disqueFrein: $("#disqueFrein").val(),
            volantDirection: $("#volantDirection").val(),
            colonneDirection: $("#colonneDirection").val(),
            pompe: $("#pompe").val(),
            pareBrise: $("#preBrise").val(),
            retro: $("#retro").val(),
            essuieGlace: $("#essuieGlace").val(),
            feuRoute: $("#feuRoute").val(),
            feuCroisement: $("#feuCroisement").val(),
            signaleDetresse: $("#signaleDetresse").val(),
            plancher: $("#plancher").val(),
            coque: $("#coque").val(),
            chassis: $("#chassis").val(),
            aile: $("#aile").val(),
            moteur: $("#moteur").val(),
            boiteVitesse: $("#boiteVitesse").val(),
            transmission: $("#transmission").val(),
        },
        success: function (response) {
            alert(response["msg"]);
        },

        error: function () {
            alert("something Wrong Is Happening");
        },
    });
}

// _____________________________________________________________

// control technique not ok

function ctNotOk() {
    id_controle = $("#id_controle").val();
    var freinService = $("#freinService").is(":checked");
    var freinStationnement = $("#freinStationnement").is(":checked");
    var pedaleFrein = $("#pedaleFrein").is(":checked");
    var disqueFrein = $("#disqueFrein").is(":checked");
    var volantDirection = $("#volantDirection").is(":checked");
    var colonneDirection = $("#colonneDirection").is(":checked");
    var pompe = $("#pompe").is(":checked");
    var pareBrise = $("#pareBrise").is(":checked");
    var retro = $("#retro").is(":checked");
    var essuieGlace = $("#essuieGlace").is(":checked");
    var feuroute = $("#feuRoute").is(":checked");
    var feuCroisement = $("#feuCroisement").is(":checked");
    var signaleDetresse = $("#signaleDetresse").is(":checked");
    var plancher = $("#plancher").is(":checked");
    var coque = $("#coque").is(":checked");
    var chassis = $("#chassis").is(":checked");
    var aile = $("#aile").is(":checked");
    var moteur = $("#moteur").is(":checked");
    var boiteVitesse = $("#boiteVitesse").is(":checked");
    var transmission = $("#transmission").is(":checked");
    $.ajax({
        url: "../src/Controller/checklistController.php",
        dataType: "JSON",
        type: "POST",
        data: {
            request: "ctNotOk",
            id_controle:$("#id_controle").val(),
            frein_Service: freinService,
            frein_Stationnement: freinStationnement,
            pedale_Frein: pedaleFrein,
            disque_Frein: disqueFrein,
            volant_Direction: volantDirection,
            colonne_Direction: colonneDirection,
            _pompe: pompe,
            pare_Brise: pareBrise,
            _retro: retro,
            essuie_Glace: essuieGlace,
            feu_Route: feuroute,
            feu_Croisement: feuCroisement,
            signale_Detresse: signaleDetresse,
            _plancher: plancher,
            _coque: coque,
            _chassis: chassis,
            _aile: aile,
            _moteur: moteur,
            _boiteVitesse: boiteVitesse,
            _transmission: transmission,
        },
        success: function (response) {
            alert(response["msg"]);
        },

        error: function () {
            alert("something Wrong Is Happening");
        },
    });
}
