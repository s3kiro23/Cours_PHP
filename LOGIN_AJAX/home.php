<!-- <?php session_start(); ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>   
    <title>Home</title>
</head>
<body>

    <nav class="bg-indigo-600 px-12 py-3 flex text-lg">
        <div class="flex flex-grow gap-5">
                <a href="#" class="text-white hover:text-green-500">Home</a>
                <a id='logout' href="?action=logout" class="text-white hover:text-green-500">Logout</a>
        </div>
        <div
            class="text-white transition ease-in delay-75 hover:uppercase hover:font-bold hover:text-orange-500 duration-200"
        >
            <span id='user_login'></span>
        </div>
    </nav>

    <div id='console'></div>

<script>

$(document).ready(function() {

	$("#user_login").html(get_login());
    $("#logout").on('click', logout);

});

var get_login = function(){

    $.ajax({

        url: 'connect.php',
        dataType: 'JSON',
        type: 'GET',
        data: {
            login: 'get_login',
        },
        success: function(response) {

        },
        error: function() {
            
        }
    });
}

var logout = function(){

    $.ajax({

        url: 'connect.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'logout',
        },
        success: function(response) {

            iziToast.error({

                timeout: 3000,
                progressBar: true,
                message: response['msg'],
                position: 'topRight',

            });

            window.location.href = "index.php";

        },
        error: function() {
            
        }
    });
}



</script>
</body>
</html>