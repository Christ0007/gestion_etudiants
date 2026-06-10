<?php

require "config/database.php";
require "classes/etudiant.php";

$etudiant = new Etudiant($pdo);

if (isset($_GET['id'])) {
    $etudiant->supprimer($_GET['id']);
}

header("Location: index.php");
exit;