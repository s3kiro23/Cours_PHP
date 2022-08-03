$(function () {

    load();

});

function load() {

    login();
    carsRecap();
    listCommands(1);
    $("#logout").on('click', logout);
    $("#to_profil").on('click', toProfil);
    $("#to_cars").on('click', toCars);

}

let newRDV = function () {

    console.log('beta');
    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_beta',
        },
        success: function (response) {
            console.log('successBeta');
            window.location.replace('formClient.html')
        },
        error: function () {
            console.log('errorBeta');
        }
    });

}

let carsRecap = function () {

    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'loadCarsRecap',
        },
        success: function (response) {
            if (response["status"] == 1) {
                $("#mycars").html(response["html"]);
                $("#myrdv").html(response["htmlRDV"]);
                $("#myhistory").html(response["htmlHistory"]);
            }
            if (response["status"] == 0) {
                $("#mycars").html(response["htmlVide"]);
            }

        },
        error: function () {
            console.log('errorCars');
        }
    });


}

let toCars = function () {

    console.log('Alpha');
    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_cars',
        },
        success: function (response) {
            console.log('successAlpha');
            window.location.replace('clientCars.html')
        },
        error: function () {
            console.log('errorAlpha');
        }
    });

}

/*Opération sur les commandes*/

let showInfo = function (id) {

    console.log(id);
    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'showInfo',
            cmdID: id
        },
        success: function (response) {
            console.log('showInfo');

            $('#modalInfo').modal('show');
            $('#modal-cmdID').html(response['cmdID'])
            $('#modal-cmdTitle').html(response['title'])
            $('#modal-cmdLabel').html(response['label'])
            $('#modal-cmdType').html(response['type'])
            $('#modal-cmdPayment').html(response['allPayment'])
            $('#modal-cmdDate').html(response['date'])
            $('#modal-cmdClient').html(response['client'])

        },
        error: function () {
            console.log('errorShow');
        }
    });
}

function listCommands(page) {

    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'listCommands',
            page: page
        },
        success: function (response) {

            $("#listCommands").html(response['html']);
            $("#pages").html(response['paginationHTML'])
            $('#page' + page).addClass('active')

            $('#show_paginator').bootpag({
                total: response['totalPages'],
                page: 1,
                maxVisible: 10,
                leaps: true,
                firstLastUse: true,
                first: '←',
                last: '→',
                wrapClass: 'pagination',
                activeClass: 'active',
                disabledClass: 'disabled',
                nextClass: 'next',
                prevClass: 'prev',
                lastClass: 'last',
                firstClass: 'first'
            }).on('page', function (event, num) {
                $("#").html("Page " + num); // or some ajax content loading...
            });

        },
        error: function () {

        }
    })
}

/*Opération sur le compte user*/

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

        url: '../src/Controller/userController.php',
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

let toProfil = function () {
    console.log("toprof");
    $.ajax({
        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_profil',
        },
        success: function (response) {
            console.log('to_profResp');
            window.location.replace('profil.html')
        },

        error: function () {
            console.log('errProf')
        }
    });

}