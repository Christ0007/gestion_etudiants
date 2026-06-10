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
<table>
    <td class="p-3 flex gap-2">

    <a href="modifier.php?id=<?= $e['id'] ?>"
       class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
        Modifier
    </a>

    <a href="supprimer.php?id=<?= $e['id'] ?>"
       onclick="return confirm('Supprimer cet étudiant ?')"
       class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
        Supprimer
    </a>

</td>
</table>
<?php

include "partials/footer.php";