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

        if (empty($_POST['currentDate'])) {

            $html = HTML::dayCases(utf8_encode(strftime("%A %d %B %G", strtotime($currentDate))), strtotime($currentDate));

            for ($e = 0; $e <= 240; $e = $e + 20) {

                $timeSlotAM = strtotime(date("H:i", mktime(8, $e, 0)));
                $tab_available[] = (int)$timeSlotAM;

            }

            for ($i = 0; $i <= 240; $i = $i + 20) {

                $timeSlotPM = strtotime(date("H:i", mktime(14, $i, 0)));
                $tab_available[] = (int)$timeSlotPM;

            }

            foreach ($tab_available as $item) {

                $tab_display[] = $item;

                $htmlSlot .= HTML::timeSlot($item, date("H:i", $item));

            }

        } else {

            /*Récupération des créneaux réservés en BDD*/

            /*        $tab_reserved = [];
                    $timeSlotCheck = RDV::checkTimeSlotReserved();

                    for ($a = 0; $a <= count($timeSlotCheck) - 1; $a++) {
                        if ((int)$timeSlotCheck[$a]['time_slot_id'] > strtotime($currentDate)) {
                            $tab_reserved[] = (int)$timeSlotCheck[$a]['time_slot_id'];
                        }
                    }*/

            /*Génération des jours de la semaine*/

            /*        $weekday = 0;*/

            $updatedDate = utf8_encode(strftime("%A %d %B %G", $_POST['currentDate']));
            /*        $timeStampDate = strtotime($currentDate . '+' . $weekday . ' day');*/
            $html = HTML::dayCases($updatedDate, $_POST['currentDate']);
            /*        error_log($html);*/

            /*Génération des créneaux horaires dispo | date courante uniquement */

            for ($e = $_POST['currentDate'] + 28800; $e <= $_POST['currentDate'] + 28800 + (240 * 60); $e = $e + 20 * 60) {
                error_log($e);
                /*            $timeSlotAM = strtotime(date("H:i", mktime(8, $e, 0, $_POST['currentDate'])));*/
                $tab_available[] = $e;

            }

            /*for ($i = $_POST['currentDate'] + 240*60; $i <= $_POST['currentDate']+ 480*60; $i = $i + 20*60) {*/

            /* $timeSlotPM = strtotime(date("H:i", mktime(14, $i, 0, $_POST['currentDate'])));*/
            /*$tab_available[] = $i;*/

            /*}*/
            /*        error_log(json_encode($tab_available));
                    error_log(count($tab_available));*/

            /*        error_log(json_encode($tab_reserved));

                    if (in_array($tab_reserved, (array)$tab_available)) {
                        foreach ($tab_reserved as $item) {
                            $tab_available = array_diff($tab_available, array($item));
                        }
                    }*/

            /*Génération des slots dispos suite comparaison des tab_available et reserved*/

            foreach ($tab_available as $item) {

                $tab_display[] = $item;

                $htmlSlot .= HTML::timeSlot($item, date("H:i", $item));

            }
            /*        error_log(json_encode($htmlSlot));*/
            /*        error_log($html);*/
        }

        echo json_encode(array("html" => $html, "htmlSlot" => $htmlSlot));

        break;


    case 'slotTimeClick':

        setlocale(LC_TIME, "fr_FR", "French");
        /*        $currentTimeSlot = RDV::checkCurrentTimeSlot($_POST['timeSlotID']);*/
        $user = new User(decrypt($_SESSION['id']));

        /*        $timeSlotID = $currentTimeSlot['id'];*/
        $user = $user->getLogin();
        error_log($user);
        $slotTime = date("H:i", $_POST['slotID']);
        $dateSelect = strftime("%A %d %B %G", $_POST['slotID']);

        echo json_encode(array("user" => $user, "slotTime" => $slotTime, "dateSelect" => $dateSelect));

        break;

    case 'createNews':

        error_log($_POST['content']);
        error_log($_POST['title']);
        Newsletter::createNews($_POST['title'], [], $_POST['content']);
        $msg = "Success!";
        $status = 1;

        echo json_encode(array("msg" => $msg, "status" => $status));

        break;

    case 'newAppointment':

        $newRDV = "";
        error_log($_POST['expertID']);
        error_log($_POST['timeslotID']);
        error_log(strtotime($_POST['timeslotID']));
        error_log($_SESSION['id']);
        error_log($_POST['newsletter']);

        if (empty($_POST['expertID'])) {

            $status = 0;
            $msg = "Veuillez renseigner un ID expert!";

            /*        } elseif (empty($_POST['timeslotID'])) {

                        $status = 0;
                        $msg = "Veuillez renseigner un ID user!";*/

        } else {

            $newRDV = RDV::createRdv($_POST['expertID'], decrypt($_SESSION['id']), strtotime($_POST['timeslotID']));
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
        /*        error_log("Page " . $_POST['page']);*/
        $off7 = ($currentPage - 1) * 10;
        /*        error_log('Calcul off7 = ' . $off7);*/
        $rdvPage = RDV::rdvPerPages($off7);
        $allRdv = RDV::checkAllRdv();
        /*        error_log(json_encode($rdvPage));
                error_log(json_encode($allRdv));*/
        $totalPages = ceil($allRdv / 10);
        /*        error_log("Total pages = " . $totalPages);*/

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
        $user = new User(decrypt($_SESSION['id']));

        $rdvID = $currentRdv['id'];
        $expertID = $currentRdv['expert_id'];
        $userID = $currentRdv['user_id'];
        $timeSlotID = strftime("%A %d %B %G" . " à " . "%H" . "h" . "%M", $currentRdv['time_slot_id']);
        $bookedDate = $currentRdv['booked_date'];

        /*        $checkPayment = json_decode($currentRdv['payment'], true);*/

        echo json_encode(array("rdvID" => $rdvID, "expertID" => $expertID, "timeslotID" => $timeSlotID, "bookedDate" => $bookedDate, "userID" => $userID, "userLogin" => $user->getLogin()));

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

