<?php

require_once __DIR__ . "/../database/connection.php";

try {
    $databaseConnection = getDatabaseConnection();

    $success = $databaseConnection->query("
        DROP TABLE IF EXISTS users;

        CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(50) NOT NULL,
            password CHAR(60) NOT NULL,
            authentication_token CHAR(60)
        );

        INSERT INTO users(
            email,
            password
        ) VALUES (
            'administrator@domain.com',
            '\$2y\$10\$xkdLStS5tQWai1sYcjDe7.GTSf6m1L/E10iqO.HvD6JO4iRxehdSy'
        );
    ");

    if ($success) {
        echo "Migrations successful";
    } else {
        echo "Error when migrating data";
    }

} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
