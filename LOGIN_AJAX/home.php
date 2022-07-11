<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>   
    <script src="js/header.js"></script>
    <title>Home</title>
</head>

<header>
    <navbar-component></navbar-component>
</header>

<body>

    <h1 class="text-dark text-5xl text-center m-3 p-3 hover:text-green-500 border-r-50"></h1>
    <form class="container max-w-4xl px-6 py-10 mx-auto" action="javascript:newCommand();" method="POST">
        <div class="flex justify-center mx-auto">
            <div class="mb-3">
                <label for="titre" class="sr-only">Commande</label>
                <input id="titre"
                       name="titre"
                       class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       type="text"
                       required
                       placeholder="Titre nouvelle commande"
                />
                <label for="label" class="sr-only">Label commande</label>
                <input id="label"
                       name="label"
                       class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       type="text"
                       required
                       placeholder="Label commande"
                />
            </div>
        </div>
        <div class="flex justify-center mx-auto">
            <button
                    type="submit"
                    class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
              <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
              </span>
                <span class="ml-4 mt-0.5">Créer</span>
            </button>
        </div>
    </form>
    <hr class="border-gray-300 w-10 mx-auto">
    <section class="bg-white">
        <div class="container max-w-4xl px-6 py-5 mx-auto">
            <h1 class="mb-4 text-4xl font-semibold text-center text-gray-800 white:text-dark">Commandes en cours</h1>
            <div class="border-2 border-gray-300 rounded-lg" id="listCommands">
                <!--<div class="flex py-3 justify-between items-center w-full">
                    <span class="pl-4 font-semibold text-gray-700 white:text-dark">N° de commande : </span>
                    <span class="cmdID">Test</span>
                    <div class="pl-4 font-semibold text-gray-700 white:text-dark">Date de commande : </div>
                    <div class="cmdDate">Test</div>
                    <div>
                        <button onclick="showInfo($id)" class="showInfo col-span-3 px-4 font-medium text-indigo-600 hover:text-indigo-500"
                                type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>-->
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">N° de commande : </h5>
                    <span id="modal-cmdID" class="pl-4">ID</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <span class="font-semibold text-gray-700 white:text-dark">Titre : </span>
                        <span id="modal-cmdTitle" class="pl-4">titre</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700 white:text-dark">Label : </span>
                        <span id="modal-cmdLabel" class="pl-4">label</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700 white:text-dark">Date : </span>
                        <span id="modal-cmdDate" class="pl-4">date</span>
                    </div>
                    <div>
                        <span class="font-semibold text-gray-700 white:text-dark">Client : </span>
                        <span id="modal-cmdClient" class="pl-4">client</span>
                    </div>
<!--                    <span id="cmdTitle"></span>
-->                </div>
                <div class="modal-footer">
                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

<script>

$(function() {

    load();

});

function load(){

    login();
    listCommands();
    $("#logout").on('click', logout);
    $("#to_profil").on('click', toProfil);
    $('.showInfo').on('click', showInfo);

}

function showInfo(id){

    console.log(id);
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'showInfo',
            cmdID: id
        },
        success: function(response) {
            console.log('showInfo');

            $('#modalInfo').modal('show');
            $('#modal-cmdID').html(response['cmdID'])
            $('#modal-cmdTitle').html(response['title'])
            $('#modal-cmdLabel').html(response['label'])
            $('#modal-cmdDate').html(response['date'])
            $('#modal-cmdClient').html(response['client'])
            load();

        },
        error: function() {
            console.log('erroShow');
        }
    });
}

function newCommand(){

    console.log('newco');
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'newCommand',
            title: $('#titre').val(),
            label: $('#label').val(),
        },
        success: function(response) {

            iziToast.success({

                timeout: 2000,
                progressBar: true,
                message: response['msg'],
                position: 'topRight',

            });

        },
        error: function() {

        }
    });
}

function listCommands(){

    console.log('listCommands');
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'listCommands',
        },
        success: function(response) {

            $("#listCommands").html(response['html']);

        },
        error: function() {

        }
    })
}

function currentCommand(){

    console.log('currentCMD1');
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'currentCommands',
        },
        success: function(response) {

            $(".cmdID").html(response['cmdID']);
            $(".cmdDate").html(response['date']);

        },
        error: function() {

        }
    })
}

let logout = function(){

    console.log(1);
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'logout',
        },
        success: function(response) {

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
        error: function() {

        }
    });
}

function login(){

    // console.log(1);
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'user_login',
        },
        success: function(response) {
            // console.log(2);
            $(".user_login").html(response['login']);

        },
        error: function() {

        }
    });
}

let toProfil = function(){
    console.log("toprof");
    $.ajax({
        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_profil',
        },
        success: function(response) {
            console.log('to_profResp');
            window.location.replace('profil.php')
        },

        error: function() {
            console.log('errProf')
        }
    });

}

</script>

</body>    
</html>
