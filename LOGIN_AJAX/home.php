<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
          integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootpag/1.0.7/jquery.bootpag.min.js"
            integrity="sha512-9PnpJ6p3yWEYYgxG+BrwRkKxaVaziAYmugw4aDWI3Olbp5IJWhHDKXNZTI4DRqEF3LxtXZr/L9jZT1b7D6HTHQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
            integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Accueil - Gestion commandes</title>
</head>

<header>
    <navbar-component></navbar-component>
</header>

<body>

<form class=" flex gap-20 justify-content-center w-50 py-3 mt-4 mx-auto rounded shadow border border-gray-300 bg-indigo-100 bg-gradient"
      action="javascript:newCommand();" method="POST">
    <div class="flex justify-center align-items-center">
        <div>
            <h1 class="text-dark mb-10 text-center font-weight-bold hover:text-green-500 border-r-50">Nouvelle
                commande</h1>
            <label for="titre" class="sr-only">Commande</label>
            <input id="titre"
                   name="titre"
                   class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   type="text"
                   required
                   placeholder="Titre nouvelle commande"
            />
            <label for="label" class="sr-only">Label commande</label>
            <input id="label"
                   name="label"
                   class="appearance-none rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   type="text"
                   required
                   placeholder="Label commande"
            />
        </div>
    </div>
    <div class="flex flex-column justify-content-center">

        <div class="flex justify-content-center"><label for="type-select" class="sr-only">Type Livraison</label>

            <select class="appearance-none mb-3 rounded px-3 border border-gray-300 justify-content-center"
                    name="type" id="type-select">

                <option value="">-- Type --</option>
                <option value="sur-place">Sur place</option>
                <option value="a-emporter">A emporter</option>
                <option value="livraison">Livraison</option>

            </select></div>

        <div class="flex justify-content-center">
            <fieldset id="indexCheck">

                <div>
                    <input type="checkbox" class="checkbox" name="checkbox" value="CB">
                    <label for="cb" class="pr-3 cb">CB</label>
                </div>

                <div>
                    <input type="checkbox" class="checkbox" name="checkbox" value="ESPECES">
                    <label for="especes" class="pr-3">Espèces</label>
                </div>

                <div>
                    <input type="checkbox" class="checkbox" name="checkbox" value="CHEQUES">
                    <label for="cheques">Chèques</label>
                </div>

            </fieldset>
        </div>
        <div class="flex justify-center mt-3 mx-auto">
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
    </div>
</form>

<!--<form class=" flex gap-20 justify-content-center w-50 py-3 mt-4 mx-auto rounded shadow border border-gray-300 bg-indigo-100 bg-gradient"
      action="javascript:newCommand();" method="POST">
    <div class="flex justify-center align-items-center">
        <div>
            <h1 class="text-dark mb-10 text-center font-weight-bold hover:text-green-500 border-r-50">Nouvelle
                livraison</h1>
            <label for="client" class="sr-only">Client</label>
            <input id="client"
                   name="client"
                   class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   type="text"
                   required
                   placeholder="Client"
            />
            <label for="notes" class="sr-only">Notes</label>
            <input id="notes"
                   name="notes"
                   class="appearance-none rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   type="text"
                   required
                   placeholder="Notes"
            />
        </div>
    </div>
    <div class="flex flex-column justify-content-center">

                <div class="flex justify-content-center"><label for="type-select" class="sr-only">Type Livraison</label>

                    <select class="appearance-none mb-3 rounded px-3 border border-gray-300 justify-content-center"
                            name="type" id="type-select">

                        <option value="">-- Type --</option>
                        <option value="sur-place">Sur place</option>
                        <option value="a-emporter">A emporter</option>
                        <option value="livraison">Livraison</option>

                    </select>

                </div>

        <div class="flex justify-content-center">
            <fieldset id="indexCheck">

                <div>
                    <input type="checkbox" class="checkbox" name="checkbox" value="paye">
                    <label for="paye" class="pr-3 cb">Payé</label>
                </div>

                <div>
                    <input type="checkbox" class="checkbox" name="checkbox" value="non-paye">
                    <label for="non-paye" class="pr-3">Non Payé</label>
                </div>

            </fieldset>
        </div>
        <div class="flex justify-center mt-3 mx-auto">
            <button
                    type="submit"
                    class="group relative flex justify-center align-items-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                <span>
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send"
                        viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                   </svg>
                </span>
                <span class="ml-4 mt-0.5">Envoyer!</span>
            </button>
        </div>
    </div>
