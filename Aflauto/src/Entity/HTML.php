<?php

class HTML
{

    public static function dayCases($date, $timeStampDate)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $nextDate = $timeStampDate + 86400;
        $previousDate = $timeStampDate - 86400;

        $dayCase = "<div id='flip' class='d-flex justify-content-center py-3 mt-2 text-white bg-success rounded-top'>";

        if ($timeStampDate != $currentDate) {
            $dayCase .= "<a type='button' class='text-decoration-none' onClick='changeDate($previousDate);' >&laquo;</a>";
        }
        $dayCase .= "
                <span id='$timeStampDate' class='currentDate mx-5'>$date</span>              
                <a type='button' class='text-decoration-none' onClick='changeDate($nextDate);' >&raquo;</a>
            </div>
            <div id='panel' class='$timeStampDate bg-dark p-3 text-center rounded-bottom border border-secondary'>
            
                <!--Génération des créneaux disponible ici-->
          
            </div>";

        return $dayCase;

    }

    public static function timeSlot($timeStampID, $slotInterval)
    {
        /*<button id='$timeStampID' class='p-2 my-2 slot rounded bg-indigo-100 border-1'>$slotInterval</button>*/
        return "
            <input type='radio' class='btn-check' name='timeSlot' id='$timeStampID' autocomplete='off'>
            <label class='btn btn-outline-success border-success my-2 text-center' for='$timeStampID'>$slotInterval</label>                
		";
    }

    public static function newPwd()
    {

        return "
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
            <form action='javascript:newPwd();' class='mt-8 space-y-6' method='POST'>
                <div class='rounded-md shadow-sm -space-y-px'>
                    <div>
                        <label for='user' class='sr-only'>user</label>
                        <input
                            id='user'
                            name='user'
                            type='email'
                            autocomplete='current-email'
                            required
                            class='appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                            placeholder='Login utilisateur (email)'
                        />                      
                    </div>                       
                    <div>
                        <label for='password' class='sr-only'>Mot de passe</label>
                        <input
                            id='password'
                            name='password'
                            type='password'
                            autocomplete='current-password'
                            class='appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                            placeholder='Nouveau mot de passe'
                        />
                    </div>
                </div>
                <div>
                    <button
                        type='submit'
                        class='group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                        id='newPwd'
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
            ";
    }

    public static function secondAuth()
    {

        return "
            <div>
                <img
                    class='mx-auto h-12 w-auto'
                    src=''
                    alt='Workflow'
                />
                <h2 class='mt-6 mb-4 text-center font-extrabold text-success'>
                    Renseignez le code SMS
                </h2>
            </div>
        <form action='javascript:smsVerif();' class='d-flex flex-column justify-content-center mt-8 space-y-6' method='POST'>
            <div class='rounded p-2 mb-4'>
                <div class='px-3 py-2 rounded-top bg-success text-white'>
                        <span>Code :</span>
                        <span id='sms'></span>
                </div>
                <div>
                    <label for='sms_verif' class='sr-only'>sms_verif</label>
                    <input
                            id='sms_verif'
                            name='sms_verif'
                            type='text'
                            class='field appearance-none rounded-bottom relative d-block w-100 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                            placeholder='Entrez le code sms reçu.'
                    />
                </div>
            </div>
            <div class='d-flex justify-content-center'>
                <button
                    type='submit'
                    class='group d-flex justify-content-center rounded relative py-2 px-4 border border-success text-sm text-white bg-success'
                    id='sub_sms'
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
                            Valider
                </button>
            </div>
        </form>
        ";
    }

    public static function toRequestMail()
    {

        return "
            <div>
                <img
                    class='mx-auto h-12 w-auto'
                    src='https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg'
                    alt='Workflow'
                        />
                <h2 class='mt-6 text-center text-3xl font-extrabold text-gray-900'>
                    Récupération du compte
                </h2>
            </div>
            <form action='javascript:genToken();' class='mt-8 space-y-6' method='POST'>
                <div class='rounded-md shadow-sm -space-y-px'>
                    <div>
                      <label for='email' class='sr-only'>email</label>
                      <input
                        id='email'
                        name='email'
                        type='email'
                        autocomplete='current-email'
                        required
                        class='appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                        placeholder='Adresse email'
                            />                      
                    </div>                       
                </div>
                <div>
                    <button
                        type='submit'
                        class='group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                        id='toRequestMail'
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
                        Envoyer
                    </button>
                </div>
            </form>
            ";
    }

    public static function genToken()
    {

        return "
            <div>
                <img
                    class='mx-auto h-12 w-auto'
                    src='https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg'
                    alt='Workflow'
                />
                <h2 class='mt-6 text-center text-3xl font-extrabold text-gray-900'>
                    Lien vers votre page de <br> modification du mot de passe
                </h2>
            </div>
            <div class='mt-8 space-y-6'>
                <div>
                    <a
                        class='cursor-pointer group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                        id='tokenLink'>
                                Token
                    </a>
                </div>
            </div>
        ";
    }

    public static function loadInterventions($interv, $marque, $modele, $immat)
    {
        return '<tr> 
       <th class="col-1 text-center align-middle py-2">' . $interv . '</th>
       <th class="col-3 text-center align-middle py-2">' . $marque . '</th>
       <th class="col-3 text-center align-middle py-2">' . $modele . '</th>
       <th class="col-2 text-center align-middle py-2">' . $immat . '</th>
       <th class="col-1 text-center align-middle py-2"><button onclick="priseEnCharge(' . $interv . ')" type="button" class="btn btn-primary btn-sm">Prise en charge</button></th>
   </tr>';
    }

    public static function loadInterventionsEnCours($interv, $idTech, $marque, $immat)
    {
        return '<tr> 
       <th class="col-1 text-center align-middle py-2">' . $interv . '</th>
       <th class="col-3 text-center align-middle py-2">' . $idTech . '</th>
       <th class="col-3 text-center align-middle py-2">' . $marque . '</th>
       <th class="col-2 text-center align-middle py-2">' . $immat . '</th>
       
   </tr>';
    }

    public static function loadCarsRecap($marque, $modele, $immat)
    {
        return '<tr> 
       <th class="col-3 text-center align-middle py-2">' . $modele . '</th>
       <th class="col-3 text-center align-middle py-2">' . $marque . '</th>
       <th class="col-2 text-center align-middle py-2">' . $immat . '</th>
      
   </tr>';
    }

    public static function loadRdvRecap($interv, $idTech, $marque, $immat)
    {
        return '<tr> 
       <th class="col-1 text-center align-middle py-2">' . $interv . '</th>
       <th class="col-3 text-center align-middle py-2">' . $idTech . '</th>
       <th class="col-3 text-center align-middle py-2">' . $marque . '</th>
       <th class="col-2 text-center align-middle py-2">' . $immat . '</th>
       
   </tr>';
    }

    public static function loadHistory($interv, $idTech, $marque, $immat)
    {
        return '<tr> 
       <th class="col-1 text-center align-middle py-2">' . $interv . '</th>
       <th class="col-3 text-center align-middle py-2">' . $idTech . '</th>
       <th class="col-3 text-center align-middle py-2">' . $marque . '</th>
       <th class="col-2 text-center align-middle py-2">' . $immat . '</th>
       
   </tr>';
    }

    public static function listeVideUser()
    {
        return '<p class="col-4 fs-3 text-secondary">Aucun véhicule</p>';
    }

    public static function rdvVide()
    {
        return "<p class='col text-center py-2 fs-3 text-secondary'>Pas de rendez-vous programmés</p>";
    }

    public static function listeVide()
    {
        return '<p class="col py-2 fs-3 text-secondary">Aucun véhicule en attente</p>';
    }

    public static function intervVide()
    {
        return "<p class='col text-center py-2 fs-3 text-secondary'>Pas d'interventions en cours</p>";
    }

    public static function cardCar($id_vehicule, $marque, $modele, $annee, $immat, $carburant, $infos)
    {

        return "
        <div id='$id_vehicule' class='card border-success mb-3' style='max-width: 20rem;'>
            <div class='card-header'>Header</div>
            <div class='card-body'>
              <h4 class='card-title'>Success card title</h4>
              <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            </div>
        </div>
        ";
    }

}