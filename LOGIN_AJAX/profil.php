<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
    </script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>   
    <script src="js/header.js"></script>
    <title>Home</title>
</head>
<body>

    <navbar-component></navbar-component>

    <div class="bg-white shadow overflow-hidden rounded-lg my-12 lg:mx-60  ">
        <div class="py-5 px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Profil</h3>
            <p class="mt-1 max-w-2xl text-gray-500">Informations personnelles.</p>
        </div>
        <div class="border-t border-gray-200">
            <div class="flex items-center gap-4 bg-gray-50 px-4 py-5">
                <div>
                    <dt class="font-medium text-gray-500">Nom</dt>
                    <dd id="user_nom" class="mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-gray-50 px-4 py-5">
                <div>
                    <dt class="font-medium text-gray-500">Prénom</dt>
                    <dd id="user_prenom" class="mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 py-5">
                <div>
                    <dt class="font-medium text-gray-500">Login / Email</dt>
                    <dd class="user_login mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
            </div>
            <div class="flex items-center gap-4 bg-white px-4 py-5">
                <div>
                    <dt class=" font-medium text-gray-500">Mot de passe</dt>
                    <dd id="pwd" class="mt-1 mb-3 text-gray-900 mt-0 col-span-2"></dd>
                </div>
            </div>

            <div class="flex items-center gap-4 bg-gray-50 px-4 py-5">
                <div>
                    <dt class=" font-medium text-gray-500">à propos de <span class="user_login"></span></dt>
                    <dd class="mt-1  text-gray-900 mt-0 col-span-2"></dd>
                </div>
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

<script>

$(function() {

    load();
    $("#logout").on('click', logout);

});

let logout = function(){

    console.log(1);
    $.ajax({

        url: 'controller.php',
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

        url: 'controller.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'user_login',
        },
        success: function(response) {
            // console.log(2);
            $(".user_login").html(response['login']);
            $("#pwd").html(response['password']);
            $("#user_nom").html(response['nom']);
            $("#user_prenom").html(response['prenom']);

        },
        error: function() {
            
        }
    });
}

</script>

</body>
</html>