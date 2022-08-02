$(function () {

    captcha();
    $('#to_logIn').on('click', to_logIn);

});

let signIn = function () {

    console.log(1);
    $.ajax({

        url: '../src/Controller/signInController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'signIn',
            civilite: $('input[name=optionsCivilite]:checked').val(),
            nom: $('#inputNom').val(),
            prenom: $('#inputPrenom').val(),
            tel: $('#inputTel').val(),
            email: $('#inputEmail').val(),
            type: $('#type-select').val(),
            passwd: $('#inputPassword').val(),
            passwd2: $('#inputPassword2').val(),
            checkCap: $('#captcha_verif').val(),
            captcha: $('#captcha').html(),
        },

        success: function (response) {

            if (response['status'] === 0) {
                console.log('error');

                Swal.fire({
                    title: 'Erreur',
                    text: response['msg'],
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Retry!'
                });
            } else {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response['msg'],
                    showConfirmButton: false,
                    timer: 1500
                });
                console.log('Success');

/*                setTimeout(() => {
                    window.location.replace("index.php");
                }, 1600);*/

            }

        },

        error: function () {
            console.log('errorSign');
        }

    });

}

function captcha() {

    console.log('cap');
    $.ajax({

        url: '../src/Controller/signInController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'captcha',
        },
        success: function (response) {
            console.log('success');
            $("#captcha").html(response['get_captcha']);

        },
        error: function () {
            console.log(3);
        }
    });
}

let to_logIn = function () {
    console.log("login1");
    $.ajax({
        url: '../src/Controller/signInController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_logIn',
        },
        success: function (response) {
            console.log('logInResp');

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
                window.location.replace('index.php')
            }, 1500);

        },

        error: function () {
            console.log('errSignIn')
        }
    });

};
