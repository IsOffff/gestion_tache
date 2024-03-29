<?php
include 'config/config.php';
$pdo = connect_db();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestionnaire de Tâches</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }

        h1 {
            color: #2d2d2d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4c58af;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #af5d4c;
            text-decoration: none;
        }

        a:hover {
            color: #45a049;
        }

        input[type=text], select, textarea {
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
    <h1>Gestionnaire de Tâches</h1>
    <a href="create_form.php">Créer une nouvelle tâche</a>
    <form method="GET" action="index.php">
        <select name="etat">
            <option value="">Toutes les tâches</option>
            <option value="non commence">Non commencées</option>
            <option value="en cours">En cours</option>
            <option value="termine">Terminées</option>
        </select>
        <input type="submit" value="Filtrer">
    </form>

    <table>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date d'échéance</th>
            <th>Etat</th>
            <th>Actions</th>
        </tr>
        <?php
        // Récupération de l'état de filtrage des tâches en GET comme méthode
        $etat = $_GET['etat'] ?? '';
        // Construction de la requête SQL de sélection des taches
        $sql = "SELECT * FROM taches";
        if ($etat != '') {
            $sql .= " WHERE etat = ?";
        }
        $sql .= " ORDER BY date_echeance ASC";

        $stmt = $pdo->prepare($sql);
        // Exécution de la requête SQL avec ou sans paramètre d'état
        if ($etat != '') {
            $stmt->execute([$etat]);
        } else {
            $stmt->execute();
        }
        // Affichage des tâches dans le tableau
        while($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['titre']}</td>
                <td>{$row['description']}</td>
                <td>{$row['date_echeance']}</td>
                <td>{$row['etat']}</td>
                <td> 
                <a href='views/edit_form.php?id={$row['id']}'>Modifier</a> |
                <a href='./actions/delete_task.php?id={$row['id']}'>Supprimer</a>


                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
