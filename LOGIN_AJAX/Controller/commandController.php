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

    case 'newCommand':

        $newCmd = Command::createCmd($_POST['title'], $_POST['label'], decrypt($_SESSION['id']));
        $msg = "Nouvelle commande créée avec l'ID de commande n° " . $newCmd . " !";
        error_log($_POST['login']);
        write_logs(($_POST['login']), 5);

        echo json_encode(array("msg" => $msg));

        break;

    case 'listCommands':

        $msg = "";
        $html = "";
        $paginationHTML = "";
        $currentPage = $_POST['page'];
        error_log("Page " . $_POST['page']);
        $off7 = ($currentPage - 1) * 10;
        error_log('Calcul off7 = ' . $off7);
        $cmdPage = Command::cmdPerPages($off7);
        $allCmd = Command::checkAllCmd();
        /*      error_log(json_encode($cmdPage));
                error_log(json_encode($allCmd));*/
        $totalPages = ceil($allCmd / 10);
        error_log("Total pages = " . $totalPages);

        if (is_array($cmdPage) || is_object($cmdPage)) {
            foreach ($cmdPage as $cmd) {

                $html .= HTML::displayAllCmd($cmd);

            }
        } else {
            $msg = "Erreur lors de la récupération de la liste des commandes";
        }

        for ($i = 1; $i <= $totalPages; $i++) {

            $paginationHTML .= HTML::pages($i, $i);

        }

        echo json_encode(array("html" => $html, "msg" => $msg, "paginationHTML" => $paginationHTML, "totalPages" => $totalPages));

        break;

    case 'showInfo':

        $currentCmd = Command::checkCurrentCmd($_POST['cmdID']);
        $user = new User(decrypt($_SESSION['id']));

        $cmdID = $currentCmd['id'];
        $title = $currentCmd['title'];
        $label = $currentCmd['label'];
        $date = $currentCmd['date'];
        $client = $user->getLogin();

        echo json_encode(array("cmdID" => $cmdID, "title" => $title, "label" => $label, "date" => $date, "client" => $client));

        break;

}



