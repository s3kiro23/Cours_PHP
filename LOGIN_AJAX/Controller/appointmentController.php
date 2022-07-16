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

    case 'dateRDV':

        setlocale(LC_TIME, "fr_FR", "French");
        $dateToConvert = date('Y-m-d'); // Date du jour
        $dateF = strftime("%A %d %B %G", strtotime($dateToConvert));
        error_log($dateF);

        echo json_encode(array("date" => $dateF));

        break;

    case 'dayCases':

        $html = HTML::dayCases();

        echo json_encode(array("html" => $html));

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
