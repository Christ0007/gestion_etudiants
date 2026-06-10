<?php

class Etudiant
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function ajouter($nom, $prenom, $age)
    {
        $sql = "
            INSERT INTO etudiants
            (nom, prenom, age)
            VALUES (?, ?, ?)
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $age
        ]);
    }

    public function liste()
    {
        $sql = "
            SELECT *
            FROM etudiants
            ORDER BY id DESC
        ";

        return $this->pdo->query($sql);
    }
}