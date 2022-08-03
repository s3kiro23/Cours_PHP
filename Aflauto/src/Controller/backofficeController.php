<?php session_start();

require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch ($_POST['request']) {

    case 'vehiculeAttente':
        $ts_current_date = strtotime(date('Y-m-d'));
        error_log($ts_current_date);
        $html = '';
        $htmlVide = HTML::listeVide();
        $status = 0;
        $requete = "SELECT * FROM `controle_tech` 
                    INNER JOIN `vehicules` ON `controle_tech`.`id_vehicule` = `vehicules`.`id_vehicule`
                    INNER JOIN `marques` ON `vehicules`.`id_marque` = `marques`.`id_marque`  
                    INNER JOIN `modeles` ON `vehicules`.`id_modele` = `modeles`.`id_modele`  
                    WHERE `controle_tech`.`state` = '" . mysqli_real_escape_string($GLOBALS['Database'], $status) . "'
                    AND `controle_tech`.`id_time_slot`
                    BETWEEN '" . mysqli_real_escape_string($GLOBALS['Database'], $ts_current_date) . "' + 28800 AND '" . mysqli_real_escape_string($GLOBALS['Database'], $ts_current_date) . "' + 64800 ";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_array($result)) {
            $list_vehicule[] = $data;

            $marque = $data['nom_marque'];
            $modele = $data['nom_modele'];
            $interv = $data['id_controle'];
            $immat = $data['immat_vehicule'];
            $html .= HTML::loadInterventions($interv, $marque, $modele, $immat);
            $status = 1;
        }

        echo json_encode(array("status" => $status, "msg" => $html, "msg2" => $htmlVide));
        break;


    case 'prise_en_charge':
        $status = 1;
        $idControle = $_POST['idControle'];
        error_log($idControle);
        $html1 = '<div class="text-light form-group">
        <label class="col-form-label col-form-label-sm mt-4" for="inputSmall">Numéro de technicien: </label>
        <input id="idTechnicien" class="form-control form-control-sm" type="text" placeholder="" >
        </div>';
        $html2 = "<h5 class='modal-title'>Vous allez prendre en charge l'intervention N° $idControle</h5>";
        $html3 = '<button onclick="basculerIntervention(' . $idControle . ');" type="button" class="btn btn-primary ">Ok</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>';
        echo json_encode(array("status" => $status, "msg" => $html1, "msg2" => $html2, "msg3" => $html3));

        break;

    case 'baculer_intervention':
        $idControle = $_POST['idControle'];
        $idTech = $_POST['idTech'];
        $requete = "UPDATE `controle_tech` SET `state`='" . mysqli_real_escape_string($GLOBALS['Database'], '1') . "', `id_tech`='" . mysqli_real_escape_string($GLOBALS['Database'], $idTech) . "' WHERE `id_controle`='" . mysqli_real_escape_string($GLOBALS['Database'], $idControle) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        echo json_encode(1);
        break;

    case 'interv_en_cours':
        $html = '';
        $status = 0;
        $htmlVide = HTML::intervVide();
        $requete = "SELECT * FROM `controle_tech` 
                INNER JOIN `vehicules` ON `controle_tech`.`id_vehicule` = `vehicules`.`id_vehicule`
                INNER JOIN `marques` ON `vehicules`.`id_marque` = `marques`.`id_marque`  
                INNER JOIN `modeles` ON `vehicules`.`id_modele` = `modeles`.`id_modele`  
                WHERE `controle_tech`.`state` = '1'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_array($result)) {
            $list_vehicule[] = $data;
            $idTech = $data['id_tech'];
            $marque = $data['nom_marque'];
            $interv = $data['id_controle'];
            $immat = $data['immat_vehicule'];
            $html .= HTML::loadInterventionsEnCours($interv, $idTech, $marque, $immat);
            $status = 1;
        }
        echo json_encode(array("status" => $status, "msg" => $html, "msg2" => $htmlVide));

        break;

    case 'user_login' :

        error_log(decrypt($_SESSION['id']) . 'User');

        $login_user = "Vous n'êtes pas connecté ! ";
        $user = false;
        if (is_logged()) {
            $user = new User(decrypt($_SESSION['id']));
        }
        if (!$user) {
            echo json_encode(1);
        } else {
            echo json_encode(array("login" => $user->getEmail_user()));
        }

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


    default :
        echo json_encode(1);
        break;
}
