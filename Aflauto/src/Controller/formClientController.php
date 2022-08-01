<?php session_start();

/*require_once '../Controller/shared.php';*/

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch ($_POST['request']) {

    case 'newAppointment' :

        $msg = 'Réservation de votre créneaux effectué avec succès !!';
        $status = 1;

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

    case 'marquesLoad':

        $list_marque = array();
        $result = mysqli_query($GLOBALS['Database'], "SELECT * FROM marques") or die;
        $html_marque = '<option>-</option>';
        while ($data = mysqli_fetch_array($result)) {
            $list_marque[] = $data;
        }
        error_log(json_encode($list_marque));
        foreach ($list_marque as $marque) {
            $html_marque .= '<option class="" value="' . $marque['id_marque'] . '">' . $marque['nom_marque'] . '</option>';
        }

        echo json_encode(array("html_marque" => $html_marque));

        break;

    case 'modelesLoad':

        error_log($_POST['marque']);
        $list_modele = array();
        $idMarque = $_POST['marque'];
        $requete2 = " SELECT * FROM modeles WHERE id_marque='" . mysqli_real_escape_string($GLOBALS['Database'], $idMarque) . "'";
        $result2 = mysqli_query($GLOBALS['Database'], $requete2) or die;
        $html_model = '<option class="border border-y-slate-700">-</option>';
        while ($data2 = mysqli_fetch_array($result2)) {
            $list_modele[] = $data2;
        }
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
/*            error_log(json_encode($timeSettings));*/

            /*Récupération des créneaux réservés en BDD*/

            $timeSlotCheck = ControleTech::checkTimeSlotReserved(strtotime($currentDate));
            error_log(json_encode($timeSlotCheck));

            for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                if ((int)$timeSlotCheck[$a]['id_time_slot'] > strtotime($currentDate)) {
                    $tab_reserved[] = (int)$timeSlotCheck[$a]['id_time_slot'];
                }
            }
            /*            error_log(json_encode($tab_reserved));*/

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
            /*            error_log(json_encode($timeSlotCheck));*/

            for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                if ((int)$timeSlotCheck[$a]['time_slot_id'] > strtotime($currentDate)) {
                    $tab_reserved[] = (int)$timeSlotCheck[$a]['time_slot_id'];
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
