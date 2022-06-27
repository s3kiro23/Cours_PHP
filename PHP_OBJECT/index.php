<?php

spl_autoload_register(function ($classe){
    require $classe.'.php';
});

$items = [];
$items[] = new Vetement('(REF0001)', 'T-shirt bleu', 50, 5);
$items[] = new Vetement('(REF0002)', 'Pull rouge', 80, 4);
$items[] = new Chaussure('(REF0003)', 'Adidas Stan Smith', 90, 7, 42);

foreach ($items as $index => $item){

    try {
        if ($index == 0) {
            $item->setPrix(-1);
        }
        else {
            $item->setQuantite(-1);
        }  
    }

    catch (PrixException $e) {
        echo $e->getMessage();
    }

    catch (QuantiteException $e) {
        echo $e->getMessage();
        
    }

    echo $item;

}