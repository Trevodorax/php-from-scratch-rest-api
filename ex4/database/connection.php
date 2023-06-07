<?php

function getDatabaseConnection()
{
    // require_once __DIR__ . "/settings.php";

    // $dsn = "$databaseDialect:dbname=$databaseName;host=$databaseHost;port=$databasePort";

    return new PDO("mysql:dbname=esgi;host=mariadb", "user", "password");
}
