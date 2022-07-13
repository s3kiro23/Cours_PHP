<?php session_start();
require_once '../Entity/function.php';
require_once '../Entity/User.php';
require_once '../Entity/Database.php';
require_once '../Entity/Log.php';
require_once '../Entity/HTML.php';
require_once '../Entity/Command.php';


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
            error_log(json_encode($user));

            if ($user && password_verify($_POST['password'], $user['password'])){
                $log = Log::checkLog($user['id']);

                if ($log <= 5){

                    $dateJour = date("Y-m-d H:i:s");

                    if ($user['pwdExp'] > $dateJour){

                        $status = 3;
                        $msg = 'A2F activée !';
                        $_SESSION['id'] = encrypt($user['id']);
                        User::sms(decrypt($_SESSION['id']));
                        $contentPwdLogin = HTML::secondAuth();
                        file_put_contents($log_path, "\n ".dateJour()." ".get_login()." s'est connecté", FILE_APPEND);

                    } else {

                        $msg = "Mot de passe expiré! Merci de créer un nouveau mot de passe.";
                        $status = 2;
                        $contentPwdLogin = HTML::newPwd();

                    }

                } else {
                    $status = 0;
                    $msg = "Compte bloqué!";
                }
            } else if (!$user) {

                $status = 0;
                $msg = "Le login n'existe pas!";

            }

            else {
                $status = 0;
                $msg = "Mauvais mot de passe!";
                $log = new Log($user['id']);
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
        $contentForgot = HTML::toRequestMail();

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
                $contentToken = HTML::genToken();
            }
        }

        echo json_encode(array("status" => $status, "msg" => $msg, "contentToken" => $contentToken, "token" => $token));

    break;

    case 'tokenLink':

        $msg = "Token validé!";

        echo json_encode(array("msg" => $msg));

    break;

    case 'newPwd' :

        $status = 1;
        $msg = "Mise à jour réussi, Enjoy :D !";
        $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
        $user = User::checkUser($_POST['user']);
        $currentUser = new User($user['id']);

/*        if (!checkPasswdLenght($_POST['password'])){
            $status = 0;
            $msg = "Condition de création du mot de passe non remplies!";
        }*/
        /*else {*/
        $currentUser->setPassword($_POST['password']);
        $currentUser->setPwdExp($currenPwdExp);
        $currentUser->update();
        $_SESSION['id'] = encrypt($user['id']);
       /* }*/

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    case 'modify_password' :

        $status = 1;
        $msg = "Récupération du compte réussi, Enjoy :D !";
        $token = $_POST['token'];

        if (!checkPassword($_POST['password'], $_POST['password2'])){
            $status= 0;
            $msg = "Les mots de passe ne correspondent pas!";
        }

        else if (isset($token) && !empty($token)){
            $checkHash = User::checkRequest($token);

            if (!$checkHash){
                $status= 0;
                $msg = "Ce token n'est plus valide!";
            }

            else if ($token == $checkHash['hash']) {

                $user_hash = $checkHash['hash'];
                $user = new User($checkHash['user_id']);
                $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
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
            $utilisateur = User::create($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['type'], $_POST['passwd'], $currenPwdExp, date("Y-m-d H:i:s"), User::random_hash());
            $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE login=?');
            $query->execute([$_POST['login']]);
            $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = encrypt($utilisateur['id']);

            $log_path = 'log.txt';
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." a créé un nouveau compte.", FILE_APPEND);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));
                
    break;

    case 'newCommand':

        $newCmd = Command::createCmd($_POST['title'], $_POST['label'], decrypt($_SESSION['id']));
        $msg = "Nouvelle commande créée avec l'ID de commande n° ".$newCmd." !";

        echo json_encode(array("msg" => $msg));

    break;

/*    case 'currentCommands':

        $currentCmd = Command::checkCurrentCmd($id);
        $cmdID = $currentCmd['id'];
        $date = $currentCmd['date'];

        echo json_encode(array("cmdID" => $cmdID, "date" => $date));

    break;*/

    case 'listCommands':

        $msg = "";
        $html ="";
        $off7 = $_POST['off7'];
        $allCmd = Command::checkAllCmd($off7);
        error_log(json_encode($allCmd));

        if (is_array($allCmd) || is_object($allCmd))
        {
            // If yes, then foreach() will iterate over it.
            foreach ($allCmd as $cmd){

                $html .= HTML::displayAllCmd($cmd);

            }
        }
        else // If $myList was not an array, then this block is executed.
        {
            $msg = "Erreur lors de la récupération du tableau";
        }

        echo json_encode(array("html" => $html, "msg" => $msg));

    break;

    case 'showInfo':

        $currentCmd = Command::checkCurrentCmd($_POST['cmdID']);
        $user = new User(decrypt($_SESSION['id']));

        $cmdID = $currentCmd['id'];
        $title = $currentCmd['title'];
        $label = $currentCmd['label'];
        $date = $currentCmd['date'];
        $client = $user->getLogin();

        echo json_encode(array("cmdID" => $cmdID, "title" => $title, "label" => $label, "date" => $date, "client" => $client));

    break;


    case 'user_login' :

        $login = "Vous n'êtes pas connecté ! ";
        $user = false;
        if (is_logged()){
            $user = new User(decrypt($_SESSION['id']));

        }
        if(!$user){
            echo json_encode(1);

        }else{
            echo json_encode(array("login" => $user->getLogin(), "nom" => $user->getNom(), "prenom" => $user->getPrenom(), "password" => $user->getPassword()));
        }


    break;

    case 'modify' :
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

        $msg = "Erreur";
        $ID = decrypt($_SESSION['id']);

        if (isset($ID) & !empty($ID)){

            $user = new User($ID);
            $user->delete($ID);

            $msg = 'Success';

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