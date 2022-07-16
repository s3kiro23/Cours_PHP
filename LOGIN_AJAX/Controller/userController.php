<?php session_start();
require_once '../Entity/function.php';
require_once '../Entity/User.php';
require_once '../Entity/Database.php';
require_once '../Entity/Log.php';
require_once '../Entity/HTML.php';
require_once '../Entity/Command.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

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
            echo json_encode(array("login" => $user->getLogin(), "nom" => $user->getNom(), "prenom" => $user->getPrenom(), "password" => $user->getPassword()));
        }


        break;

    case 'modify' :
        $status = 0;
        $msg = 'Login avec un @ obligatoire!';
        $user = new User(decrypt($_SESSION['id']));

        if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Nom') {

            $user->setNom($_POST['value']);

        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Prenom') {

            $user->setPrenom($_POST['value']);

        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Login') {
            if (strstr($_POST['value'], '@')) {
                $user->setLogin($_POST['value']);
                $status = 1;
            }
        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Password') {

            $user->setPassword($_POST['value']);

        }

        $user->update();

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'deleteAccount' :

        $msg = "Erreur";
        $ID = decrypt($_SESSION['id']);

        if (isset($ID) & !empty($ID)) {

            $user = new User($ID);
            write_logs(decrypt($_SESSION['id']), 4);
            $user->delete($ID);
            $msg = 'Success';

        }

        echo json_encode(array('msg' => $msg));

        break;

}



