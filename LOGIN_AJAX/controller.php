<?php session_start();
require_once 'function.php';
require_once 'Users.php';
require_once 'Database.php';
require_once 'Logs.php';


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
            $dateJour = date("Y-m-d H:i:s");


            if ($user && password_verify($_POST['password'], $user['password'])){
                error_log($user['pwdExp']);
                $_SESSION['id'] = $user['id'];

                if ($user['pwdExp'] > $dateJour){
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
                $msg = "Mauvais login ou mot de passe!";
                $log = new Log($user['id'], 1);
                error_log($user['id']);
                error_log(json_encode($log));
                $log::create($user['id'], 1);
            }

        } catch (PDOException $e) {
            $status = 0;
            $msg = "Erreur : ".$e->getMessage();
        }

        echo json_encode(array("status" => $status, "msg" => $msg, "contentPwdLogin" => $contentPwdLogin));

    break;

    case 'newPwd' :

        $status = 1;
        $msg = "Mise à jour réussi, Enjoy :D !";
        $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
        $user = new User($_SESSION['id']);
        error_log($_POST['password']);

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
            $utilisateur = User::create($_POST['login'], $_POST['passwd'], $_POST['prenom'], $_POST['nom'], $currenPwdExp);
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

            $_SESSION['id'] = $utilisateur['id'];

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
            $user = new User($_SESSION['id']);

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
        $user = new User($_SESSION['id']);

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

        if (isset($_SESSION['id']) & !empty($_SESSION['id'])){

            $user = new User($_SESSION['id']);
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