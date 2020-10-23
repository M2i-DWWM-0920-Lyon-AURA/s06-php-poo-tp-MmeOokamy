<?php

$dbVideoGames = new PDO('mysql:host=localhost;dbname=videogames', 'root', 'root');
$dbVideoGames->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbVideoGames->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
