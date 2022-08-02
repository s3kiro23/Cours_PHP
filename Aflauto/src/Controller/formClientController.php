<?php session_start();

require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch ($_POST['request']) {

    case 'newAppointment' :

        $msg = 'Réservation de votre créneau effectué avec succès !!';
        $status = 1;
        error_log(json_encode($_POST));

        if (!isset($_POST['creneau'])){

            $msg = 'Veuillez sélectionner un créneau horaire';
            $status = 0;

        } else {

            $carID = Vehicule::newVehicule($_POST['marque'], $_POST['modele'], $_POST['immat'], $_POST['annee'], $_POST['carburant']);
            error_log($_POST['creneau']);
            ControleTech::newCT($_POST['creneau'], $carID, 0);

        }


        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'checkField':
        error_log($_POST['fieldVal']);

        $msg = "";
        $status = 1;

        if (isset($_POST['field']) && $_POST['field'] == 'inputNom') {
            error_log('NomErr1');

            if (empty($_POST['fieldVal'])) {
                error_log('NomErr2');

                $msg = "Veuillez renseigner votre nom!";
                $status = 0;

            }

        } else if (isset($_POST['field']) && $_POST['field'] == 'inputPrenom') {

            if (empty($_POST['fieldVal'])) {

                $msg = "Veuillez renseigner votre prénom!";
                $status = 0;

            }

        }
        if (isset($_POST['field']) && $_POST['field'] == 'inputTel') {

            if (empty($_POST['fieldVal'])) {

                $msg = "Le champ téléphone ne peut être vide!";
                $status = 0;

            }
            error_log(checkTel($_POST['fieldVal']));
            if (!checkTel($_POST['fieldVal'])) {
                error_log('Tel12');

                $msg = "Veuillez renseigner un numéro de téléphone conforme!";
                $status = 0;

            }

        }
        if (isset($_POST['field']) && $_POST['field'] == 'inputEmail') {

            if (!checkMail($_POST['fieldVal'])) {
                error_log('mail');

                $msg = "Veuillez renseigner un mail conforme!";
                $status = 0;

            } else if (empty($_POST['fieldVal'])) {

                $msg = "Le champ email est vide!";
                $status = 0;

            }

        }
        if (isset($_POST['field']) && $_POST['field'] == 'inputAddr') {

            if (empty($_POST['fieldVal'])) {

                $msg = "Le champ adresse est vide!";
                $status = 0;

            }

        }
        if (isset($_POST['field']) && $_POST['field'] == 'inputCP') {

            if (empty($_POST['fieldVal'])) {

                $msg = "Le champ code postal est vide!";
                $status = 0;

            } else if (!checkCP($_POST['fieldVal'])) {

                $msg = "Veuillez renseigner un code postal valide!";
                $status = 0;

            }

        }
        if (isset($_POST['field']) && $_POST['field'] == 'inputVille') {

            if (empty($_POST['fieldVal'])) {

                $msg = "Le champ ville est vide!";
                $status = 0;

            }

        }

        error_log(json_encode($_POST));

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'marquesLoad':

        $html_marque = '<option>-</option>';

        $list_marque = Vehicule::checkMarques();

        foreach ($list_marque as $marque) {
            $html_marque .= '<option class="" value="' . $marque['id_marque'] . '">' . $marque['nom_marque'] . '</option>';
        }

        echo json_encode(array("html_marque" => $html_marque));

        break;

    case 'modelesLoad':

        $html_model = '<option class="border border-y-slate-700">-</option>';

        $list_modele = Vehicule::checkModeles($_POST['marque']);

        foreach ($list_modele as $modele) {
            $html_model .= '<option value="' . $modele['id_modele'] . '">' . $modele['nom_modele'] . '</option>';
            $status = 1;
        }
        echo json_encode(array("html_model" => $html_model));

        break;

    case 'dayCases':

        setlocale(LC_TIME, "fr_FR", "French");
        $currentDate = date('Y-m-d'); // Date du jour
        $html_slot = "";
        $tab_reserved = [];

        if (empty($_POST['currentDate'])) {

            $timeSettings = Settings::timeSetting();
            /*error_log(json_encode($timeSettings));*/

            /*Récupération des créneaux réservés en BDD*/

            $timeSlotCheck = ControleTech::checkTimeSlotReserved(strtotime($currentDate));
            error_log(json_encode($timeSlotCheck));
            /*            error_log(count($timeSlotCheck));*/

            if ($timeSlotCheck) {
                for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                    if ((int)$timeSlotCheck[$a]['id_time_slot'] > strtotime($currentDate)) {
                        $tab_reserved[] = (int)$timeSlotCheck[$a]['id_time_slot'];
                    }
                }
                error_log(json_encode($tab_reserved));
            }

            /*Génération du jour en cours*/

            $html_day = HTML::dayCases(utf8_encode(strftime("%A %d %B %G", strtotime($currentDate))), strtotime($currentDate));

            /*Génération des créneaux horaires dispo | date courante uniquement */

            $tab_available = ControleTech::generateSlotAvailable($currentDate);

            /*Comparaison des slot dispo avec ceux réservés et suppression des match*/

            foreach ($tab_reserved as $item) {
                if (in_array($item, (array)$tab_available)) {
                    $tab_available = array_diff($tab_available, array($item));
                }
            }

            /*Génération des slots dispos suite comparaison des tab_available et reserved*/

            foreach ($tab_available as $item) {
                $html_slot .= HTML::timeSlot($item, date("H:i", $item));
            }

        } else {

            /*Récupération des créneaux réservés en BDD*/

            $timeSlotCheck = ControleTech::checkTimeSlotReserved($_POST['currentDate']);
            /*            error_log('Update Date = ' . $timeSlotCheck['id_time_slot']);*/

            if ($timeSlotCheck) {
                for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                    if ((int)$timeSlotCheck[$a]['id_time_slot'] > strtotime($currentDate)) {
                        $tab_reserved[] = (int)$timeSlotCheck[$a]['id_time_slot'];
                    }
                }
            }

            /*Génération du jour en cours*/

            $updatedDate = utf8_encode(strftime("%A %d %B %G", $_POST['currentDate']));
            $html_day = HTML::dayCases($updatedDate, $_POST['currentDate']);

            /*Génération des créneaux horaires dispo | date courante uniquement */

            $tab_available = ControleTech::generateSlotUpdate($_POST['currentDate']);

            /*Comparaison des slot dispo avec ceux réservés et suppression des match*/

            foreach ($tab_reserved as $item) {
                if (in_array($item, (array)$tab_available)) {
                    $tab_available = array_diff($tab_available, array($item));
                }
            }

            /*Génération des slots dispos suite comparaison des tab_available et reserved*/

            foreach ($tab_available as $item) {

                $html_slot .= HTML::timeSlot($item, date("H:i", $item));

            }
        }

        echo json_encode(array("html_day" => $html_day, "html_slot" => $html_slot));

        break;

}
