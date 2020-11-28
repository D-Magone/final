<?php

if (isset($_GET["page"])) {
    $file = __DIR__ . "/controllers/" . $_GET["page"] . "Controller.php";
    session_start();

    $_SESSION;
    if (file_exists($file))  {
      if ($_GET["page"] === 'login' || $_GET["page"] === 'register') {
        require_once __DIR__ . '/helpers/header.php';
        require_once $file;
      } else if (isset($_SESSION["user_id"])) {
        require_once __DIR__ . '/helpers/header.php';
        require_once $file;
      } else {
        Header("Location: /final/?page=login");
      }
    } else {
      Header("Location: /final/?page=login");

    }
  }
?>