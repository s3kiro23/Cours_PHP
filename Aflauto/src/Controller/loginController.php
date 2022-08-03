<?php session_start();
require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});


$db = new Database();
$GLOBALS['db'] = $db->connexion();

switch ($_POST['request']) {

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $contentPwdLogin = "";

        try {

            $user = User::checkUser($_POST['login']);

            if ($user && password_verify($_POST['password'], $user[0]['password_user'])) {
                $log = Log::checkLog($user[0]['id_user']);

                if ($log <= 5) {

                    $dateJour = date("Y-m-d H:i:s");

                    if ($user[0]['pwdExp_user'] > $dateJour) {

                        $status = 3;
                        $msg = 'A2F activée !';
                        $_SESSION['id'] = encrypt($user[0]['id_user']);
                        User::sms(decrypt($_SESSION['id']));
                        $contentPwdLogin = HTML::secondAuth();
                        write_logs(($_POST['login']), 1);

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

            } else {
                $status = 0;
                $msg = "Mauvais mot de passe!";
                $log = new Log($user[0]['id_user']);
                $log::create($user[0]['id_user'], date("Y-m-d H:i:s"));
            }

        } catch (PDOException $e) {
            $status = 0;
            $msg = "Erreur : " . $e->getMessage();
        }

        echo json_encode(array("status" => $status, "msg" => $msg, "contentPwdLogin" => $contentPwdLogin));

        break;

    case 'newPwd' :

        $status = 1;
        $msg = "Mise à jour réussi, Enjoy :D !";
        $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
        $user = User::checkUser($_POST['user']);
        $currentUser = new User($user['id']);

        /*        if (!checkPasswdLenght($_POST['password'])){
                    $status = 0;
                    $msg = "Condition de création du mot de passe non remplies!";
                }*/
        /*else {*/
        $currentUser->setPassword_user($_POST['password']);
        $currentUser->setPwdExp_user($currenPwdExp);
        $currentUser->update();
        $_SESSION['id'] = encrypt($user['id_user']);
        write_logs(($user['login']), 3);
        write_logs(($user['login']), 1);
        /* }*/

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'sub_sms':

        $status = 0;
        $msg = "Echec de la double authentification!";
        $smsCheck = User::checkSmsCode(decrypt($_SESSION['id']), $_POST['sms_verif']);
        error_log(json_encode($smsCheck));
        $user = new User(decrypt($_SESSION['id']));

        if ($smsCheck) {
            $status = 1;
            $msg = "A2F validée, Enjoy :D !";
            User::updateSMS(decrypt($_SESSION['id']));
        }
        error_log($_SESSION['id']);

        echo json_encode(array("status" => $status, "msg" => $msg, "type" => $user->getType()));

        break;

    case 'to_signIn' :

        $msg = "Redirection vers la page d'inscription en cours!";

        echo json_encode(array("msg" => $msg));

        break;

    case 'to_clientForm' :

        $msg = "Redirection vers la page du formulaire en cours!";

        echo json_encode(array("msg" => $msg));

        break;


    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));

        break;

    default :

        echo json_encode(1);

        break;

}