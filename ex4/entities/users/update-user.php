<?php

function updateUser($id, $body)
{
  if (count($body) === 0) {
    return true;
  }

  require_once __DIR__ . "/../../database/connection.php";

  $databaseConnection = getDatabaseConnection();

  $authorizedColumns = ["name", "email"];

  $set = [];
  $data = [];

  foreach ($body as $column => $value) {
    if (in_array($column, $authorizedColumns)) {
      $set[] = "$column = :$column";
      $data[$column] = htmlspecialchars($value);
    }
  }

  $updateUserQuery = $databaseConnection->prepare("UPDATE users SET $set WHERE id = :id");

  $data["id"] = $id;

  return $updateUserQuery->execute($data);
}
