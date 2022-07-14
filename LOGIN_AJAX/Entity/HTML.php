<?php


class HTML
{

	public static function newPwd(){

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


	public static function secondAuth(){

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

    public static function toRequestMail(){

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

    public static function genToken(){

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

    public static function displayAllCmd($cmd){

		return "
            <div class='flex mb-2 py-3 justify-between items-center w-full border-2 border-gray-100 rounded'>
                <span class='pl-4 font-semibold text-gray-700 white:text-dark'>N° de commande : </span>
                <span id='cmdID'>".$cmd['id']."</span>
                <span class='pl-4 font-semibold text-gray-700 white:text-dark'>Date de commande : </span>
                <span id='cmdDate'>".$cmd['date']."</span>
                <div class='flex justify-between items-center'>
                    <button id='showInfo' onclick='showInfo(\"".$cmd['id']."\")' class='col-span-3 px-4 font-medium text-indigo-600 hover:text-indigo-500'
                            type='button'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                            <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                        </svg>
                    </button>
                </div>
            </div>
		";
	}

    public static function pages($page, $numb){

        return "

            <li class='page-item' id='page$numb'><a class='page-link' onclick='listCommands($page);'>$numb</a></li>
            
		";
    }

}
