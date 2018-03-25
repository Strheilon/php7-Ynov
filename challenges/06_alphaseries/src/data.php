<?php

$json = file_get_contents('././data/shows.json');
$shows = json_decode($json, true);
