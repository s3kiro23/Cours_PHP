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
    <title>Home</title>
</head>
<body>

    <nav class="bg-indigo-600 px-12 py-3 flex text-lg">
        <div class="flex flex-grow gap-5">
                <a href="#" class="text-white hover:text-green-500">Home</a>
                <button id='logout' class="text-white hover:text-green-500">Logout</button>
        </div>
        <div
            class="text-white transition ease-in delay-75 hover:uppercase hover:font-bold hover:text-orange-500 duration-200"
        >
            <span id='user_login'></span>
        </div>
    </nav>

<script>

$(document).ready(function() {

    load();
    $("#logout").on('click', logout);

});

var logout = function(){

    console.log(1);
    $.ajax({

        url: 'connect.php',
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

        url: 'connect.php',
        dataType: 'JSON',
        type: 'POST',
        data: {
            request: 'user_login',
        },
        success: function(response) {
            // console.log(2);
            $("#user_login").html(response['html']);

        },
        error: function() {
            
        }
    });
}

</script>

</body>
</html>