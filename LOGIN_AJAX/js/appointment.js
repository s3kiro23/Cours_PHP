$(function () {

    load();

});

$idS = [$(".b").map(function () {
    return this.id;
}).get()];
console.log($idS);

let load = function () {
    login();
    dayCases();
    dateRDV();
    rdvCases(1);
    $("#flip").on('click', toggleSlide);
    $("#logout").on('click', logout);
    $("#to_profil").on('click', toProfil);
    $("#to_home").on('click', toHome);
    /*
        $(".slot").on('click', slotTimeClick);
    */
}


let toggleSlide = function () {
    console.log('toggle');
    $("#panel").slideToggle();

    /*
        $("#d").slideToggle();
    */

}

let dateRDV = function () {

    console.log('dateRDV');
    $.ajax({

        url: 'Controller/appointmentController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'dateRDV',
        },
        success: function (response) {
            console.log('SuccessslotdateRDV');
            $("#flip").html(response['date'])
        },
        error: function () {
            console.log('errordateRDV');
        }
    });

}

let dayCases = function () {

    $.ajax({

        url: 'Controller/appointmentController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'dayCases',
        },
        success: function (response) {
            console.log('SuccesssdayCases');
            $("#rdvContainer").html(response['html']);

        },
        error: function () {
            console.log('errordayCases');
        }
    });
}

let rdvCases = function (page) {

    $.ajax({

        url: 'Controller/appointmentController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'rdvCases',
            page: page
        },
        success: function (response) {

            $("#rdvCases").html(response['html']);
            $("#pages").html(response['paginationHTML'])
            $('#page' + page).addClass('active')

            /*$('#show_paginator').bootpag({
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
            });*/

        },
        error: function () {

        }
    })

}

let showInfo = function (id) {

    console.log('shoin');
    $.ajax({

        url: 'Controller/appointmentController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'showInfo',
            rdvID: id
        },
        success: function (response) {
            console.log(response['bookedDate']);

            $('#modalRdv').modal('show');
            $('#modal-rdvID').html(response['rdvID'])
            $('#modal-expertID').html(response['expertID'])
            $('#modal-userID').html(response['userID'])
            $('#modal-userLogin').html(response['userLogin'])
            $('#modal-timeslotID').html(response['timeslotID'])
            $('#modal-bookedDate').html(response['bookedDate'])

        },
        error: function () {
            console.log('errorShow');
        }
    });
}


let slotTimeClick = function () {

    console.log('slotTime');
    $.ajax({

        url: 'Controller/appointmentController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'slotTimeClick',
        },
        success: function (response) {
            console.log('SuccessslotTimeClick');

            $('#modalSlot').modal('show');

        },
        error: function () {
            console.log('errorSlot');
        }
    });

}

let newAppointment = function () {

    Swal.fire({
        title: 'Confirmez vous le rdv?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({

                url: 'Controller/appointmentController.php',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    request: 'newAppointment',
                    expertID: $('#expertID').val(),
                    timeslotID: $('#timeslotID').val(),
                },
                success: function (response) {
                    console.log('SuccessssnewAppointment');

                    if (response['status'] === 1) {

                        iziToast.success({

                            timeout: 2000,
                            progressBar: true,
                            message: response['msg'],
                            position: 'topRight',

                        });

                        setTimeout(() => {
                            window.location.replace('appointment.php')
                        }, 2300);

                    } else {

                        iziToast.error({

                            timeout: 2000,
                            progressBar: true,
                            message: response['msg'],
                            position: 'topRight',

                        });

                    }
                },

                error: function () {
                    console.log('errorsnewAppointment');
                }
            })
        }
    })
}

let slotTime = function () {

    $.ajax({

        url: 'Controller/appointmentController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'slotTime',
        },
        success: function (response) {
            console.log('SuccesssslotTime');


        },
        error: function () {
            console.log('errorslotTime');
        }
    });

}

let logout = function () {

    console.log(1);
    $.ajax({

        url: 'Controller/userController.php',
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

        url: 'Controller/userController.php',
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

let toHome = function () {
    console.log("tohome");
    $.ajax({
        url: 'Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_home',
        },
        success: function (response) {
            console.log('to_home');
            window.location.replace('commands.php')

        },

        error: function () {
            console.log('errhome')
        }
    });
}


let toProfil = function () {
    console.log("toprof");
    $.ajax({
        url: 'Controller/userController.php',
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