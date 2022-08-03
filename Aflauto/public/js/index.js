$(function () {

    load();

});

function load() {

    $('#to_signIn').on('click', signIn);
    $('#to_clientForm').on('click', toClientForm);
    $('#toRequestMail').on('click', toRequestMail);
    $('#tokenLink').on('click', tokenLink);

}

let toClientForm = function (){

    $.ajax({
        url: '../src/Controller/loginController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_clientForm',
        },
        success: function (response) {
            console.log('to_home');
            window.location.replace('clientForm.html')
        },

        error: function () {
            console.log('errhome')
        }
    });

}


let connect = function () {

    $.ajax({
        url: '../src/Controller/loginController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'connexion',
            login: $('#inputEmail').val(),
            password: $('#inputPassword').val(),
        },
        success: function (response) {
            console.log('id');
            if (response['status'] === 0) {

                iziToast.error({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

            } else if (response['status'] === 2) {

                iziToast.error({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

                $('#contentLogIn').html(response['contentPwdLogin']);

            } else if (response['status'] === 3) {

                iziToast.success({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

                $('#contentLogIn').html(response['contentPwdLogin']);

            } else {
                // console.log('id2');
                iziToast.success({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });
                console.log('Success');

                /*                setTimeout(() => {
                                    window.location.replace("commands.php");
                                }, 2300);*/

            }

        },
        error: function () {
            console.log('errID')
        }
    });
}

let newPwd = function () {
    console.log("newPwdAjax");
    $.ajax({
        url: '../src/Controller/loginController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'newPwd',
            user: $("#user").val(),
            password: $('#password').val(),
        },
        success: function (response) {
            console.log('newPwdAjaxResp');
            if (response['status'] === 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response['msg'],
                    showConfirmButton: false,
                    timer: 1500
                });
                console.log('Success');
                setTimeout(() => {
                    window.location.replace('commands.php')
                }, 1500);
            } else {
                Swal.fire({
                    title: 'Erreur',
                    text: response['msg'],
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Retry!'
                });
            }
        },

        error: function () {
            console.log('errNewPwd')
        }
    });
}

let toRequestMail = function () {
    console.log("requestMail");
    $.ajax({
        url: '../src/Controller/RecoveryController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'toRequestMail',
        },
        success: function (response) {
            console.log('toRequestMailResp');
            iziToast.success({

                timeout: 2000,
                progressBar: true,
                message: response['msg'],
                position: 'topRight',

            });

            $('#contentLogIn').html(response['contentForgot']);

        },

        error: function () {
            console.log('errToRequestMail')
        }
    });
}

let genToken = function () {

    console.log("genTokenAjax");
    $.ajax({
        url: '../src/Controller/RecoveryController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'genToken',
            mail: $('#email').val()
        },
        success: function (response) {
            console.log('genToken');

            if (response['status'] === 1) {
                console.log('genTokenSuccess');
                iziToast.success({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

                $('#contentLogIn').html(response['contentToken']);
                $('#tokenLink').html(response['token']);
                load();

            } else {
                console.log('genToken2Err');

                iziToast.error({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

            }

        },

        error: function () {
            console.log('errGenToken')
        }
    });

}

let tokenLink = function () {

    console.log("tokenLinkAjax");
    $.ajax({
        url: '../src/Controller/RecoveryController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'tokenLink',
        },
        success: function (response) {
            console.log('tokenLinkResp');

            window.location.replace('changePassword.php?token=' + $('#tokenLink').html());

        },

        error: function () {
            console.log('errTokenLink')
        }
    });

}

let smsVerif = function () {
    console.log("smsVerif");
    $.ajax({
        url: '../src/Controller/loginController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'sub_sms',
            sms_verif: $('#sms_verif').val(),
        },
        success: function (response) {
            console.log('sms_verifResp');
            if (response['status'] === 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response['msg'],
                    showConfirmButton: false,
                    timer: 1500
                });
                console.log('Success');
                if (response['type'] === 'technicien') {
                    setTimeout(() => {
                        window.location.replace('backOffice.html')
                    }, 1500);
                } else {
                    setTimeout(() => {
                        window.location.replace('clientDashboard.html')
                    }, 1500);
                }

            } else {
                Swal.fire({
                    title: 'Erreur',
                    text: response['msg'],
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Retry!'
                });
            }
        },

        error: function () {
            console.log('errSms_verif')
        }
    });
}

let signIn = function () {
    console.log("sign1");
    $.ajax({
        url: '../src/Controller/loginController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_signIn',
        },
        success: function (response) {
            console.log('signInResp');

            let timerInterval
            Swal.fire({
                title: response['msg'],
                html: 'I will close in <b></b> milliseconds.',
                timer: 1500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })

            setTimeout(() => {
                window.location.replace('signIn.html')
            }, 1500);

        },

        error: function () {
            console.log('errSignIn')
        }
    });

}
