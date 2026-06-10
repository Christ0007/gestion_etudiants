<?php

require "config/database.php";
require "classes/etudiant.php";

$etudiant = new Etudiant($pdo);

$liste = $etudiant->liste();

include "partials/header.php";

?>

<div class="flex justify-between mb-6">

    <h1 class="text-3xl font-bold">
        Liste des étudiants
    </h1>

    <a
        href="ajouter.php"
        class="bg-blue-500 text-white px-4 py-2 rounded"
    >
        Ajouter
    </a>

</div>

<table class="w-full bg-white shadow rounded">

    <thead class="bg-blue-500 text-white">

        <tr>

            <th class="p-3">ID</th>
            <th class="p-3">Nom</th>
            <th class="p-3">Prénom</th>
            <th class="p-3">Âge</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($liste as $e): ?>

        <tr class="border-b">

            <td class="p-3">
                <?= $e['id'] ?>
            </td>

            <td class="p-3">
                <?= $e['nom'] ?>
            </td>

            <td class="p-3">
                <?= $e['prenom'] ?>
            </td>

            <td class="p-3">
                <?= $e['age'] ?>
            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php

include "partials/footer.php";