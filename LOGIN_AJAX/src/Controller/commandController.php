<?php session_start();
require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']) {

    case 'newCommand':

        /*        error_log($_POST['payment']);*/

        if (empty($_POST['type'])) {

            $status = 0;
            $msg = "Veuillez sélectionner un type de commande!";

        } else {

            $newCmd = Command::createCmd($_POST['title'], $_POST['label'], $_POST['type'], $_POST['payment'], decrypt($_SESSION['id']));
            $status = 1;
            $msg = "Nouvelle commande créée avec l'ID de commande n° " . $newCmd . " !";

            error_log($_POST['login']);
            write_logs(($_POST['login']), 5);

        }

        echo json_encode(array("msg" => $msg, "status" => $status));

        break;

    case 'listCommands':

        $msg = "";
        $html = "";
        $paginationHTML = "";
        $currentPage = $_POST['page'];
        /*        error_log("Page " . $_POST['page']);*/
        $off7 = ($currentPage - 1) * 10;
        /*        error_log('Calcul off7 = ' . $off7);*/
        $cmdPage = Command::cmdPerPages($off7);
        $allCmd = Command::checkAllCmd();
        /*              error_log(json_encode($cmdPage));*/
        /*                error_log(json_encode($allCmd));*/
        $totalPages = ceil($allCmd / 10);
        /*        error_log("Total pages = " . $totalPages);*/

        if (is_array($cmdPage) || is_object($cmdPage)) {
            foreach ($cmdPage as $cmd) {

                $html .= HTML::displayAllCmd($cmd);

            }
        } else {
            $msg = "Erreur lors de la récupération de la liste des commandes";
        }

        for ($i = 1; $i <= $totalPages; $i++) {

            $paginationHTML .= HTML::cmdPages($i, $i);

        }

        echo json_encode(array("html" => $html, "msg" => $msg, "paginationHTML" => $paginationHTML, "totalPages" => $totalPages));

        break;

    case 'showInfo':

        $currentCmd = Command::checkCurrentCmd($_POST['cmdID']);
        $user = new User(decrypt($_SESSION['id']));

        $cmdID = $currentCmd['id'];
        $title = $currentCmd['title'];
        $label = $currentCmd['label'];
        $type = $currentCmd['type'];

        $checkPayment = json_decode($currentCmd['payment'], true);
        $allPayment = "";

        if (is_array($checkPayment) || is_object($checkPayment)) {
            foreach ($checkPayment as $payment) {
                $allPayment .= $payment . " ";
            }
        } else {
            $msg = "Erreur lors de la récupération de la liste des commandes";
        }

        $date = $currentCmd['date'];
        $client = $user->getLogin();

        echo json_encode(array("cmdID" => $cmdID, "title" => $title, "label" => $label, "type" => $type, "allPayment" => $allPayment, "date" => $date, "client" => $client));

        break;

    case 'to_beta':

        $msg = "Redirection vers la page de rdv beta!";

        echo json_encode(array("msg" => $msg));

        break;

    case 'to_alpha':

        $msg = "Redirection vers la page de rdv alpha!";

        echo json_encode(array("msg" => $msg));

        break;

}



