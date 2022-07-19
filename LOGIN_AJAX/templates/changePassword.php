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
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Récupération du compte</title>
</head>

<body class="bg-[url('img/logIn_pic.jpg')] bg-cover bg-no-repeat z-1">

<div class="min-h-full flex mt-14 justify-center py-5 px-4 sm:px-6 lg:px-8">
    <div id="contentLogIn" class="space-y-8 bg-white rounded px-4 py-5 bg-opacity-50">
        <div>
            <img
                    class='mx-auto h-12 w-auto'
                    src='https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg'
                    alt='Workflow'
            />
            <h2 class='mt-6 text-center text-3xl font-extrabold text-gray-900'>
                Mise à jour <br> de votre mot de passe
            </h2>
        </div>
        <form action='javascript:changePassword();' class='mt-8 space-y-6' method='POST'>
            <div class='rounded-md shadow-sm -space-y-px'>
                <div>
                    <label for='password' class='sr-only'>Password</label>
                    <input
                            id='password'
                            name='password'
                            type='password'
                            autocomplete='current-password'
                            required
                            class='appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                            placeholder='Nouveau mot de passe'
                    />
                </div>
                <div>
                    <label for='password2' class='sr-only'>Mot de passe2</label>
                    <input
                            id='password2'
                            name='password2'
                            type='password'
                            autocomplete='current-password'
                            class='appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                            placeholder='Confirmation mot de passe'
                    />
                </div>
            </div>
            <div>
                <button
                        type='submit'
                        class='group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                >
                          <span class='absolute left-0 inset-y-0 flex items-center pl-3'>
                            <svg
                                    class='h-5 w-5 text-indigo-400 group-hover:text-amber-500'
                                    xmlns='http://www.w3.org/2000/svg'
                                    viewBox='0 0 20 20'
                                    fill='currentColor'
                                    aria-hidden='true'
                            >
                            <path
                                    fill-rule='evenodd'
                                    d='M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z'
                                    clip-rule='evenodd'
                            />
                            </svg>
                          </span>
                    Modifier
                </button>
            </div>
        </form>
    </div>
</div>

<script src="../public/js/changePassword.js"></script>

</body>
</html>

