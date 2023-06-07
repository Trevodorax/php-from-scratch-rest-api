<?php

function isUserLoggedIn($token)
{
  require_once __DIR__ . "/../../database/connection.php";

  $databaseConnection = getDatabaseConnection();

  $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE authentication_token = :token");

  $getUserQuery->execute([
    "token" => $token
  ]);

  $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    return false;
  }

  return true;
}
