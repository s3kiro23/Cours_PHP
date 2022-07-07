<?php session_start();
require_once 'function.php';
require_once 'User.php';
require_once 'Database.php';
require_once 'Log.php';


$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $log_path = 'log.txt';
        $contentPwdLogin = "";

        try {

            $user = User::checkUser($_POST['login']);

            if ($user && password_verify($_POST['password'], $user['password'])){
/*                $_SESSION['id'] = encrypt($user['id']);*/
                /*  error_log($_SESSION['id']);*/
                    $log = Log::checkLog($user['id']);
                    error_log($log);

                    if ($log <= 5){

                        $dateJour = date("Y-m-d H:i:s");

                        if ($user['pwdExp'] > $dateJour){
                            $_SESSION['id'] = encrypt($user['id']);
                            User::sms(decrypt($_SESSION['id']));
                            $status = 3;
                            $msg = 'A2F activée !';
                            $contentPwdLogin =
                                "<div>
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
                            </form>";
                            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." s'est connecté", FILE_APPEND);
                        } else {
                            $msg = "Mot de passe expiré! Merci de créer un nouveau mot de passe.";
                            $status = 2;
                            $contentPwdLogin =
                            "<div>
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
                            </form>";
                        }

                    } else {
                        $status = 0;
                        $msg = "Compte bloqué!";
                    }
                } else {
                    $status = 0;
                    $msg = "Mauvais login ou mot de passe!";
                    $log = new Log($user['id']);
/*                    error_log($user['id']);*/
/*                    error_log(Log::checkLog($user['id']));*/
                    $log::create($user['id'], date("Y-m-d H:i:s"));
                }

        } catch (PDOException $e) {
            $status = 0;
            $msg = "Erreur : ".$e->getMessage();
        }

        echo json_encode(array("status" => $status, "msg" => $msg, "contentPwdLogin" => $contentPwdLogin));

    break;

    case 'toRequestMail':

        $msg = "Demande de nouveau password en cours!";
        $contentForgot =
            "<div>
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
            </form>";

        echo json_encode(array("msg" => $msg, "contentForgot" => $contentForgot));

    break;

    case 'genToken':

        $status = 0;
        $msg = "Ce login n'existe pas";
        $contentToken = '';
        $token = '';

        if (isset($_POST['mail']) && !empty($_POST['mail'])){
            $user = User::checkUser($_POST['mail']);
            error_log(json_encode($user));

            if ($user){
                $hash =  User::request($user['id']);
                $checkToken = User::checkRequest($hash);
                $token = $checkToken['hash'];

                $status = 1;

                $msg = "Token généré avec succés!";
                $contentToken =
                    "<div>
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
                    </div>";
            }
        }

        echo json_encode(array("status" => $status, "msg" => $msg, "contentToken" => $contentToken, "token" => $token));

    break;

    case 'tokenLink':

/*        User::updateRequest($_POST['mail']);*/

        $msg = "Token validé!";

        echo json_encode(array("msg" => $msg));

    break;

/*    case 'modify_pwd':


        $token = User::checkRequest($user['id']);


    break;*/

    case 'newPwd' :

        $status = 1;
        $msg = "Mise à jour réussi, Enjoy :D !";
        $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
        $user = new User(decrypt($_SESSION['id']));
