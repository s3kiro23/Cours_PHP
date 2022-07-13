<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>   
    <script src="js/header.js"></script>
    <title>Home</title>
</head>
<header>
    <navbar-component></navbar-component>
</header>

<body>

    <div class="bg-indigo-100 shadow overflow-hidden rounded-lg my-12 lg:mx-60  ">
        <div class="py-5 px-6 justify-between">
            <h3 class="text-2xl leading-6 font-medium text-gray-900">Profil</h3>
            <p class="test mt-1 max-w-2xl text-gray-500">Informations personnelles.</p>
            <button id="delete" class="mt-5 text-red-600">Delete account</button>
        </div>
        <div class="border-t border-gray-200">
            <div class="flex items-center gap-4 bg-gray-50 px-6 py-5 justify-between">
                <div>
                    <dt id="fieldName" class="font-medium text-gray-500">Nom</dt>
                    <dd id="user_nom" class="mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
                <button class="data_modify text-indigo-600 font-bold" data-id="Nom">Modifier</button>
            </div>
            <div class="flex items-center gap-4 bg-white px-6 py-5 justify-between">
                <div>
                    <dt id="fieldLastname" class="font-medium text-gray-500">Prénom</dt>
                    <dd id="user_prenom" class="mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
                <button class="data_modify text-indigo-600 font-bold" data-id="Prenom">Modifier</button>
            </div>
            <div class="flex items-center gap-4 bg-gray-50 px-6 py-5 justify-between">
                <div>
                    <dt id="fieldLogin" class="font-medium text-gray-500">Login / Email</dt>
                    <dd class="user_login mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
                <button class="data_modify text-indigo-600 font-bold" data-id="Login">Modifier</button>
            </div>
            <div class="flex items-center gap-4 bg-white px-6 py-5 justify-between">
                <div>
                    <dt id="fieldPwd" class="font-medium text-gray-500">Mot de passe</dt>
                    <dd id="pwd" class="mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
                <button class="data_modify text-indigo-600 font-bold" data-id="Password">Modifier</button>
            </div>

            <div class="flex items-center gap-4 bg-gray-50 px-6 py-5 justify-between">
                <div>
                    <dt id="fieldAbout" class=" font-medium text-gray-500">à propos de <span class="user_login"></span></dt>
                    <dd class="mt-1 text-gray-900 mt-0 col-span-2"></dd>
                </div>
                <button class="data_modify text-indigo-600 font-bold" data-id="About">Modifier</button>
            </div>
        </div>
    </div>

<!--    --><?php
/*
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'user_aflokkat';
    $login = 'a@a.a';
    $pass = 'az';

    try {

        $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dbco->beginTransaction();

        $query = $dbco->prepare('SELECT id, login, password FROM user WHERE login=?');
        $query->execute([$login]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $passH = $user['password'];

        echo ($passH);

        if (password_verify($pass, $passH)){

            echo 'yes';
        }
        else {
            echo 'no';
        }

        print_r($user);


    } catch (PDOException $e) {
        $status = 0;
        $msg = "Erreur : ".$e->getMessage();
    }
    */?>

<!--    --><?php /*echo $_SESSION['login']; */?>

<script>

$(function() {

    load();
    $("#logout").on('click', logout);
    $("#to_home").on('click', toHome);
    $(".data_modify").on('click', modify);
    $("#delete").on('click', deleteAccount);

});

let deleteAccount = function (){

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

                    url: 'Controller/controller.php',
                    dataType: 'JSON',
                    type: 'POST',
                    data: {
                        request: 'deleteAccount',
                    },
                    success: function(response) {
                        console.log(1);
                    },
                    error: function() {
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

let modify = function (){
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

                url: 'Controller/controller.php',
                dataType: 'JSON',
                type: 'POST',
                data: {
                    request: 'modify',
                    value: input,
                    type_value: type
                },
                success: function(response) {

                },
                error: function() {
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
                window.location.replace('profil.php')
            }, 1300);
        }
    });

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

function load(){

    // console.log(1);
    $.ajax({

        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'user_login',
        },
        success: function(response) {

            if(response == 1){
                window.location.href = "index.php";
            }else{
                $(".user_login").html(response['login']);
                $("#pwd").html(response['password']);
                $("#user_nom").html(response['nom']);
                $("#user_prenom").html(response['prenom']);
            }
            // console.log(2);

        },
        error: function() {
            
        }
    });
}

let toHome = function() {
    console.log("tohome");
    $.ajax({
        url: 'Controller/controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'to_home',
        },
        success: function (response) {
            console.log('to_home');
            window.location.replace('home.php')

        },

        error: function () {
            console.log('errhome')
        }
    });
}

</script>

</body>
</html>