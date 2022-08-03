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

    case 'to_cars' :

        $msg = "Redirection vers vos véhicules!";

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

    case 'modify' :
        $status = 0;
        $msg = 'Login avec un @ obligatoire!';
        $user = new User(decrypt($_SESSION['id']));

        if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Nom') {

            $user->setNom_user($_POST['value']);

        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Prenom') {

            $user->setPrenom_user($_POST['value']);

        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Login') {
            if (strstr($_POST['value'], '@')) {
                $user->setEmail_user($_POST['value']);
                $status = 1;
            }
        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Telephone') {

            $user->setTelephone_user($_POST['value']);

        } else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Adresse') {

            $user->setAdresse_user($_POST['value']);

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

    case 'loadCarsRecap':

        $msg = "Success";
        $html = "";
        $htmlVide = "";
        $htmlRDV = "";
        $htmlHistory = "";
        $status = 1;

        $tab_userCars = User::checkCars(decrypt($_SESSION['id']));
        $tab_rdv = User::checkRdv(decrypt($_SESSION['id']));
        $tab_history = User::checkHistory(decrypt($_SESSION['id']));

        /*        error_log($tab_userCars[1]['nom_marque']);
                error_log($tab_userCars[0]['nom_marque']);*/

        foreach ($tab_userCars as $car) {
            $html .= HTML::loadCarsRecap($car['nom_marque'], $car['nom_modele'], $car['immat_vehicule']);
        }
        error_log($html);

        foreach ($tab_rdv as $rdv) {

            $htmlRDV .= HTML::loadRdvRecap($rdv['id_controle'], $rdv['id_tech'], $rdv['nom_modele'], $rdv['immat_vehicule']);

        }
        error_log($htmlRDV);

        foreach ($tab_history as $history) {

            $htmlHistory .= HTML::loadRdvRecap($history['id_controle'], $history['id_tech'], $history['nom_modele'], $history['immat_vehicule']);

        }
        error_log($htmlHistory);

        if (empty($tab_userCars)) {

            $htmlVide = HTML::listeVideUser();
            $status = 0;

        }


        echo json_encode(array('status' => $status, 'msg' => $msg, 'html' => $html, 'htmlVide' => $htmlVide, "htmlRDV" => $htmlRDV, "htmlHistory" => $htmlHistory));

        break;

}
