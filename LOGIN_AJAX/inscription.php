<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription</title>
</head>
<body>

    <div
            class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
        <div class="max-w-md w-full space-y-8">
            <div>
                <img
                        class="mx-auto h-12 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                        alt="Workflow"
                />

                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Créer votre compte
                </h2>
            </div>

            <form class="mt-8 space-y-6" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="nom" class="sr-only">Nom</label>

                        <input
                                id="nom"
                                name="nom"
                                type="nom"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Nom"
                        />
                    </div>

                    <div>
                        <label for="email-address" class="sr-only">Email address</label>

                        <input
                                id="email-address"
                                name="email"
                                type="email"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Adresse Email"
                        />
                    </div>

                    <div>
                        <label for="secret_question" class="sr-only">Question secrète</label>

                        <select id="secret_question"
                                name="secret_question"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">

                            <option> -- Choisissez une question --</option>
                            <option>Ville de naissance</option>
                            <option>Premier chien</option>
                            <option>Manga préféré</option>

                        </select>
                    </div>

                    <div>
                        <label for="secret_response" class="sr-only">Réponse secrète</label>

                        <input
                                id="secret_response"
                                name="secret_response"
                                type="text"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Réponse secrète"
                        />
                    </div>

                    <div>
                        <label for="password" class="sr-only">Email address</label>

                        <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Mot de passe"
                        />
                    </div>

                    <div>
                        <label for="password2" class="sr-only">Password</label>

                        <input
                                id="password2"
                                name="password2"
                                type="password"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Confirmez mot de passe"
                        />
                    </div>
                </div>
                <div class="rounded-md">
                    <div class="px-3 py-2 rounded-t-md bg-indigo-500 text-white">
                            <span>Captcha :</span>
                            <span id="captcha"></span>
                    </div>
                    <div>
                        <label for="captcha_verif" class="sr-only">Captcha_verif</label>
                        <input
                                id="captcha_verif"
                                name="captcha_verif"
                                type="text"
                                class="field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Entrez le code captcha."
                        />
                    </div>
                </div>
                <div>
                    <button
                            type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="h-5 w-5 text-indigo-400 group-hover:text-amber-500" 
                                fill="none" 
                                viewBox="0 0 24 24"
                                stroke="currentColor" 
                                stroke-width="2">
                                <path 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </span>

                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>

<<<<<<< HEAD
<script>

$(document).ready(function() {

    captcha();
    $('#password').on('keyup', checkPassword);
    
});

var checkPassword = function() {

    let password = $('#password').val();
    console.log("password = " + password);

    let password2 = $('#password2').val();
    console.log("password2 = " + password2);

    console.log('pwd');
    $.ajax({

        url: 'connect.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'password',
        },
        success: function(response) {
            console.log('success');
            $("#captcha").html(response['get_captcha']);

        },
        error: function() {
            console.log('pwd err');
        }
    });

}
        
var signIn = function(){

    let prenom = $('#prenom').val();
    console.log("prenom = " + prenom);

    let nom = $('#nom').val();
    console.log("nom = " + nom);

    let login = $('#login').val();
    console.log("login = " + login);

    let passwd = $('#password').val();
    console.log("passwd = " + passwd);

    let passwd2 = $('#password2').val();
    console.log("passwd2 = " + passwd2);

    // let captcha = $('captcha').html();
    // console.log("captcha = " + captcha);

    console.log(1);
    $.ajax({

        url: 'connect.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'signIn',
            prenom: 'prenom',
            nom: 'nom',
            login: 'login',
            passwd: 'password',
            passwd2: 'password2',
            checkCap: 'captcha_verif'
        },

        success: function(response) {

            if (response['status'] == 0){
                console.log('error');

                Swal.fire({
                    title: 'Erreur',
                    text: response['msg'],
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton:false,
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Retry!'
                });
            }
            
            else{
                
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response['msg'],
                    showConfirmButton: false,
                    timer: 1500
                });
                console.log('Success');

                // setTimeout(() => {
                // window.location.replace("home.php");
                // }, 2300);

            }

        },

        error: function() {
        
        }

    });

}

function captcha(){
    
    console.log(2);
    $.ajax({

        url: 'connect.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'captcha',
        },
        success: function(response) {
            console.log('success');
            $("#captcha").html(response['get_captcha']);

        },
        error: function() {
            console.log(3);
        }
    });
}

</script>

<?php require_once 'function.php';     

$get_captcha = captcha();

echo json_encode(array("get_captcha" => $get_captcha));?>

=======
>>>>>>> bfc3565c45f2f05a40dede75ae6acc6a0a6fe65e
</body>
</html>