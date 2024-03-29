<?php 
include '../config/config.php';
$pdo = connect_db();

// Récupération de l'Id à partir de l'url
$id = $_GET['id'];
// prépation de la requette sql pour recuperer les détailles de taches
$sql = "SELECT * FROM taches WHERE id = :id";
$stmt = $pdo->prepare($sql);

// /Exécution de la requête en liant l'ID de la tâche à l'identifiant id  dans la requête
$stmt->execute(['id' => $id]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier une tâche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            border: 1px solid: #ccc;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.15);
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input[type=text], textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Modifier une tâche</h1>
    <?php
    // si la tache existe, on affiche le formulaire pour la modifier
    if ($row = $stmt->fetch()) {
    ?>
    <form action="../actions/edit_task.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Titre:</label>
        <input type="text" name="titre" value="<?php echo $row['titre']; ?>">
        <label>Description:</label>
        <textarea name="description"><?php echo $row['description']; ?></textarea>
        <label>Date d'échéance:</label>
        <input type="date" name="date_echeance" value="<?php echo $row['date_echeance']; ?>">
        <label>Etat:</label>
        <select name="etat">
            <option value="non commencé" <?php echo $row['etat'] == 'non commencé' ? 'selected' : ''; ?>>Non commencé</option>
            <option value="en cours" <?php echo $row['etat'] == 'en cours' ? 'selected' : ''; ?>>En cours</option>
            <option value="terminé" <?php echo $row['etat'] == 'terminé' ? 'selected' : ''; ?>>Terminé</option>
        </select>
        <input type="submit" value="Mettre à jour">
    </form>
    <?php
    } else {
        echo "Aucune tâche trouvée avec l'ID spécifié.";
    }
    ?>
</body>
</html>
