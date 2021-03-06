$(function () {

    load();

});

function load() {

    login();
    listCommands(1);
    $("#logout").on('click', logout);
    $("#to_profil").on('click', toProfil);
    $("#to_beta").on('click', toBeta);
    $("#to_alpha").on('click', toAlpha);
/*
    $('.showInfo').on('click', showInfo);
*/

}

let toBeta = function () {

    console.log('beta');
    $.ajax({

        url: '../src/Controller/commandController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_beta',
        },
        success: function (response) {
            console.log('successBeta');
            window.location.replace('appointmentBeta.php')

        },
        error: function () {
            console.log('errorBeta');
        }
    });

}

let toAlpha = function () {

    console.log('Alpha');
    $.ajax({

        url: '../src/Controller/commandController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_alpha',
        },
        success: function (response) {
            console.log('successAlpha');
            window.location.replace('appointmentAlpha.php')

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

        url: '../src/Controller/commandController.php',
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

let newCommand = function () {

    console.log('newcmd');

    var checkboxes_value = [];

    $('.checkbox').each(function () {
        if ($(this).is(':checked')) {
            checkboxes_value.push($(this).val());
        }
    })

    console.log(checkboxes_value);

    $.ajax({

        url: '../src/Controller/commandController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'newCommand',
            title: $('#titre').val(),
            label: $('#label').val(),
            payment: JSON.stringify(checkboxes_value),
            type: $('#type-select').val(),
            login: $(".user_login").html()

        },
        success: function (response) {

            if (response['status'] === 0) {

                iziToast.error({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

            } else {

                iziToast.success({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

            }


        },
        error: function () {
            console.log('errorNewcmd');
        }
    });
}

function listCommands(page) {

    $.ajax({

        url: '../src/Controller/commandController.php',
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
                window.location.href = "index.php";
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
            window.location.replace('profile.php')
        },

        error: function () {
            console.log('errProf')
        }
    });

}