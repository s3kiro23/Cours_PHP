<?php
require_once "../Entity/Database.php";

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch ($_POST['request']) {
    case'ctOk':
        $compte_rendu = array();
        echo json_encode("controle technique ok");


        if (empty($_POST['frein_Service']) == false) {
            $compte_rendu['frein_Service'] = $_POST['frein_Service'];
            // array_push($compte_rendu, $freinDeService);
        }
        if (!empty($_POST['frein_Stationnement'])) {
            $compte_rendu['frein_Stationnement'] = $_POST['frein_Stationnement'];
            // array_push($compte_rendu, $freinDeStationnement);
        }
        if (!empty($_POST['pedale_Frein'])) {
            $compte_rendu['pedale_Frein'] = $_POST['pedale_Frein'];
            // array_push($compte_rendu, $pedaleDeFrein);
        }
        if (!empty($_POST['disque_Frein'])) {
            $compte_rendu['disque_Frein'] = $_POST['disque_Frein'];
            // array_push($compte_rendu, $disqueDeFrein);
        }
        if (!empty($_POST['volant_Direction'])) {
            $compte_rendu['volant_Direction'] = $_POST['volant_Direction'];
            // array_push($compte_rendu, $volantDeDirection);
        }
        if (!empty($_POST['colonne_Direction'])) {
            $compte_rendu['colonne_Direction'] = $_POST['colonne_Direction'];
            // array_push($compte_rendu, $colonneDeDirection);
        }
        if (!empty($_POST['_pompe'])) {
            $compte_rendu['_pompe'] = $_POST['_pompe'];
            // array_push($compte_rendu, $pompe);
        }
        if (!empty($_POST['pare_Brise'])) {
            $compte_rendu['pare_Brise'] = $_POST['pare_Brise'];
            // array_push($compte_rendu, $pareBrise);
        }
        if (!empty($_POST['_retro'])) {
            $compte_rendu['_retro'] = $_POST['_retro'];
            // array_push($compte_rendu, $retro);
        }
        if (!empty($_POST['essuie_Glace'])) {
            $compte_rendu['essuie_Glace'] = $_POST['essuie_Glace'];
            // array_push($compte_rendu, $essuieGlace);
        }
        if (!empty($_POST['feu_Route'])) {
            $compte_rendu['feu_Route'] = $_POST['feu_Route'];
            // array_push($compte_rendu, $feuRoute);
        }
        if (!empty($_POST['feu_Croisement'])) {
            $compte_rendu['feu_Croisement'] = $_POST['feu_Croisement'];
            // array_push($compte_rendu, $feuCroisement);
        }
        if (!empty($_POST['signale_Detresse'])) {
            $compte_rendu['signale_Detresse'] = $_POST['signale_Detresse'];
            // array_push($compte_rendu, $signaleDetresse);
        }
        if (!empty($_POST['_plancher'])) {
            $compte_rendu['_plancher'] = $_POST['_plancher'];
            // array_push($compte_rendu, $plancher) ;
        }
        if (!empty($_POST['_coque'])) {
            $compte_rendu['_coque'] = $_POST['_coque'];
            // array_push($compte_rendu, $coque);
        }
        if (!empty($_POST['_chassis'])) {
            $compte_rendu['_chassis'] = $_POST['_chassis'];
            // array_push($compte_rendu,$chassis);

        }
        if (!empty($_POST['_aile'])) {
            $compte_rendu['_aile'] = $_POST['_aile'];
            // array_push($compte_rendu, $aile);
        }
        if (!empty($_POST['_moteur'])) {
            $compte_rendu['_moteur'] = $_POST['_moteur'];
            // array_push($compte_rendu, $moteur);
        }
        if (!empty($_POST['_boiteVitesse'])) {
            $compte_rendu['_boiteVitesse'] = $_POST['_boiteVitesse'];
            // array_push($compte_rendu, $boiteVitesse );
        }
        if (!empty($_POST['_transmission'])) {
            $compte_rendu['_transmission'] = $_POST['_transmission'];
            // array_push($compte_rendu, $transmission);
        }

        $json = json_encode($compte_rendu);

        error_log(json_encode($compte_rendu));
        error_log($json);


        $requete = "UPDATE `controle_tech` SET `state`= 3,  `compte_rendu` = '" . $json . "'  WHERE `id_controle`='" . $_POST["id_controle"] . "'";
        error_log($requete);
        mysqli_query($GLOBALS['Database'], $requete) or die;

        break;


    case'ctNotOk':
        $msg = "Certains points sont à revoir ";
        $compte_rendu = array();
        error_log(json_encode($_POST));


        if (empty($_POST['frein_Service']) == false) {
            $compte_rendu['frein_Service'] = $_POST['frein_Service'];
            // array_push($compte_rendu, $freinDeService);
        }
        if (!empty($_POST['frein_Stationnement'])) {
            $compte_rendu['frein_Stationnement'] = $_POST['frein_Stationnement'];
            // array_push($compte_rendu, $freinDeStationnement);
        }
        if (!empty($_POST['pedale_Frein'])) {
            $compte_rendu['pedale_Frein'] = $_POST['pedale_Frein'];
            // array_push($compte_rendu, $pedaleDeFrein);
        }
        if (!empty($_POST['disque_Frein'])) {
            $compte_rendu['disque_Frein'] = $_POST['disque_Frein'];
            // array_push($compte_rendu, $disqueDeFrein);
        }
        if (!empty($_POST['volant_Direction'])) {
            $compte_rendu['volant_Direction'] = $_POST['volant_Direction'];
            // array_push($compte_rendu, $volantDeDirection);
        }
        if (!empty($_POST['colonne_Direction'])) {
            $compte_rendu['colonne_Direction'] = $_POST['colonne_Direction'];
            // array_push($compte_rendu, $colonneDeDirection);
        }
        if (!empty($_POST['_pompe'])) {
            $compte_rendu['_pompe'] = $_POST['_pompe'];
            // array_push($compte_rendu, $pompe);
        }
        if (!empty($_POST['pare_Brise'])) {
            $compte_rendu['pare_Brise'] = $_POST['pare_Brise'];
            // array_push($compte_rendu, $pareBrise);
        }
        if (!empty($_POST['_retro'])) {
            $compte_rendu['_retro'] = $_POST['_retro'];
            // array_push($compte_rendu, $retro);
        }
        if (!empty($_POST['essuie_Glace'])) {
            $compte_rendu['essuie_Glace'] = $_POST['essuie_Glace'];
            // array_push($compte_rendu, $essuieGlace);
        }
        if (!empty($_POST['feu_Route'])) {
            $compte_rendu['feu_Route'] = $_POST['feu_Route'];
            // array_push($compte_rendu, $feuRoute);
        }
        if (!empty($_POST['feu_Croisement'])) {
            $compte_rendu['feu_Croisement'] = $_POST['feu_Croisement'];
            // array_push($compte_rendu, $feuCroisement);
        }
        if (!empty($_POST['signale_Detresse'])) {
            $compte_rendu['signale_Detresse'] = $_POST['signale_Detresse'];
            // array_push($compte_rendu, $signaleDetresse);
        }
        if (!empty($_POST['_plancher'])) {
            $compte_rendu['_plancher'] = $_POST['_plancher'];
            // array_push($compte_rendu, $plancher) ;
        }
        if (!empty($_POST['_coque'])) {
            $compte_rendu['_coque'] = $_POST['_coque'];
            // array_push($compte_rendu, $coque);
        }
        if (!empty($_POST['_chassis'])) {
            $compte_rendu['_chassis'] = $_POST['_chassis'];
            // array_push($compte_rendu,$chassis);

        }
        if (!empty($_POST['_aile'])) {
            $compte_rendu['_aile'] = $_POST['_aile'];
            // array_push($compte_rendu, $aile);
        }
        if (!empty($_POST['_moteur'])) {
            $compte_rendu['_moteur'] = $_POST['_moteur'];
            // array_push($compte_rendu, $moteur);
        }
        if (!empty($_POST['_boiteVitesse'])) {
            $compte_rendu['_boiteVitesse'] = $_POST['_boiteVitesse'];
            // array_push($compte_rendu, $boiteVitesse );
        }
        if (!empty($_POST['_transmission'])) {
            $compte_rendu['_transmission'] = $_POST['_transmission'];
            // array_push($compte_rendu, $transmission);
        }

        $json = json_encode($compte_rendu);

        error_log(json_encode($compte_rendu));
        error_log($json);

        $requete = "UPDATE `controle_tech` SET `state`= 2, `compte_rendu` = '" . $json . "' WHERE `id_controle`='" . $_POST["id_controle"] . "'";
        error_log($requete);
        mysqli_query($GLOBALS['Database'], $requete) or die;

        echo json_encode(array("msg" => $msg));

        break;


}

