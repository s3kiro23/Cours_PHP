<?php session_start();

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $_SESSION['login'] = $_POST['login'];

        if ($_POST['login'] != "a@g.c"){

            $status = 0;
            $msg = "Utilisateur incorrect!";

        }

        if ($_POST['password'] != "123"){

            $status = 0;
            $msg = "Mot de passe incorrect!";

        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;  

    case 'logout':

        if (isset($_GET['action']) && $_GET['action'] == 'logout'){

            $status = 1;
            $msg = "Déconnexion réussi!";

            session_destroy();
            unset($_SESSION);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    case 'login' :

        $login = $_SESSION ['login'];

        echo json_encode(array("login" => $login));

    break;

    default :

    echo json_encode(1);

    break;

}

?>