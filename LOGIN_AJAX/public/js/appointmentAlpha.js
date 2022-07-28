$(function () {

    load();
    $("#file").on('change', checkType)

});

let load = function () {
    login();
    dayCases();
    rdvCases(1);
    /*
        $("#rdvContainer").on('click', toggleSlide);
    */
    $("#logout").on('click', logout);
    $("#to_profil").on('click', toProfil);
    $("#to_home").on('click', toHome);
    $("#to_beta").on('click', toBeta);

}

function checkUploadedFile() {



}

function checkType() {

    var file = this.files[0];
    var fileType = file.type;
    var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
    if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
        alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
        $("#file").val('');
        return false;
    }

}

function uploadFile() {

    var data = new FormData($('form')[1]);
    $.ajax({
        url: '../src/Controller/appointmentalphaController.php', //script qui traitera l'envoi du fichier
        type: 'POST',
        dataType: 'JSON',
        enctype: 'multipart/form-data',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
/*        beforeSend: function(){
            $('#submitBtn').attr("disabled","disabled");
            $('#fupForm').css("opacity",".5");
        },*/

        success: function (response) {
            console.log('SuccesssUpload');
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: response['msg'],
                showConfirmButton: false,
                timer: 1500
            });

        },
        error: function () {
            console.log('errordayUpload');
        }
    });

    function afficherAvancement(e) {
        if (e.lengthComputable) {
            $('progress').attr({value: e.loaded, max: e.total});
        }
    }


}

function dayCases(timestampID = null) {
    console.log(timestampID);
    $.ajax({

        url: '../src/Controller/appointmentalphaController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'dayCases',
            currentDate: timestampID,
        },
        success: function (response) {
            console.log('SuccesssdayCases');
            $("#rdvContainer").html(response['html']);
            $("#panel").html(response['htmlSlot']);

        },
        error: function () {
            console.log('errordayCases');
        }
    });
}

/*$idS = [$(".b").map(function () {
    return this.id;
}).get()];
console.log($idS);*/



/*let toggleSlide = function () {
    console.log('toggle');
    $("#panel").slideToggle();

    /!*
        $("#d").slideToggle();
    *!/

}*/

function changeDate(timestamp) {

    dayCases(timestamp);

}

let createNews = function () {

    $.ajax({

        url: '../src/Controller/appointmentalphaController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'createNews',
            content: $('#newsContent').val(),
            title: $('#titleNews').val()
        },
        success: function (response) {

            console.log('SuccesssdayNews');
            if (response['status'] === 1) {

                iziToast.success({

                    timeout: 2000,
                    progressBar: true,
                    message: response['msg'],
                    position: 'topRight',

                });

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
            console.log('errordayCases');
        }
    });


}

let rdvCases = function (page) {

    $.ajax({

        url: '../src/Controller/appointmentalphaController.php',
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

        },
        error: function () {

        }
    })

}

let showInfo = function (id) {

    console.log('shoin');
    $.ajax({

        url: '../src/Controller/appointmentalphaController.php',
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


let slotTimeClick = function (thisId) {

    /*    var id = $(this).attr('id');
        console.log(id);*/

    console.log('slotTime');
    $.ajax({

        url: '../src/Controller/appointmentalphaController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'slotTimeClick',
            slotID: thisId
        },
        success: function (response) {
            console.log('SuccessslotTimeClick');

            $('#modalSlot').modal('show');
            $('#modal-slotTime').html(response['slotTime']);
            $('#modal-dateSelect').html(response['dateSelect']);
            $('.modal-body').attr('id', response['slotTimeStamp'])

        },
        error: function () {
            console.log('errorSlot');
        }
    });

}

let newAppointment = function () {

    /*    let checkboxes_value = false;

        $('.checkbox').each(function () {
            if ($(this).is(':checked')) {
                checkboxes_value = true;
            }
        })

        console.log(checkboxes_value);*/

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

                url: '../src/Controller/appointmentalphaController.php',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    request: 'newAppointment',
                    expertID: $('#expertID').val(),
                    timeslotID: $('.modal-body').attr('id'),
                    newsletter: $('.checkbox').is(':checked'),
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

                        dayCases();
                        rdvCases(1);

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

let toBeta = function () {

    console.log('beta');
    $.ajax({

        url: '../src/Controller/appointmentalphaController.php',
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