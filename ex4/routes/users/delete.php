<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/users/delete-user.php";

try {
  $parameters = getParametersForRoute("/users/:id");

  $id = $parameters["id"];

  if (!deleteUser($id)) {
    throw new Exception("User not found");
  }

  echo jsonResponse(200, [], [
    "success" => true,
    "message" => "User deleted"
  ]);
} catch (Exception $exception) {
  echo jsonResponse(500, [], [
    "success" => false,
    "message" => $exception->getMessage()
  ]);
}