</form>
-->

<!--Module envoie en livraison-->

<div class="accordion" id="accordionExample">
    <div class="accordion-item bg-white border border-gray-200">
        <h2 class="accordion-header mb-0" id="headingOne">
            <button class="
        accordion-button
        relative
        flex
        items-center
        w-full
        py-4
        px-5
        text-base text-gray-800 text-left
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                Accordion Item #1
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
             data-bs-parent="#accordionExample">
            <div class="accordion-body py-4 px-5">
                <strong>This is the first item's accordion body.</strong> It is shown by default,
                until the collapse plugin adds the appropriate classes that we use to style each
                element. These classes control the overall appearance, as well as the showing and
                hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                our default variables. It's also worth noting that just about any HTML can go within
                the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
    </div>
    <div class="accordion-item bg-white border border-gray-200">
        <h2 class="accordion-header mb-0" id="headingTwo">
            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-4
        px-5
        text-base text-gray-800 text-left
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                    aria-controls="collapseTwo">
                Accordion Item #2
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
             data-bs-parent="#accordionExample">
            <div class="accordion-body py-4 px-5">
                <strong>This is the second item's accordion body.</strong> It is hidden by default,
                until the collapse plugin adds the appropriate classes that we use to style each
                element. These classes control the overall appearance, as well as the showing and
                hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                our default variables. It's also worth noting that just about any HTML can go within
                the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
    </div>
    <div class="accordion-item bg-white border border-gray-200">
        <h2 class="accordion-header mb-0" id="headingThree">
            <button class="
        accordion-button
        collapsed
        relative
        flex
        items-center
        w-full
        py-4
        px-5
        text-base text-gray-800 text-left
        bg-white
        border-0
        rounded-none
        transition
        focus:outline-none
      " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                    aria-controls="collapseThree">
                Accordion Item #3
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
             data-bs-parent="#accordionExample">
            <div class="accordion-body py-4 px-5">
                <strong>This is the third item's accordion body.</strong> It is hidden by default,
                until the collapse plugin adds the appropriate classes that we use to style each
                element. These classes control the overall appearance, as well as the showing and
                hiding via CSS transitions. You can modify any of this with custom CSS or overriding
                our default variables. It's also worth noting that just about any HTML can go within
                the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
    </div>
</div>

<hr class="border-gray-300 w-40 mx-auto my-5">

<section class="bg-white">
    <div class="container max-w-4xl px-6 pb-4 mx-auto">
        <h1 class="mb-4 text-4xl font-semibold text-center text-gray-800 white:text-dark">Commandes en cours</h1>
        <div id="show_paginator" class="flex justify-content-center mb-3"></div>
        <div class="rounded-lg" id="listCommands">

            <!--Contenu des commandes ici, généré avec class HTML -->

        </div>
    </div>
</section>

<!--Nombre pages-->
<nav class="mb-5" aria-label="Page navigation">
    <ul class="pagination justify-content-center" id="pages">
        <!--<li class="page-item" id="Previous">
            <a class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Précédent</span>
            </a>
        </li>-->
        <!--        <li class="flex" id="pages">
        -->
        <!--Pagination ici, générée avec Class HTML-->

        <!--        </li>
        --><!--        <li class="page-item">
            <a class="page-link" id="Next" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Suivant</span>
            </a>
        </li>-->
    </ul>
</nav>


<!-- Modal -->
<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">N° de commande : </h5>
                <span id="modal-cmdID" class="pl-4">ID</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Titre : </span>
                    <span id="modal-cmdTitle" class="pl-4">titre</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Label : </span>
                    <span id="modal-cmdLabel" class="pl-4">label</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Type : </span>
                    <span id="modal-cmdType" class="pl-4">type</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Paiement : </span>
                    <span id="modal-cmdPayment" class="pl-4">paiement</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Date : </span>
                    <span id="modal-cmdDate" class="pl-4">date</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Client : </span>
                    <span id="modal-cmdClient" class="pl-4">client</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script src="js/header.js"></script>
<script src="js/home.js"></script>
<script src="node_modules/tw-elements/dist/js/index.min.js"></script>

</body>
</html>
