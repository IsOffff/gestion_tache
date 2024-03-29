<?php 
include '../config/config.php';
// Connexion à la base de données 
$pdo = connect_db();

// Récupération de l'ID de la tâche à partir de l'URL
$id = $_GET['id'];

// Préparation de la requête SQL pour supprimer la tache
$sql = "DELETE FROM taches WHERE id = :id";
$stmt = $pdo->prepare($sql);

// Exécution de la requête et redirection vers la page d'accueil
if($stmt->execute(['id' => $id])){
    header("Location: /gestionnaire de taches/index.php?message=success");
} else {
    header("Location: /gestionnaire de taches/index.php?message=error");
}
exit;
?>
