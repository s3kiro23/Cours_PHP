<?php session_start();
require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['db'] = $db->connexion();

switch ($_POST['request']) {

    case 'to_home' :

        $msg = "Redirection vers la page de Commandes!";

        echo json_encode(array("msg" => $msg));

        break;

    case 'to_profil' :

        $msg = "Redirection vers la page de profil!";

        echo json_encode(array("msg" => $msg));

        break;

    case 'logout':
        error_log($_POST['login']);
        $status = 1;
        $msg = "Déconnexion réussi!";
        write_logs(($_POST['login']), 2);
        session_destroy();
        unset($_SESSION);

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'user_login' :

        $login = "Vous n'êtes pas connecté ! ";
        $user = false;
        if (is_logged()) {
            $user = new User(decrypt($_SESSION['id']));

        }
        if (!$user) {
            echo json_encode(1);

        } else {
            echo json_encode(array("login" => $user->getEmail_user(), "nom" => $user->getNom_user(), "prenom" => $user->getPrenom_user(), "tel" => $user->getTelephone_user(), "adresse" => $user->getAdresse_user()));
        }

        break;

    case 'deleteCar':


        /*        echo json_encode(array("status" => $status, "msg" => $msg));*/

        break;

}
