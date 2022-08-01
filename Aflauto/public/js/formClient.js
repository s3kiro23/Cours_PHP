$(function () {

    load();
    /*$("#formFile").on('change', checkType)*/
    $("#selectMarque").on('change', modelesLoad)
    $(".form-control").on('change', checkField)

});

let load = function () {

    marquesLoad();
    dayCases();

}

let checkField = function () {

    $.ajax({

        url: '../src/Controller/formClientController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'checkField',
        },
        success: function (response) {

            /*
                        alert(response['msg'])
            */

        },
        error: function () {
            console.log('error');
        }
    });


}

let marquesLoad = function () {

    $.ajax({

        url: '../src/Controller/formClientController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'marquesLoad',
        },
        success: function (response) {

            $('#selectMarque').html(response['html_marque'])

        },
        error: function () {
            console.log('error');
        }
    });
}

let modelesLoad = function () {

    $.ajax({

        url: '../src/Controller/formClientController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'modelesLoad',
            marque: $('#selectMarque').val()
        },
        success: function (response) {

            console.log('ModOK')
            $('#selectModele').html(response['html_model'])

        },
        error: function () {
            console.log('error');
        }
    });
}

let dayCases = function (timestampID = null) {

    $.ajax({

        url: '../src/Controller/formClientController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'dayCases',
            currentDate: timestampID,
        },
        success: function (response) {
            console.log('SuccessdayCases');
            $("#rdvContainer").html(response['html_day']);
            $("#panel").html(response['html_slot'])
            /*            $.each(response['tab_dateTS'], function (i, l){
                            $("." + l).html(response['htmlSlot'])
                        })*/
        },
        error: function () {
            console.log('errordayCases');
        }
    });
}

function changeDate(timestamp) {

    dayCases(timestamp);

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
        confirmButtonText: 'Oui'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({

                url: '../src/Controller/formClientController.php',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    request: 'newAppointment',
                    civilite: $('input[name=optionsCivilite]:checked').val(),
                    nom: $('#inputNom').val(),
                    prenom: $('#inputPrenom').val(),
                    tel: $('#inputTel').val(),
                    email: $('#inputEmail').val(),
                    addr: $('#inputAddr').val(),
                    cp: $('#inputCP').val(),
                    ville: $('#inputVille').val(),
                    immat: $('#inputImmat').val(),
                    marque: $('#selectMarque').val(),
                    modele: $('#selectModele').val(),
                    carburant: $('input[name=optionsCarbu]:checked').val(),
                    annee: $('#inputAnnee').val(),
                    newsletter: $('#newsletter').is(':checked'),
                    creneau: $('input[name=timeSlot]:checked').attr('id'),
                },
                success: function (response) {
                    console.log('SuccessnewAppointment');

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
                    console.log('errorsnewAppointment');
                }
            })
        }
    })
}

