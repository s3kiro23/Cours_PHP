function $_GET(param) {
    var vars = {};
    window.location.href.replace(location.hash, '').replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function (m, key, value) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if (param) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

function changePassword() {
    let token = $_GET('token');

    console.log("changePasswordAjax");
    $.ajax({
        url: 'Controller/recoveryController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'modify_password',
            password: $('#password').val(),
            password2: $('#password2').val(),
            token: token
        },
        success: function (response) {
            console.log('changePasswordResp');
            if (response['status'] === 1) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response['msg'],
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(() => {
                    console.log('redir')
                    window.location.replace('index.php')
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
            console.log('errChgPwd')
        }
    });
}
