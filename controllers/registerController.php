<?php

require_once __DIR__ . "/../views/registerView.php";
require_once __DIR__ . "/../models/listModel.php";

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  // $salt = "#/A5ax%*9)&Hak&ka!@";

  // $password = $password . $salt;

  $password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
  DB::run($sql);
  Header("Location: /final/?page=login");
} else {
  echo "Some fields are missing";
}
$view = new RegisterView();
$view->html();

?>