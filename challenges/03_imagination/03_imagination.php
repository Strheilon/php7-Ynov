<?php

$argv;
$quiche_lorraine = "quiche_lorraine";
$tagliatelle_carbo = "tagliatelle_carbo";


if ($argv[1] == $quiche_lorraine){
    switch ($argv[2]) {
        case 'info':
            print "\nQuiche Lorraine : entrée alsacienne.\n";
            break;
        case 'part':
            print "\nElle peut très bien être faite pour 4, pour 8 et même pour 1 seule personne.\n";
            break;
        case 'ingredients':
            print "\nLardons, crème, oeuf, lait, farine, sel et fromage sont les principaux ingrédients d'une Quiche Lorraine.\n";
            break;
    }
} elseif ($argv[1] == $tagliatelle_carbo){
    switch ($argv[2]) {
        case 'info':
            print "\nTagliatelles à la Carbonnara : plat italien.\n";
            break;
        case 'part':
            print "\nElles sont généralement servis pour 1 seule personne mais peut être cuisinées pour plusieurs personnes.\n";
            break;
        case 'ingredients':
            print "\nLardons, crème et oeuf sont les principaux ingrédients des Tagliatelles Carbonnara.\n";
            break;
    }
} else {
    print "\nCe que vous demander n'est pas disponible.\n";
}
