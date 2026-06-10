<?php

require "config/database.php";
require "classes/etudiant.php";

$etudiant = new Etudiant($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];

    $etudiant->ajouter(
        $nom,
        $prenom,
        $age
    );

    header("Location: index.php");
    exit();
}

include "partials/header.php";

?>

<form
    method="POST"
    class="max-w-lg bg-white p-6 rounded shadow mx-auto"
>

    <h1 class="text-2xl font-bold mb-4">

        Ajouter un étudiant

    </h1>

    <input
        type="text"
        name="nom"
        placeholder="Nom"
        class="w-full border p-3 mb-3 rounded"
        required
    >

    <input
        type="text"
        name="prenom"
        placeholder="Prénom"
        class="w-full border p-3 mb-3 rounded"
        required
    >

    <input
        type="number"
        name="age"
        placeholder="Âge"
        class="w-full border p-3 mb-4 rounded"
        required
    >

    <button
        class="bg-green-500 text-white px-4 py-2 rounded"
    >
        Enregistrer
    </button>

</form>

<?php

include "partials/footer.php";