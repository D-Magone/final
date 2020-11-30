<?php

  require_once __DIR__ . "/../../final/models/db_wrapper.php";
//send checkbox data to db
  if (isset($_POST["list_id"]) && isset($_POST["done"])) {
    $done = $_POST["done"];
    $list_id = $_POST["list_id"];
    $sql = "UPDATE list SET done = '$done' WHERE list_id='$list_id'";
    DB::run($sql);
  }

  