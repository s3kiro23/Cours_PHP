<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aflokkat INIT PHP</title>
</head>
<body>
<?php
    session_start();
    setcookie('user_login', '', time()+3600*24, '', '', false, true);        
?>

<!-- ======================================== -->

    <!-- Exo 2 -->

    <!-- <?php
     
    // $nom = "JM";
    // $age = 17;
    // $histoire = 9;
    // $math = 9;
    // $anglais = 9;
    // $somme = $histoire + $math + $anglais;
    // $dec = "mineur!<br><br>";
    // $année = "Essai l'année prochaine!<br><br>";

    
    // if ($age >= 18 && $somme >= 30){
    //     $dec = "majeur<br><br>";
    // }
    
    // if ($somme >= 30){
    //     $année = "J'ai mon année!<br><br>";
    // }

    // echo "Bonjour ".$nom."! <br><br> Tu as ".$age." ans, tu es connecté et ".$dec.$année."Moyenne G = ".$somme/3;

    ?> -->

<!-- ============================================= -->

    <!-- Exo 3 -->
    <!-- <?php

    // $lait = 10;
    // $sucre = 20;
    // $comp = "Quantité de lait supérieur au sucre";
    // $vide = "Un des deux variables est vide !<br><br>";
    
    // if (!empty($lait) && !empty($sucre)){  
    //     if ($lait > $sucre){
    //         echo $comp;
    //     }       
    //     elseif ($lait < $sucre){
    //         echo $comp = "Quantité de lait inférieur au sucre";
    //     }
    //     else {
    //         echo $comp = "Quantité de lait égale au sucre";
    //     }     
    //     if ($lait + $sucre > 0){
    //         $total = $lait + $sucre;
    //     }    
    //     if (isset($total)){
    //         echo "<br><br>".$total." ingrédients";
    //     }
    // }
    // else{
    //     echo $vide;
    // }

    ?> -->

<!-- ================================================ -->

    <!-- Exo 4 -->

    <!-- <table align="center"style='border: 1px solid black'>
        <thead >
            <tr>
                <th><img src="/start.png" alt="startimg"></th>
            </tr>
        </thead>
        <tbody >

    <!- <?php

    // $pilotes = 0;

    // while ($pilotes < 4){

    //     $pilotes+=1;
    //     if ($pilotes%2 != 0){
    //         echo "<tr> 
    //                 <td style='color:blue'>pilote".$pilotes."</td>
    //                 <td></td>
    //             </tr>";
    //     }
    //     else{
    //         echo "<tr> 
    //                 <td></td>
    //                 <td style='color:red'>pilote".$pilotes."</td>
    //             </tr>";
    //     }
    // }

    // for ($pilotes = 5; $pilotes <= 8; $pilotes++){

    //     if ($pilotes%2 != 0){
    //         echo "<tr>
    //                 <td style='color:blue'>pilote $pilotes</td>
    //                 <td></td>
    //             </tr>";            
    //     }
    //     else{
    //         echo "<tr>
    //                 <td></td>
    //                 <td style='color:red'>pilote $pilotes</td>
    //             </tr>";            
    //     }
    // }  
      
    ?> -->

        <!-- </tbody>
    </table> -->
    
<!-- ===========================================   -->
    
    <!-- Exo 5 -->
    
    <!-- <?php

    // echo "<div><img class='start' src='img/start.png' alt='zeze'></div>".
    // "<table align='center'>
    // <tbody >";

    // $all_pilotes = array('LECLERC','ALONZO','VERSTAPPEN','GASLI','HAMILTON','RUSSELL','PEREZ','NORRIS');
    // $count = 0;

    // foreach ($all_pilotes as $pilote){
    //     if ($count%2 != 0){
    //         echo "<tr align='center'>
    //                 <td><img class='f1' src='img/F1.webp' alt='f1'></td>
    //                 <td style='color:blue'>$pilote</td>
    //             </tr>";            
    //     }
    //     else{
    //         echo "<tr align='center'>
    //                 <td style='color:red'>$pilote</td>
    //                 <td><img class='f1' src='img/F1.webp' alt='f1'></td>
    //             </tr>";            
    //     }
    //     $count++;
    // }

    // echo "</tbody></table>"

    ?> -->

