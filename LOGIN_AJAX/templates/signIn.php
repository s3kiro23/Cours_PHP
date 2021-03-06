<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
          integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
            integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inscription</title>
</head>

<body class="bg-[url('../assets/img/signIn_pic.jpg')] bg-cover bg-no-repeat align-items-center">

<div class="min-h-full flex items-center justify-center pt-12 pb-4 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white bg-opacity-50 py-4 px-4 rounded">
        <div>
            <img
                    class="mx-auto h-12 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow"
            />
            <h2 class="mt-6 text-center text-3xl font-extrabold">
                Créer votre compte
            </h2>
        </div>

        <form class="mt-8 space-y-6" action="javascript:signIn();" method="POST">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="prenom" class="sr-only">Prénom</label>

                    <input
                            id="prenom"
                            name="prenom"
                            type="text"
                            class="field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Prénom"
                    />
                </div>

                <div>
                    <label for="nom" class="sr-only">Nom</label>

                    <input
                            id="nom"
                            name="nom"
                            type="text"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Nom"
                    />
                </div>

                <div>
                    <label for="login" class="sr-only">Login</label>

                    <input
                            id="login"
                            name="login"
                            type="email"
                            class="field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Login (Adresse Email)"
                    />
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>

                    <input
                            id="password"
                            name="password"
                            type="password"
                            class="field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Mot de passe"
                    />
                </div>

                <div>
                    <label for="password2" class="sr-only">Password2</label>

                    <input
                            id="password2"
                            name="password2"
                            type="password"
                            class="field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Confirmez mot de passe"
                    />
                </div>
                <div>
                    <label for="type" class="sr-only">Type</label>

                    <select name="type" id="type-select"
                            class="field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    >
                        <option value="">-- Choisissez le type de commande --</option>
                        <option value="sur-place">Sur place</option>
                        <option value="emporter">A emporter</option>
                        <option value="emporter">Livraison</option>
                    </select>
                </div>
                <div class="rounded-md py-3">
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
                            id='signIn'
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
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                />
                            </svg>
                        </span>
                        S'incrire !
                    </button>
                </div>
        </form>
    </div>
    <span class="flex justify-center text-white mt-5">ou</span>
    <a id="to_logIn" class="cursor-pointer flex justify-center text-indigo-600 hover:text-white font-medium">retour
        à la page connexion.
    </a>
</div>

<script src="../public/js/signIn.js"></script>

</body>
</html>
