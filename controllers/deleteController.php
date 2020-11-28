<?php
  require_once __DIR__ . "/../models/listModel.php";
  if (isset($_GET["list_id"])) {
    $model = new listModel();
    $model->deleteById($_GET["list_id"]);

  }
Header("Location: /final/?page=list");

?>  