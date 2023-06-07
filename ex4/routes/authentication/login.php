<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../entities/users/login-user.php";

try {
  $body = getBody();
  $email = $body["email"];
  $password = $body["password"];

  $token = loginUser($email, $password);

  if (!$token) {
    echo jsonResponse(404, [], [
      "success" => false,
      "message" => "User not found"
    ]);

    return;
  }

  echo jsonResponse(200, [], [
    "success" => true,
    "token" => $token
  ]);
} catch (Exception $exception) {
  echo jsonResponse(500, [], [
    "success" => false,
    "message" => $exception->getMessage()
  ]);
}
