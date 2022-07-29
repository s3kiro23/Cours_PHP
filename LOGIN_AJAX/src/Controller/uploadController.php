<?php session_start();

require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

if (isset($_FILES['file']) && !empty($_FILES['file'])) {

    error_log(json_encode($_FILES));

    $msg = "";
    $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
    $status = 0;

    if ($_FILES['file']['error'] != 4) {

        $target_dir = "../../upload/";
        $fileName = basename($_FILES['file']['name']);
        $target_file = $target_dir . $fileName;
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        error_log($fileType);

        $randID = random_int(100000, 500000);
        error_log($randID);

        if (in_array($fileType, $allowTypes)) {

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $randID . "_" . $_FILES['file']['name'])) {

                $uploadedFile = $randID . "_" . $_FILES['file']['name'];
                error_log($uploadedFile);
                $msg = "Upload réalisé avec succès!";
                $status = 1;

            } else {

                $msg = "Erreur lors de l'upload du fichier!";

            }
        } else {

            $msg = "Erreur, seulement les extensions " . implode('/', $allowTypes) . "sont autorisés pour l'upload!";

        }

        if ($status == 1) {

            Upload::uploadFile($uploadedFile, decrypt($_SESSION['id']));

        }

    }
    error_log($status);
    error_log($msg);

    echo json_encode(array("status" => $status, "msg" => $msg));

}
