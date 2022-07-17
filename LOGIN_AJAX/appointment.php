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

<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <h1 class="text-4xl font-semibold text-center text-gray-800 white:text-dark">Rdv programmés</h1>
        </div>
        <div class="col-12 col-md-6">
            <h1 class="text-4xl font-semibold text-center text-gray-800 white:text-dark">Créneaux disponibles</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-6 max-w-4xl px-6 py-4 mx-auto">
            <div id="show_paginator" class="flex justify-content-center mb-3"></div>
            <div class="rounded-lg" id="rdvCases">

                <!--Contenu des rdv ici, généré avec class HTML -->

            </div>
            <nav class="mt-3" aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pages">

                </ul>
            </nav>

        </div>
        <div id="rdvContainer" class="col-6 mt-10">
            <div id="panel" class="bg-indigo-100">

                <!--Contenu des créneaux ici, généré avec class HTML -->

            </div>
        </div>
    </div>
</div>

<?php


setlocale(LC_TIME, "fr_FR", "French");
$currentDate = date('Y-m-d H:i'); // Date du jour
$weekday = 0;
$weekday1 = 1;
/*$updateDate = date("H:i", strtotime($currentDate.'+'.$weekday1.' day')); // Date du jour +1*/
/*$updateDate = mktime(8, 0, 0, date("m"), date("d") + $weekday1, date("Y")); // Date du jour +1*/
$limit = 31;
$interval = 0;
$slotTime = "";
$updateDate = "";

while ($limit != 0) {

    if ($slotTime == 1657965600) {
        $slotTime .= 'nope';
    } else {

        $slotTime .= date("H:i", mktime(8, $interval, 0)) . "<br>";
        $slotTime .= strtotime(date("H:i", mktime(8, $interval, 0))) . "<br>";

        $updateDate .= date("H:i", mktime(8, $interval, 0, date("m"), date("d") + 1, date("Y"))) . "<br>";
        $updateDate .= mktime(8, $interval, 0, date("m"), date("d") + 1, date("Y")) . "<br>";

    }
    $limit--;
    $interval += 20;

}
echo "Date courante = " . strftime("%A %d %B %G", strtotime($currentDate . '+' . $weekday . ' day')) . "<br><br>";
echo $slotTime . "<br><br>";

echo "Date courante +1 = " . strftime("%A %d %B %G", strtotime($currentDate . '+' . $weekday1 . ' day')) . "<br><br>";
echo $updateDate;

?>

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
                <h5 class="modal-title" id="exampleModalLongTitle">Créneau horaire sélectionné : </h5>
                <span id="modal-slotID" class="pl-4">Slot ID</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <label for="timeslotID" class="sr-only">Time Slot ID</label>
                            <input id="timeslotID"
                                   name="timeslotID"
                                   class="appearance-none rounded relative block px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                   type="text"
                                   required
                                   placeholder="Time Slot ID"
                            />
                        </div>
                    </div>
                    <div class="flex flex-column justify-content-center">

                        <div class="flex justify-content-center"><label for="type-select" class="sr-only">Type
                                Livraison</label>

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

    <script src="js/appointment.js"></script>
    <script src="js/header.js"></script>

</body>
</html>