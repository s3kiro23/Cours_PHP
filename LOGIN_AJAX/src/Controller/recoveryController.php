<?php session_start();
require_once '../Controller/shared.php';
require_once '../Entity/User.php';
require_once '../Entity/Database.php';
require_once '../Entity/Log.php';
require_once '../Entity/HTML.php';
require_once '../Entity/Command.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']) {

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

        if (isset($_POST['mail']) && !empty($_POST['mail'])) {
            $user = User::checkUser($_POST['mail']);
            error_log(json_encode($user));

            if ($user) {
                $hash = User::request($user['id']);
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

    case 'modify_password' :

        $status = 1;
        $msg = "Récupération du compte réussi, Enjoy :D !";
        $token = $_POST['token'];

        if (!checkPassword($_POST['password'], $_POST['password2'])) {
            $status = 0;
            $msg = "Les mots de passe ne correspondent pas!";
        } else if (isset($token) && !empty($token)) {
            $checkHash = User::checkRequest($token);

            if (!$checkHash) {
                $status = 0;
                $msg = "Ce token n'est plus valide!";
            } else if ($token == $checkHash['hash']) {

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

}