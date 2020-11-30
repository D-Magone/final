<?php

require_once __DIR__ . "/../views/listView.php";
  require_once __DIR__ . "/../models/listModel.php";
  require_once __DIR__ . "/../components/modifyForm.php";

  if (isset($_POST["logOut"])) {
    session_destroy();
    Header("Location: /final/?page=login");
  }

  $model = new listModel();
  $form = new modifyForm();
  $tasks = $model->getAll();

  $view = new listView($tasks);
  $view->html();
  
//form input
  if (isset($_GET["action"]) && $_GET["action"] === "modify") {
    if (isset($_GET["list_id"])) {
      $task = $model->getById($_GET["list_id"]);

      $form = new modifyForm($task["description"], $task["list_id"], $task["user_id"]);

    } else {
      $form = new modifyForm();
    }
  };

  $form->html();
  
?>