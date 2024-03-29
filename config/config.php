<?php
function connect_db() 
{
    $host = 'localhost:3307';
    $db   = 'gestionnaire de taches';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    // Essayer de se connecter à la base de données
    try {
        return new PDO($dsn, $user, $pass, $options);
    //si la connexion reussit , la fonction renvoie pdo
    } catch (\PDOException $e) {
      // s'il y a une erreur de connexion, lance une exception avec le message d'erreur et le code d'erreur
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
?>
