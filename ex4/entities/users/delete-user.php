<?php

function deleteUser($id)
{
  require_once __DIR__ . "/../../database/connection.php";

  $databaseConnection = getDatabaseConnection();

  $deleteUserQuery = $databaseConnection->prepare("DELETE FROM users WHERE id = :id");

  return $deleteUserQuery->execute([
    "id" => $id
  ]);
}
