<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";

if (isPath("/authentication/login")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/authentication/login.php";
        die();
    }
}

if (isPath("/authentication/logout")) {
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/authentication/logout.php";
        die();
    }
}

if (isPath("/users")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users/get.php";
        die();
    }
    
    if (isPostMethod()) {
        require_once __DIR__ . "/routes/users/post.php";
        die();
    }
}

if (isPath("/users/:id")) {
    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/users/patch.php";
        die();
    }
    
    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/users/delete.php";
        die();
    }
}
