<?php
include '../config/config.php';

// connexion à la base de données
$pdo = connect_db();

// Vérification si la méthode de requête HTTP est en POST, elle sert lors de l'envoit du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_echeance = $_POST['date_echeance'];
    $etat = $_POST['etat'];

    // Préparation de la requête SQL pour insérer une nouvelle tâche dans la base de données
    $sql = "INSERT INTO taches (titre, description, date_echeance, etat) VALUES (?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    // Exécution de la requête SQL avec les données du formulaire
    $stmt->execute([$titre, $description, $date_echeance, $etat]);

    // Redirection vers la page index.php
    header('Location: ../index.php');
}
?>
