<?php
include '../config/config.php';

$pdo = connect_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_echeance = $_POST['date_echeance'];
    $etat = $_POST['etat'];

    $sql = "UPDATE taches SET titre = ?, description = ?, date_echeance = ?, etat = ? WHERE id = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$titre, $description, $date_echeance, $etat, $id]);

    header('Location: ../index.php');

}
?>
