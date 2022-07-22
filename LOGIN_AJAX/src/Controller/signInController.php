<?php session_start();

require_once '../Controller/shared.php';

spl_autoload_register(function ($classe) {
    require '../Entity/' . $classe . '.php';
});


$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']) {

    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));

        break;

    case 'to_logIn' :

        $msg = "Redirection vers la page de connexion en cours!";

        echo json_encode(array("msg" => $msg));

        break;


    case 'signIn' :

        $status = 1;
        $msg = "Création de votre compte réussi, Enjoy :D !";
        $user = User::checkUser($_POST['login']);

        if (checkField()) {

            $status = 0;
            $msg = "Le champ " . checkField() . " est vide !";

        } else if (!checkPassword($_POST['passwd'], $_POST['passwd2'])) {

            $status = 0;
            $msg = "Les mots de passe ne correspondent pas!";

        } else if (!checkCaptcha($_POST['checkCap'], $_POST['captcha'])) {

            $status = 0;
            $msg = "Les captcha ne correspondent pas!";

        } else if ($user) {
            $status = 0;
            $msg = "Le login existe déjà!";
        }


        /*        else if (!checkPasswdLenght($_POST['passwd'])){

                    $status = 0;
                    $msg = "Condition de création du mot de passe non remplies!";

                }*/

        if ($status == 1) {
            $currenPwdExp = date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
            $utilisateur = User::create($_POST['login'], $_POST['nom'], $_POST['prenom'], $_POST['type'], $_POST['passwd'], $currenPwdExp, date("Y-m-d H:i:s"), User::random_hash());
            $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE login=?');
            $query->execute([$_POST['login']]);
            $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = encrypt($utilisateur['id']);

            $log_path = 'login_logout.txt';
            file_put_contents($log_path, "\n " . dateJour() . " " . get_login() . " a créé un nouveau compte.", FILE_APPEND);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));

        break;

}



