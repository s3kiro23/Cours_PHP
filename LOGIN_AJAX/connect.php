<?php

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";

        if ($_POST['login'] != "zetsu@zen.fr"){

            $status = 0;
            $msg = "Utilisateur incorrect!";

        }

        if ($_POST['password'] != "zaire"){

            $status = 0;
            $msg = "Mot de passe incorrect!";
        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    default :

    echo json_encode(1);

    break;

}

?>