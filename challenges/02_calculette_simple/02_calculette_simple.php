<?php

$argv;
$result;

if(is_numeric($argv[1]) == true && is_numeric($argv[3]) == true){
    switch ($argv[2]){
        case "/" :
            if($argv[3] == 0) {
                print "Impossible de diviser par zéro. \n";
            } else {
                $result = $argv[1]/$argv[3];
                print "Le resultat est : " . $result ."\n";
            }
            break;
        case "*" :
            $result = $argv[1]*$argv[3];
            print "Le resultat est : " . $result ."\n";
            break;
        case "+" :
            $result = $argv[1]+$argv[3];
            print "Le resultat est : " . $result ."\n";
            break;
        case "-" :
            $result = $argv[1]-$argv[3];
            print "Le resultat est : " . $result ."\n";
            break;
    }
} else {
    die( "Impossible de calculer. \n");
}
