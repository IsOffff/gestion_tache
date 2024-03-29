<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle tâche</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }

        h1 {
            color: #2d2d2d;
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

        .form-container {
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <h1>Créer une nouvelle tâche</h1>
    <div class="form-container">
    <form action="actions/create_task.php" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>
    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea>
    <label for="date_echeance">Date d'échéance :</label>
    <input type="date" id="date_echeance" name="date_echeance" required>
    <label for="etat">État :</label>
    <select id="etat" name="etat" required>
        <option value="Non commencé">Non commencé</option>
        <option value="En cours">En cours</option>
        <option value="Terminé">Terminé</option>
    </select>
    <input type="submit" value="Créer">
    </form>

    </div>
</body>
</html>
