$(function () {

    load();
    $("#logout").on('click', logout);
    $("#to_home").on('click', toHome);
    $("#to_beta").on('click', toBeta);
    $("#to_alpha").on('click', toAlpha);
    $(".data_modify").on('click', modify);
    $("#delete").on('click', deleteAccount);

});

let toBeta = function () {

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


let deleteAccount = function () {

    Swal.fire({
        title: 'êtes-vous sûr!?',
        text: "Vous ne pourrez pas revenir en arrière après validation!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprime le!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Supprimé!',
                'Votre compte à bien été supprimé.',
                'success',
                $.ajax({

                    url: '../src/Controller/userController.php',
                    dataType: 'JSON',
                    type: 'POST',
                    data: {
                        request: 'deleteAccount',
                    },
                    success: function (response) {
                        console.log(1);
                    },
                    error: function () {
                        console.log('delError')
                    }
                })
            )
            setTimeout(() => {
                window.location.href = "index.php";
            }, 2300);
        }
    })
}

let modify = function () {
    var type = $(this).attr('data-id');
    console.log(type);
    Swal.fire({
        title: 'Nouveau ' + type,
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Save',
        showLoaderOnConfirm: true,
        preConfirm: (input) => {
            console.log('query_ajax');
            $.ajax({

                url: '../src/Controller/userController.php',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    request: 'modify',
                    value: input,
                    type_value: type
                },
                success: function (response) {

                },
                error: function () {
                    console.log('moderror')
                }
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Modification effectuée!',
                'Votre champ a bien été mis à jour.',
                'success',
            )
            setTimeout(() => {
                window.location.replace('profile.php')
            }, 1300);
        }
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

function load() {

    // console.log(1);
    $.ajax({

        url: '../src/Controller/userController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'user_login',
        },
        success: function (response) {

            if (response == 1) {
                window.location.href = "index.php";
            } else {
                $(".user_login").html(response['login']);
                $("#pwd").html(response['password']);
                $("#user_nom").html(response['nom']);
                $("#user_prenom").html(response['prenom']);
            }
            // console.log(2);

        },
        error: function () {

        }
    });
}

let toHome = function () {
    console.log("tohome");
    $.ajax({
        url: '../src/Controller/userController.php',
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
