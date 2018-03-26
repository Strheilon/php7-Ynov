<?php

    $json = file_get_contents('././data/shows.json');
    $shows = json_decode($json, true);
    $randomShow = mt_rand(0, count($shows));
    $series = array();
    $classement = array();
    $table = array();
    $display = array();
    $class = array();
    $top1 = 0;
    $top2 = 0;
    $top3 = 0;
    $top1r = 0;
    $top2r = 0;
    $top3r = 0;

//top 1
    foreach ($shows as $value) {
        //randome
        array_push($series, $value);
        //aficher page des films
        if(!empty($_GET['slug'])){
            if($value['slug'] == $_GET['slug']){
                $serie = $value;
            }
        }
        if($value["statistics"]["popularity"] > $top1){
            $top1 = $value["statistics"]["popularity"];
        }
    }
    //top 2
    foreach ($shows as $value) {
            if ($value["statistics"]["popularity"] > $top2){
                if($value["statistics"]["popularity"] < $top1){
                    $top2 =  $value["statistics"]["popularity"];
                }
           }
    }
    //top 3
    foreach ($shows as $value) {
        if ($value["statistics"]["popularity"] > $top3){
            if($value["statistics"]["popularity"] < $top2){
                $top3 =  $value["statistics"]["popularity"];
            }
       }
    }
    //top 1 ra
    foreach ($shows as $valeur) {
        //aficher page des films
        if(!empty($_GET['slug'])){
            if($valeur['slug'] == $_GET['slug']){
                $serie = $valeur;
            }
        }
        if($valeur["statistics"]["rating"] > $top1r){
            $top1r = $valeur["statistics"]["rating"];
        }
    }
    //top 2
    foreach ($shows as $valeur) {
        if ($valeur["statistics"]["rating"] > $top2r){
            if($valeur["statistics"]["rating"] < $top1r){
                $top2r =  $valeur["statistics"]["rating"];
            }
        }
    }
    //top 3
    foreach ($shows as $valeur) {
        if ($valeur["statistics"]["rating"] > $top3r){
            if($valeur["statistics"]["rating"] < $top2r){
                $top3r =  $valeur["statistics"]["rating"];
            }
        }
    }
    //random
    $image = $series[$randomShow]["images"]['banner'];
    $random = $series[$randomShow]["slug"];
    $length = count($series)/10;

    //classement
    if(!empty($_GET['type'])){
        if('popularity' == $_GET['type']){
            foreach ($series as $value) {
                array_push($classement, $value["statistics"]["popularity"]);
            }
        } else if('rating' == $_GET['type']){
            foreach ($series as $value) {
                array_push($classement, $value["statistics"]["rating"]);
            }
        }
    }

    arsort($classement);

    foreach ($classement as $id) {
        foreach ($series as $value) {
            if($id == $value["statistics"]["popularity"]){
                array_push($table, $value);
            }
            if($id == $value["statistics"]["rating"]){
                array_push($table, $value);
            }

        }
    }


    //changer de page
    if (!empty($_GET['id'])) {
        $page = $_GET['id'];
        $p = $page*10;
        $more = $page+1;
        $less = $page-1;
        if ($page == 1){
            $page = 0;
        } else {
            $page = ($page-1)*10;
        }
        for ($i=$page; $i < $p; $i++) {
            array_push($class, $i);
            array_push($display, $table[$i]);
        }
    }

    // on veut déterminer quel menu est actif
    $phpScript = basename($_SERVER['SCRIPT_NAME']);

    $activeMenu = null;
    switch ($phpScript) {
        case 'index.php':
            $activeMenu = 'accueil';
            break;
        case 'classement.php?type=popularity&id=1':
            $activeMenu = 'classement';
            break;
        case 'serie.php':
            $activeMenu = 'aleatoire';
            break;
    }

    $menus = [
        'accueil' => [
            'href' => 'index.php',
            'label' => 'Accueil',
            'icon' => 'fa-home',
        ],
        'classement' => [
            'href' => 'classement.php',
            'label' => 'Classement',
            'icon' => 'fa-trophy',
        ],
        'aleatoire' => [
            'href' => 'serie_aleatoire.php',
            'label' => 'Une série aléatoire',
            'icon' => 'fa-random',
        ],
    ];
















//
