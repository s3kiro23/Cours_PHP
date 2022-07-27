<?php


class HTML
{

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
                    src='https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg'
                    alt='Workflow'
                />
                <h2 class='mt-6 text-center text-3xl font-extrabold text-gray-900'>
                    Renseignez le code SMS
                </h2>
            </div>
        <form action='javascript:smsVerif();' class='mt-8 space-y-6' method='POST'>
            <div class='rounded-md'>
                <div class='px-3 py-2 rounded-t-md bg-indigo-500 text-white'>
                        <span>Code :</span>
                        <span id='sms'></span>
                </div>
                <div>
                    <label for='sms_verif' class='sr-only'>sms_verif</label>
                    <input
                            id='sms_verif'
                            name='sms_verif'
                            type='text'
                            class='field appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm'
                            placeholder='Entrez le code sms reçu.'
                    />
                </div>
            </div>
            <div>
                <button
                    type='submit'
                    class='group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
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

    public static function displayAllCmd($cmd)
    {

        return "
            <div class='flex mb-2 py-3 justify-between items-center w-full border-2 border-gray-100 rounded'>
                <span class='pl-4 font-semibold text-gray-700 white:text-dark'>N° de commande : </span>
                <span id='cmdID'>" . $cmd['id'] . "</span>
                <span class='pl-4 font-semibold text-gray-700 white:text-dark'>Date de commande : </span>
                <span id='cmdDate'>" . $cmd['date'] . "</span>
                <div class='flex justify-between items-center'>
                    <button id='showInfo' onclick='showInfo(\"" . $cmd['id'] . "\")' class='col-span-3 px-4 font-medium text-indigo-600 hover:text-indigo-500'
                            type='button'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                            <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                        </svg>
                    </button>
                </div>
            </div>
		";
    }

    public static function cmdPages($page, $numb)
    {

        return "

            <li class='page-item' id='page$numb'><a class='page-link' onclick='listCommands($page);'>$numb</a></li>
            
		";
    }

    public static function rdvPages($page, $numb)
    {
        return "
            
            <li class='page-item' id='page$numb'><a class='page-link' onclick='rdvCases($page);'>$numb</a></li>
            
		";
    }

    public static function dayCases($date, $timeStampDate)
    {
        $currentDate = strtotime(date('Y-m-d'));
        $nextDate = $timeStampDate+86400;
        $previousDate = $timeStampDate-86400;

        $dayCase =  "<div id='flip' class='flex justify-content-center py-3 mt-2 rounded-t bg-indigo-700 w-full text-white border-solid border-grey'>";

            if($timeStampDate != $currentDate){
                $dayCase .=  "<svg onClick='changeDate($previousDate);' xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 cursor-pointer' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                  <path stroke-linecap='round' stroke-linejoin='round' d='M15 19l-7-7 7-7' />
                </svg>";
            }
            $dayCase .= "
                <span id='$timeStampDate' class='currentDate mx-5'>$date</span>
                <svg onClick='changeDate($nextDate);' xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 cursor-pointer' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                  <path stroke-linecap='round' stroke-linejoin='round' d='M9 5l7 7-7 7' />
                </svg>
            </div>
            <div id='panel' class='$timeStampDate bg-white p-3'>
            
            </div>";

            return $dayCase;

    }

    public static function timeSlot($timeStampID, $slotInterval)
    {
        return "
            <button id='$timeStampID' class='p-2 my-2 slot rounded bg-indigo-100 border-1' onclick='slotTimeClick($timeStampID);'>$slotInterval</button>                
		";
    }


    public static function displayAllRDV($rdv)
    {
        return "
            <div class='flex bg-white mb-2 py-3 justify-between items-center w-full border-2 border-gray-100 rounded'>
                <span class='pl-4 font-semibold text-gray-700 white:text-dark'>N° de rdv : </span>
                <span id='rdvID'>" . $rdv['id'] . "</span>
                <span class='pl-4 font-semibold text-gray-700 white:text-dark'>Date de rdv : </span>
                <span id='rdvDate'>" . $rdv['booked_date'] . "</span>
                <div class='flex justify-between items-center'>
                    <button id='showInfo' onclick='showInfo(\"" . $rdv['id'] . "\")' class='col-span-3 px-4 font-medium text-indigo-600 hover:text-indigo-500'
                            type='button'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                            <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                        </svg>
                    </button>
                </div>
            </div>
		";
    }

}
