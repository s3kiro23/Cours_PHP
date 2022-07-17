<?php session_start();
require_once '../Entity/function.php';
require_once '../Entity/User.php';
require_once '../Entity/Database.php';
require_once '../Entity/Log.php';
require_once '../Entity/HTML.php';
require_once '../Entity/Command.php';
require_once '../Entity/RDV.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']) {

    case 'dayCases':

        setlocale(LC_TIME, "fr_FR", "French");
        $currentDate = date('Y-m-d'); // Date du jour
        $nbWeek = date('W',strtotime($currentDate));
        error_log($nbWeek);
        $week = [0,1,2,3,4,5,6,7]; // lien BDD champ weekday compte le nombre de jours?
        $weekday = 0;
        $html = "";
        $htmlSlot = "";
/*        $timeSlotCheck = RDV::checkCurrentTimeSlot(2);*/
/*        $allTimeSlot = json_decode($timeSlotCheck['hour'], true);*/
/*        error_log($allTimeSlot[0]);*/
        $slotInterval = 0;
        $limit = 31;
        $interval = 0;
        $slotTime = "";
        $updateDate = "";

        foreach ($week as $day) {

            $updatedDate = strftime("%A %d %B %G", strtotime($currentDate.'+'.$weekday.' day'));
            $html .= HTML::dayCases($updatedDate);
            $weekday++;


        }

        while ($limit != 0) {

            $slotTime = date("H:i", mktime(8, $interval, 0));
            $timeStampID = strtotime(date("H:i", mktime(8, $interval, 0)));
            /*            $updateDate = date("H:i", mktime(8, $interval, 0, date("m"), date("d") + $weekday, date("Y"))) . "<br>";*/

            if ($limit%4 == 0){

                $htmlSlot .= HTML::timeSlot($timeStampID, $slotTime).'<br>';

            } else {

                $htmlSlot .= HTML::timeSlot($timeStampID, $slotTime);

            }
            $limit--;
            $interval += 20;

        }
/*        foreach ($allTimeSlot as $timeSlot){

            $htmlSlot .= HTML::timeSlot($timeSlotCheck['id'], $allTimeSlot[$slotInterval]);
            $slotInterval++;

        }*/

        echo json_encode(array("html" => $html, "htmlSlot" => $htmlSlot));

        break;

    case 'slotTimeClick':

        /*        $currentTimeSlot = RDV::checkCurrentTimeSlot($_POST['timeSlotID']);*/
        $user = new User(decrypt($_SESSION['id']));
        /*        $timeSlotID = $currentTimeSlot['id'];*/
        $user = $user->getLogin();



        echo json_encode(array("user" => $user));

        break;

    case 'newAppointment':

        $newRDV = "";
        error_log($_POST['expertID']);
        error_log($_POST['timeslotID']);
        error_log($_SESSION['id']);

        if (empty($_POST['expertID'])) {

            $status = 0;
            $msg = "Veuillez renseigner un ID expert!";

        } elseif (empty($_POST['timeslotID'])) {

            $status = 0;
            $msg = "Veuillez renseigner un ID user!";

        } else {

            $newRDV = RDV::createRdv($_POST['expertID'], decrypt($_SESSION['id']), $_POST['timeslotID']);
            $status = 1;
            $msg = "Nouveau rendez-vous créé avec l'ID n° " . $newRDV . " !";

        }

        echo json_encode(array("msg" => $msg, "status" => $status));

        break;

    case 'rdvCases':

        $msg = "";
        $html = "";
        $paginationHTML = "";
        $currentPage = $_POST['page'];
        error_log("Page " . $_POST['page']);
        $off7 = ($currentPage - 1) * 10;
        error_log('Calcul off7 = ' . $off7);
        $rdvPage = RDV::rdvPerPages($off7);
        $allRdv = RDV::checkAllRdv();
        error_log(json_encode($rdvPage));
        error_log(json_encode($allRdv));
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
        $currentRdv = RDV::checkCurrentRdv($_POST['rdvID']);
        $user = new User(decrypt($_SESSION['id']));

        $rdvID = $currentRdv['id'];
        $expertID = $currentRdv['expert_id'];
        $userID = $currentRdv['user_id'];
        $timeSlotID = $currentRdv['time_slot_id'];
        $bookedDate = $currentRdv['booked_date'];

        /*        $checkPayment = json_decode($currentRdv['payment'], true);*/

        echo json_encode(array("rdvID" => $rdvID, "expertID" => $expertID, "timeslotID" => $timeSlotID, "bookedDate" => $bookedDate, "userID" => $userID, "userLogin" => $user->getLogin()));

        break;
}
