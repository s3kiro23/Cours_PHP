$(function () {

    load();

});

function load() {

    login();
    listCommands(1);
    $("#logout").on('click', logout);
    $("#to_profil").on('click', toProfil);
    $("#to_delivery").on('click', toDelivery);
    $('.showInfo').on('click', showInfo);

}

let toDelivery = function () {

    console.log('delivery');
    $.ajax({

        url: 'Controller/commandController.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_delivery',
        },
        success: function (response) {
            console.log('successDeliver');
            window.location.replace('livraison.php')

        },
        error: function () {
            console.log('errorDeliver');
        }
    });

}