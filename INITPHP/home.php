<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>

    <nav class="bg-indigo-600 px-12 py-3 flex text-lg">
        <div class="flex flex-grow gap-5">
                <a href="#" class="text-white hover:text-green-500">Home</a>
                <a href="#" class="text-white hover:text-green-500">Logout</a>
                <a href="#" class="text-white hover:text-green-500">Login</a>
                <a href="#" class="text-white hover:text-green-500">Sign up</a>
        </div>
        <div
                class="text-white transition ease-in delay-75 hover:uppercase hover:font-bold hover:text-orange-500 duration-200"
        >
            <a href="#"><span><?php echo $_SESSION['login'] ?></span></a>
        </div>
    </nav>


    Bienvenue <b>

    <?php 

        if (isset($_COOKIE['user_login']) && password_verify($pwd, $hash)){

            $user_login = explode("|", $_COOKIE['user_login']);
            echo $user_login[0];

        }

    ?>

    </b> !
    <br>
    <br>
    <a href="?action=logout"><button>Logout</button></a>

</body>
</html>