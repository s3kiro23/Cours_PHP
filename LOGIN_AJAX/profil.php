<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
          integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/style.css">
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
            integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

<script src="js/profile.js"></script>

</body>
</html>