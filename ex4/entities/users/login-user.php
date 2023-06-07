<?php

function loginUser($email, $password)
{
  require_once __DIR__ . "/../../database/connection.php";

  $databaseConnection = getDatabaseConnection();

  $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email");

  $getUserQuery->execute([ "email" => $email ]);

  $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    return false;
  }

  $hashedPassword = $user["password"];

  if (!password_verify($password, $hashedPassword)) {
    return false;
  }

  $updateUserTokenQuery = $databaseConnection->prepare("UPDATE users SET authentication_token = :authentication_token WHERE email = :email");

  $authenticationToken = bin2hex(random_bytes(30));

  $updateUserTokenQuery->execute([
    "authentication_token" => $authenticationToken,
    "email" => $email
  ]);

  return $authenticationToken;
}
