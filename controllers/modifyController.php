<?php
  require_once __DIR__ . "/../models/listModel.php";
  $model = new listModel();
  if (!empty($_POST["list_id"])) {
      //update
      $model->updateById(
        $_POST["list_id"],
        $_POST["description"],
      );

  } else {
    //insert
    $model->insertNew(
      $_POST["description"],
      $_POST["list_id"],
      $_POST["user_id"],
    );
  }

  Header("Location: /final/?page=list");


?>