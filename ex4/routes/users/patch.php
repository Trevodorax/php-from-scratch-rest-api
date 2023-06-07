<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/users/update-user.php";

try {
  $parameters = getParametersForRoute("/users/:id");
  $id = $parameters["id"];
  $body = getBody();
  
  if (!updateUser($id, $body)) {
    throw new Exception("User not found");
  }

  echo jsonResponse(200, [], [
    "success" => true,
    "message" => "User updated successfully"
  ]);
} catch (Exception $exception) {
  echo jsonResponse(500, [], [
    "success" => false,
    "message" => $exception->getMessage()
  ]); 
}