/*        error_log($_POST['password']);*/

        if (!checkPasswdLenght($_POST['password'])){
            $status = 0;
            $msg = "Condition de création du mot de passe non remplies!";
        }
        else if (!checkPassword($_POST['password'], $_POST['password2'])){
            $status= 0;
            $msg = "Les mots de passe ne correspondent pas!";
        }
        else {
            $user->setPassword($_POST['password']);
            $user->setPwdExp($currenPwdExp);
            $user->update();
        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    case 'modify_password' :

        $status = 1;
        $msg = "Récupération du compte réussi, Enjoy :D !";
        $token = $_POST['token'];
/*        error_log($token);*/


        /*        if (!checkPasswdLenght($_POST['password'])){
                    $status = 0;
                    $msg = "Condition de création du mot de passe non remplies!";
                }*/
        if (!checkPassword($_POST['password'], $_POST['password2'])){
            $status= 0;
            $msg = "Les mots de passe ne correspondent pas!";
        }

        else if (isset($token) && !empty($token)){
            $checkHash = User::checkRequest($token);
/*            error_log(json_encode($checkHash));*/

            if (!$checkHash){
                error_log('1');
                $status= 0;
                $msg = "Ce token n'est plus valide!";
            }

            else if ($token == $checkHash['hash']) {

                $user_hash = $checkHash['hash'];
/*                error_log($checkHash['hash'] . ' 1');*/
                $user = new User($checkHash['user_id']);
                $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
                error_log('modOK!');
                $user->setPassword($_POST['password']);
                $user->setPwdExp($currenPwdExp);
                $user->update();
                User::updateRequest($checkHash['user_id']);

            }
        }

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;


    case 'sub_sms':

        $status = 0;
        $msg = "Echec de la double authentification!";
        $smsCheck = User::checkSmsCode(decrypt($_SESSION['id']), $_POST['sms_verif']);

        if ($smsCheck){
            $status = 1;
            $msg = "A2F validée, Enjoy :D !";
            User::updateSMS(decrypt($_SESSION['id']));
/*            error_log(json_encode($smsCheck));*/
        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    case 'logout':

        $status = 1;
        $msg = "Déconnexion réussi!";
        $log_path = 'log.txt';

        file_put_contents($log_path, "\n ".dateJour()." ".get_login()." s'est déconnecté", FILE_APPEND);
        session_destroy();
        unset($_SESSION);

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;
    
    case 'to_signIn' :
        
        $msg = "Redirection vers la page d'inscription en cours!";
        
        echo json_encode(array("msg" => $msg));

    break;
    
    case 'to_logIn' :
        
        $msg = "Redirection vers la page de connexion en cours!";
        
        echo json_encode(array("msg" => $msg));

    break;

    case 'to_home' :

        $msg = "Redirection vers la page Home!";

        echo json_encode(array("msg" => $msg));

    break;

    case 'to_profil' :

        $msg = "Redirection vers la page de profil!";

        echo json_encode(array("msg" => $msg));

    break;

    case 'signIn' :

        $status = 1;
        $msg = "Création de votre compte réussi, Enjoy :D !";
        $user = User::checkUser($_POST['login']);

        if (checkField()){

            $status = 0;
            $msg = "Le champ ".checkField()." est vide !";

        }

        else if (!checkPassword($_POST['passwd'], $_POST['passwd2'])){

            $status = 0;
            $msg = "Les mots de passe ne correspondent pas!";

        }
        else if (!checkCaptcha($_POST['checkCap'], $_POST['captcha'])){

            $status = 0;
            $msg = "Les captcha ne correspondent pas!";

        }

        else if ($user){
            $status = 0;
            $msg = "Le login existe déjà!";
        }


/*        else if (!checkPasswdLenght($_POST['passwd'])){

            $status = 0;
            $msg = "Condition de création du mot de passe non remplies!";

        }*/

        if ($status == 1){
            $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
            $utilisateur = User::create(
                $_POST['login'],
                $_POST['passwd'],
                $_POST['prenom'],
                $_POST['nom'],
                $currenPwdExp,
                date("Y-m-d H:i:s"),
                User::random_hash());
            $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE login=?');
            $query->execute([$_POST['login']]);
            $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
            /*$user = new User(0);

            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['passwd']);
            $user->setPrenom($_POST['prenom']);
            $user->setNom($_POST['nom']);
            $user->generate();*/
            error_log(json_encode($utilisateur));

            $_SESSION['id'] = encrypt($utilisateur['id']);

            $log_path = 'log.txt';
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." a créé un nouveau compte.", FILE_APPEND);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));
                
    break;  

    case 'user_login' :

        $login = "Vous n'êtes pas connecté ! ";
        $user = false;
/*        error_log($_SESSION['id']);*/
        if (is_logged()){
/*            error_log($_SESSION['id']);*/
            $user = new User(decrypt($_SESSION['id']));

        }
/*        error_log(json_encode($user));*/
        if(!$user){
            echo json_encode(1);

        }else{
            echo json_encode(array("login" => $user->getLogin(), "nom" => $user->getNom(), "prenom" => $user->getPrenom(), "password" => $user->getPassword()));
        }


    break;

    case 'modify' :
/*        error_log('query_mod');*/
        $status = 0;
        $msg = 'Login avec un @ obligatoire!';
        $user = new User(decrypt($_SESSION['id']));

        if (isset($_POST['type_value']) && !empty($_POST['type_value']) &&  $_POST['type_value'] == 'Nom'){

            $user->setNom($_POST['value']);

        }
        else if (isset($_POST['type_value']) &&  !empty($_POST['type_value']) &&  $_POST['type_value'] == 'Prenom'){

            $user->setPrenom($_POST['value']);

        }
        else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Login'){
            if (strstr($_POST['value'], '@')) {
                $user->setLogin($_POST['value']);
                $status = 1;
            }
        }

        else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Password'){

            $user->setPassword($_POST['value']);

        }

        $user->update();

    echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    case 'deleteAccount' :
        $msg = "";
        $ID = decrypt($_SESSION['id']);

        if (isset($ID) & !empty($ID)){

            $user = new User($ID);
            $user ->delete();

            $msg = 'test';
/*            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('DELETE FROM `user` WHERE login=:login');
            $query->bindValue(':login', $_SESSION['login']);
            $query->execute();
            $GLOBALS['db']->commit();*/

        }

        echo json_encode(array('msg' => $msg));

    break;

    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));

    break;   
    
    default :

    echo json_encode(1);

    break;

}