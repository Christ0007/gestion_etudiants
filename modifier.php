<?php

require "config/database.php";
require "classes/etudiant.php";

$etudiant = new Etudiant($pdo);

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$e = $etudiant->getById($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $etudiant->modifier(
        $_POST['id'],
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['age']
    );

    header("Location: index.php");
    exit;
}

include "partials/header.php";
?>

<div class="container mx-auto p-8">

    <form method="POST"
          class="max-w-lg mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-2xl font-bold mb-4">Modifier étudiant</h2>

        <input type="hidden" name="id" value="<?= $e['id'] ?>">

        <input type="text" name="nom"
               value="<?= $e['nom'] ?>"
               class="w-full border p-3 rounded mb-3">

        <input type="text" name="prenom"
               value="<?= $e['prenom'] ?>"
               class="w-full border p-3 rounded mb-3">

        <input type="number" name="age"
               value="<?= $e['age'] ?>"
               class="w-full border p-3 rounded mb-4">

        <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Modifier
        </button>

    </form>

</div>

<?php include "partials/footer.php"; ?>