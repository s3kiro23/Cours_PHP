<?php session_start();
require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});


$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']) {

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $contentPwdLogin = "";

        try {

            $user = User::checkUser($_POST['login']);
            error_log(json_encode($user));

            if ($user && password_verify($_POST['password'], $user['password'])) {
                $log = Log::checkLog($user['id']);

                if ($log <= 5) {

                    $dateJour = date("Y-m-d H:i:s");

                    if ($user['pwdExp'] > $dateJour) {

                        $status = 3;
                        $msg = 'A2F activée !';
                        $_SESSION['id'] = encrypt($user['id']);
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
                $log = new Log($user['id']);
                $log::create($user['id'], date("Y-m-d H:i:s"));
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
        $currentUser->setPassword($_POST['password']);
        $currentUser->setPwdExp($currenPwdExp);
        $currentUser->update();
        $_SESSION['id'] = encrypt($user['id']);
        write_logs(($user['login']), 3);
        write_logs(($user['login']), 1);
        /* }*/

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'sub_sms':

        $status = 0;
        $msg = "Echec de la double authentification!";
        $smsCheck = User::checkSmsCode(decrypt($_SESSION['id']), $_POST['sms_verif']);

        if ($smsCheck) {
            $status = 1;
            $msg = "A2F validée, Enjoy :D !";
            User::updateSMS(decrypt($_SESSION['id']));
        }

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'to_signIn' :

        $msg = "Redirection vers la page d'inscription en cours!";

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