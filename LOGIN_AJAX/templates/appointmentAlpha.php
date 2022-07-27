<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
          integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="../assets/css/style.css">
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
            integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/9414e04596.js" crossorigin="anonymous"></script>
    <title>Livraison</title>
</head>
<header>
    <navbar-component></navbar-component>
</header>

<body class="bg-indigo-100">

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <form class=" flex gap-20 justify-content-center w-50 py-3 mt-4 mx-auto rounded shadow border border-gray-300 bg-indigo-100 bg-gradient"
                  action="javascript:createNews();" method="POST">
                <div class="flex-column justify-center align-items-center">
                    <div>
                        <h1 class="text-dark mb-3 text-center font-weight-bold hover:text-green-500 border-r-50">Créer
                            Newsletter
                        </h1>
                    </div>
                    <div>
                        <label for="titleNews" class="sr-only">Titre Newsletter</label>
                        <input id="titleNews"
                               name="titleNews"
                               class="appearance-none rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               type="text"
                               required
                               placeholder="Titre Newsletter"
                        />
                    </div>
                    <div>
                        <label for="newsContent" class="sr-only">Newsletter</label>
                        <textarea
                                id="newsContent"
                                name="newsContent"
                                class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                required
                                placeholder="Contenu newsletter"
                        ></textarea>
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
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-6 max-w-4xl px-6 py-4 mx-auto">
            <h1 class="mb-4 text-4xl font-semibold text-center text-gray-800 white:text-dark">Rdv programmés</h1>
<!--            <button class="btn btn-secondary" onclick="rdvCases(1);">Actualiser</button>
-->            <div class="rounded-lg mt-2" id="rdvCases">

                <!--Contenu des rdv ici, généré avec class HTML -->

            </div>
            <nav class="mt-3" aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pages">

                </ul>
            </nav>
        </div>
        <div class="col-12 col-md-6 max-w-4xl px-6 py-4 mx-auto">
            <h1 class="mb-4 text-4xl font-semibold text-center text-gray-800 white:text-dark">Créneaux disponibles</h1>
<!--            <button class="btn btn-secondary" onclick="dayCases();">Actualiser</button>
-->            <div id="rdvContainer" class="mt-2 w-full justify-content-center">

                <!--Contenu des créneaux ici, généré avec class HTML -->

            </div>
        </div>
    </div>
</div>

<!-- Modal rdv -->
<div class="modal fade" id="modalRdv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">N° de rdv : </h5>
                <span id="modal-rdvID" class="pl-4">ID</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">ID Expert : </span>
                    <span id="modal-expertID" class="pl-4">Expert ID</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">ID user : </span>
                    <span id="modal-userID" class="pl-4">User ID</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Login user : </span>
                    <span id="modal-userLogin" class="pl-4">User Login</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Créneau réservé : </span>
                    <span id="modal-timeslotID" class="pl-4">Créneau</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700 white:text-dark">Date création résa : </span>
                    <span id="modal-bookedDate" class="pl-4">date</span>
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

<!-- Modal créneaux dispos -->
<div class="modal fade" id="modalSlot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Créneau horaire : </h5>
                <span id="modal-dateSelect" class="px-2">Date sélectionnée</span>
                <span>à</span>
                <span id="modal-slotTime" class="px-2"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="">
                <form class="flex gap-20 justify-content-center py-4 mx-auto rounded shadow border border-gray-300 bg-indigo-100 bg-gradient"
                      action="javascript:newAppointment();" method="POST">
                    <div class="flex justify-center align-items-center">
                        <div>
                            <h1 class="text-dark mb-10 text-center font-weight-bold hover:text-green-500 border-r-50">
                                Nouveau rendez-vous</h1>
                            <label for="expertID" class="sr-only">Expert ID</label>
                            <input id="expertID"
                                   name="expertID"
                                   class="appearance-none mb-3 rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   type="text"
                                   required
                                   placeholder="Expert ID"
                            />
                            <!--                         <label for="timeslotID" class="sr-only">Time Slot ID</label>
                                                     <input id="timeslotID"
                                                            name="timeslotID"
                                                            class="appearance-none rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                                            type="text"
                                                            required
                                                            placeholder="Time Slot ID"
                                                     />-->
                        </div>
                    </div>
                    <div class="flex flex-column justify-content-center">

                        <div class="flex justify-content-center">
                            <label for="type-select" class="sr-only">Type</label>
                            <select class="appearance-none mb-3 rounded px-3 border border-gray-300 justify-content-center"
                                    name="type" id="type-select">

                                <option value="">-- Type --</option>
                                <option value="sur-place">Auto</option>
                                <option value="a-emporter">Moto</option>
                            </select>

                        </div>

                        <div class="flex justify-content-center">
                            <fieldset id="indexCheck">

                                <div>
                                    <input type="checkbox" class="checkbox" name="checkbox" value="newsletters">
                                    <label for="newsletters" class="pr-3 cb">Newsletters</label>
                                </div>

                            </fieldset>
                        </div>
                        <div class="flex justify-center mt-3 mx-auto">
                            <button
                                    type="submit"
                                    class="group relative flex justify-center align-items-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                <span>
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-send"
                                        viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                   </svg>
                                </span>
                                <span class="ml-4">Créer</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../public/js/appointmentAlpha.js"></script>
    <script src="../public/js/header.js"></script>

</body>
</html>