<?php

switch($_POST['request']){

	case 'connexion':

		$status = 1;
		$msg = "Connexion OK!";

		if($_POST['password'] != "123"){

			$status = 0;
			$msg = "Mot de passe incorrect";

		}

		if($_POST['login'] != "sylvain"){

			$status = 0;
			$msg = "Login incorrect";

		}

		echo json_encode(array("status" => $status, "msg" => $msg ));

	break;

	case 'connexion2':

	$data = json_decode($_POST['dataConnect'],true);

	$status = 1;
	$msg = "Connexion OK!";

	if($data['login'] != "sylvain"){

		$status = 0;
		$msg = "Login incorrect";

	}

	if($data['passwd'] != "123"){

		$status = 0;
		$msg = "Mot de passe incorrect";

  	}

	echo json_encode(array("status" => $status, "msg" => $msg ));

	break;


	default :

	echo json_encode(1) ;
	
	break;
}