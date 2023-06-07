<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/create-user.php";
require_once __DIR__ . "/../../libraries/body.php";

try {
  $body = getBody();
  $email = $body["email"];
  $password = $body["password"];

  if (!createUser($email, $password)) {
    throw new Exception("User could not be created.");
  }

  echo jsonResponse(200, [], [
    "success" => true,
    "message" => "User created successfully."
  ]);
} catch (Exception $exception) {
  echo jsonResponse(500, [], [
      "success" => false,
      "message" => $exception->getMessage()
  ]);
}
