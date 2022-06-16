<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    

    <!-- Exo 2 -->
    <!-- <?php
     
    $nom = "JM";
    $age = 17;
    $histoire = 9;
    $math = 9;
    $anglais = 9;
    $somme = $histoire + $math + $anglais;
    $dec = "mineur!<br><br>";
    $année = "Essai l'année prochaine!<br><br>";

    
    if ($age >= 18 && $somme >= 30){
        $dec = "majeur<br><br>";
    }
    
    if ($somme >= 30){
        $année = "J'ai mon année!<br><br>";
    }

    echo "Bonjour ".$nom."! <br><br> Tu as ".$age." ans, tu es connecté et ".$dec.$année."Moyenne G = ".$somme/3;

    ?> -->


    <!-- Exo 3 -->
    <?php

    $lait = 10;
    $sucre = 20;
    $comp = "Quantité de lait supérieur au sucre";
    $vide = "Un des deux variables est vide !<br><br>";
    
    if (!empty($lait) && !empty($sucre)){  
        if ($lait > $sucre){
            echo $comp;
        }       
        elseif ($lait < $sucre){
            echo $comp = "Quantité de lait inférieur au sucre";
        }
        else {
            echo $comp = "Quantité de lait égale au sucre";
        }     
        if ($lait + $sucre > 0){
            $total = $lait + $sucre;
        }    
        if (isset($total)){
            echo "<br><br>".$total." ingrédients";
        }
    }
    else{
        echo $vide;
    }

    ?>
</body>
</html>