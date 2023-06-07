<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/get-users.php";
require_once __DIR__ . "/../../entities/users/is-user-logged-in.php";
require_once __DIR__ . "/../../libraries/header.php";

try {
  $token = getAuthorizationBearerToken(); 

  if (!isUserLoggedIn($token)) {
    echo jsonResponse(401, [], [
      "success" => false,
      "message" => "You are not logged in."
    ]);

    return;
  }

  echo jsonResponse(200, [], [
    "success" => true,
    "users" => getUsers()
  ]);
} catch (Exception $exception) {
  echo jsonResponse(500, [], [
    "success" => false,
    "message" => $exception->getMessage()
  ]);
}
