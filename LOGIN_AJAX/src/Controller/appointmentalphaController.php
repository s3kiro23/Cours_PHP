<?php session_start();

require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']) {

    case 'dayCases':

        setlocale(LC_TIME, "fr_FR", "French");
        $currentDate = date('Y-m-d'); // Date du jour
        $htmlSlot = "";
        $tab_reserved = [];

        if (empty($_POST['currentDate'])) {

            /*Récupération des créneaux réservés en BDD*/

            $timeSlotCheck = RDV::checkTimeSlotReserved(strtotime($currentDate));
            error_log(json_encode($timeSlotCheck));


            for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                if ((int)$timeSlotCheck[$a]['time_slot_id'] > strtotime($currentDate)) {
                    $tab_reserved[] = (int)$timeSlotCheck[$a]['time_slot_id'];
                }
            }
            error_log(json_encode($tab_reserved));

            /*Génération du jour en cours*/

            $html = HTML::dayCases(utf8_encode(strftime("%A %d %B %G", strtotime($currentDate))), strtotime($currentDate));

            /*Génération des créneaux horaires dispo | date courante uniquement */

            $tab_available = RDV::generateSlotAvailable($currentDate);

            /*Comparaison des slot dispo avec ceux réservés et suppression des match*/

            foreach ($tab_reserved as $item) {
                if (in_array($item, (array)$tab_available)) {
                    $tab_available = array_diff($tab_available, array($item));
                }
            }

            /*Génération des slots dispos suite comparaison des tab_available et reserved*/

            foreach ($tab_available as $item) {
                $htmlSlot .= HTML::timeSlot($item, date("H:i", $item));
            }

        } else {

            /*Récupération des créneaux réservés en BDD*/

            $timeSlotCheck = RDV::checkTimeSlotReserved($_POST['currentDate']);
            error_log(json_encode($timeSlotCheck));

            for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                if ((int)$timeSlotCheck[$a]['time_slot_id'] > strtotime($currentDate)) {
                    $tab_reserved[] = (int)$timeSlotCheck[$a]['time_slot_id'];
                }
            }

            /*Génération du jour en cours*/

            $updatedDate = utf8_encode(strftime("%A %d %B %G", $_POST['currentDate']));
            $html = HTML::dayCases($updatedDate, $_POST['currentDate']);

            /*Génération des créneaux horaires dispo | date courante uniquement */

            $tab_available = RDV::generateSlotUpdate($_POST['currentDate']);

            /*Comparaison des slot dispo avec ceux réservés et suppression des match*/

            foreach ($tab_reserved as $item) {
                if (in_array($item, (array)$tab_available)) {
                    $tab_available = array_diff($tab_available, array($item));
                }
            }

            /*Génération des slots dispos suite comparaison des tab_available et reserved*/

            foreach ($tab_available as $item) {

                $htmlSlot .= HTML::timeSlot($item, date("H:i", $item));

            }
        }

        echo json_encode(array("html" => $html, "htmlSlot" => $htmlSlot));

        break;


    case 'slotTimeClick':

        setlocale(LC_TIME, "fr_FR", "French");
        $user = new User(decrypt($_SESSION['id']));

        echo json_encode(array(
                "user" => $user->getLogin(),
                "slotTime" => date("H:i", $_POST['slotID']),
                "dateSelect" => strftime("%A %d %B %G", $_POST['slotID']),
                "slotTimeStamp" => $_POST['slotID'])
        );

        break;

    case 'createNews':

        Newsletter::createNews($_POST['title'], [], $_POST['content']);
        $msg = "Success!";
        $status = 1;

        echo json_encode(array("msg" => $msg, "status" => $status));

        break;

    case 'newAppointment':

        $newRDV = "";

        if (empty($_POST['expertID'])) {

            $status = 0;
            $msg = "Veuillez renseigner un ID expert!";

            /*        } elseif (empty($_POST['timeslotID'])) {

                        $status = 0;
                        $msg = "Veuillez renseigner un ID user!";*/

        } else {

            $newRDV = RDV::createRdv($_POST['expertID'], decrypt($_SESSION['id']), $_POST['timeslotID']);
            $status = 1;
            $msg = "Nouveau rendez-vous créé avec l'ID n° " . $newRDV . " !";

            if ($_POST['newsletter']) {

                $newsLetter = new Newsletter(1);
                $checkedSubs = $newsLetter->getTab_user();
                $user = new User(decrypt($_SESSION['id']));
                $checkedSubs[] = $user->getLogin();
                $newsLetter->setTab_user($checkedSubs);
                $newsLetter->addSub();

            }

        }

        echo json_encode(array("msg" => $msg, "status" => $status));

        break;

    case 'rdvCases':

        $msg = "";
        $html = "";
        $paginationHTML = "";
        $currentPage = $_POST['page'];
        $off7 = ($currentPage - 1) * 10;
        $rdvPage = RDV::rdvPerPages($off7, decrypt($_SESSION['id']));
        error_log(json_encode($rdvPage));
        $allRdv = RDV::checkAllRdv();
        $totalPages = ceil($allRdv / 10);

        if (is_array($rdvPage) || is_object($rdvPage)) {
            foreach ($rdvPage as $rdv) {

                $html .= HTML::displayAllRDV($rdv);

            }
        } else {
            $msg = "Erreur lors de la récupération de la liste des rdv";
        }

        for ($i = 1; $i <= $totalPages; $i++) {

            $paginationHTML .= HTML::rdvPages($i, $i);

        }

        echo json_encode(array("html" => $html, "msg" => $msg, "paginationHTML" => $paginationHTML, "totalPages" => $totalPages));

        break;

    case 'showInfo':

        setlocale(LC_TIME, "fr_FR", "French");
        $currentRdv = RDV::checkCurrentRdv($_POST['rdvID']);
        $user = new User($currentRdv['user_id']);

        $timeSlotID = strftime("%A %d %B %G" . " à " . "%H" . "h" . "%M", $currentRdv['time_slot_id']);

        echo json_encode(array(
                "rdvID" => $currentRdv['id'],
                "expertID" => $currentRdv['expert_id'],
                "timeslotID" => strftime("%A %d %B %G" . " à " . "%H" . "h" . "%M", $currentRdv['time_slot_id']),
                "bookedDate" => $currentRdv['booked_date'],
                "userID" => $currentRdv['user_id'],
                "userLogin" => $user->getLogin())
        );

        break;

    case 'to_beta':

        $msg = "Redirection vers la page de rdv beta!";

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

}

