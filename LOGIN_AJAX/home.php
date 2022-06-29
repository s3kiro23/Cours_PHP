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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>   
    <script src="js/header.js"></script>
    <title>Home</title>
</head>
<body>
    
    <navbar-component></navbar-component>

    <h1
            class="text-dark text-5xl text-center m-3 p-3 hover:text-green-500 border-r-50"
    >
    </h1>
    <form class="container max-w-4xl px-6 py-10 mx-auto" method="POST">
        <div class="flex justify-center mx-auto">
            <div class="mb-3">
                <label for="titre" class="sr-only">Titre</label>
                <input id="titre"
                       name="titre"
                       class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       type="text"
                       required
                       placeholder="Titre note"
                />
                <label for="description" class="sr-only">Note</label>
                <textarea
                        id="description"
                        name="description"
                        required
                        class="appearance-none rounded px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Corps de votre note ici !">
                </textarea>
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
            <h1 class="text-4xl font-semibold text-center text-gray-800 white:text-dark">Dernières notes créées</h1>
    
            <form class="mt-12 space-y-8">
                <div class="border-2 border-gray-300 rounded-lg">
                    <div class="flex justify-between items-center w-full p-8">
                        <h1 class="font-semibold text-gray-700 white:text-dark"></h1>
                        <div>
                            <span class="text-gray-400">
                                <a class="col-span-3 px-4 py-5 font-medium text-indigo-600 hover:text-indigo-500"
                                   href="/notes/{{ note.id }}">Modify
                                </a>
                            </span>
                            <a class="px-4 py-5 px-6 font-medium text-red-600 hover:text-red-500"
                            href="/delete-note/{{ note.id }}">
                                Delete
                            </a>
                        </div>
                    </div>
    
                    <hr class="border-gray-300">
    
                    <p class="p-8 text-sm text-gray-500 dark:text-gray-300">
    
                    </p>
                </div>
            </form>
        </div>
    </section>
    
</body>    
</html>
