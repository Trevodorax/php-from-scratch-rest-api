<?php

function createUser($email, $password)
{
  require_once __DIR__ . "/../../database/connection.php";

  $databaseConnection = getDatabaseConnection();

  $createUserQuery = $databaseConnection->prepare("
    INSERT INTO users (
      email,
      password
    ) VALUES (
      :email,
      :password
    );
  ");

  return $createUserQuery->execute([
    "email" => htmlspecialchars($email),
    "password" => password_hash($password, PASSWORD_BCRYPT)
  ]);
}