<!-- ========================================= -->

    <!-- Exo 6 -->

    <!-- <?php

    // $manCity = [
    //     'Gardien' =>[
    //         '31' => 'Ederson'
    //     ],
    //     'Defenseurs' => [ 
    //         '16' => 'Rodrigo', '17' => 'De Bruyne', 
    //         '21' => 'Silva', '25' => 'Fernandinho'
    //     ],
    //     'Milieux' => [
    //         '8' => 'Gündogan', '16' => 'Rodrigo', 
    //         '2' => 'Walker',
    //     ],
    //     'Attaquants' => [
    //         '26' => 'Mahrez', '9' => 'Jesus', 
    //         '7' => 'Sterling'
    //     ]
    // ];

    // echo "<table align='center' ><tr>";

    // foreach($manCity as $poste => $joueurs){

    //     foreach($joueurs as $numero => $joueur){

    //         echo "<tr>
    //                 <td>$numero $joueur</td>
    //             </tr>";
    //     }
    // }

    ?> -->

<!-- =========================================== -->

    <!-- Exo 7 -->
    
    <!-- <?php

    // echo "<h1>Liste des cours</h1>";

    // function display_lesson($int, $duration){

    //     echo "le cours concerne ".$int.". Au total, il va durer ".$duration." heures.<br>"; 

    // }

    // display_lesson("PHP", 35);
    // display_lesson("JS", 20);
    // display_lesson("HTML", 20);
    // display_lesson("Algo", 40);


    // // Avec une boucle foreach

    // $lessons = [
    //     'PHP' => 35,
    //     'JS' => 20,
    //     'HTML' => 20,
    //     'Algo' => 40
    // ];

    // echo "<h1>Avec une boucle foreach</h1>";

    // foreach ($lessons as $lesson => $duration){

    //     display_lesson($lesson, $duration);

    // }

    ?> -->

<!-- ======================================= -->

    <!-- Exo 8 -->

    <!-- <?php

    // function compare($var1, $var2){
    //     $sup = $var2;
        
    //     if ($var1 > $var2){       
    //         $sup = $var1;
    //     }
    //     else if ($var1 == $var2){
    //         $sup = "<b>'valeurs égales'</b>";
    //     }
        
    //     return $sup;
    // }

    // $max = 0;
    // for ($i = 0; $i < 10; $i++){   
    //     $var1 = rand(0,100);
    //     $var2 = rand(0,100);

    //     $biggest = compare($var1, $var2);
    //     $max = compare($biggest, $max);

    //     echo $biggest."<br>";
    // }

    // echo "<br>La valeur max des itérations est : ".$max; 

    ?> -->

    <!-- Exo 9 -->

    <?php

    function is_logged(){

        return isset($_SESSION['login']);

    }

    function get_login(){

        if (is_logged()){
            
            return $_SESSION['login'];

        }

    }

    ?>

    <?php

    $login = "sekiro";
    $pwd = "zaire";
    
    if (isset($_POST['login']) && isset($_POST['pwd'])) {
        
        if ($_POST['login'] == $login && $_POST['pwd'] == $pwd){

            $_SESSION['login'] = $login;
            $hash = password_hash($pwd, PASSWORD_BCRYPT);
            $value = $_SESSION['login']."|".$hash;
            $_COOKIE['user_login'] = $value;

        }

        else{

            $error = "<div style='justify-content-center'><b>Erreur login / mot de passe !</b></div>";

        }

    }

    elseif (isset($_GET['action']) && $_GET['action'] == 'logout'){

        unset($_COOKIE);
        session_destroy();
        unset($_SESSION);

    }

    ?>  

    <?php

    if (!is_logged()){

        if (!empty($error)){

            echo $error.'<br><br>';

        }

    ?>

        <form class='container' action='index.php' method='POST'>
            <h2>Login</h2>
            <div class='login'>
                <label for='login'></label>
                <input type='text' name='login' placeholder='Login'>
            </div>
            <div class='pwd'>
                <label for='pwd'></label>
                <input type='password' name='pwd' id='pwd' placeholder='Password'>
            </div>
            <button type='submit'>Connexion</button>
        </form> 

    <?php       
        
    } 

    else {

    ?>

        Bienvenue <b>

    <?php 

        if (isset($_COOKIE['user_login']) && password_verify($pwd, $hash)){
    
            $user_login = explode("|", $_COOKIE['user_login']);
            echo $user_login[0];

        }

    ?>

        </b> !
        <br>
        <br>
        <a href="?action=logout"><button>Logout</button></a>

    <?php }  ?>

</body>
</html>