<?php

require_once __DIR__ . "/../components/userForm.php";
require_once __DIR__ . "/../models/db_wrapper.php";

    if (!empty ($_POST["username"])) {
      $username = $_POST["username"];
  
      $sql = "SELECT * FROM user WHERE username = '$username'";
  
      $response = DB::run($sql)->fetch_assoc();
  
      if ($response) {
        if (!empty($_POST["password"])) {
          $password = $_POST["password"];
          // $salt = "#/A5ax%*9)&Hak&ka!@";

          // $password = $password . $salt;
          
          $isValidPassword = password_verify(
            $_POST["password"],
            $response["password"]
          );
  
          if($isValidPassword) {
            session_start();
            $_SESSION["user_id"] = $response["username"];
            Header("Location: /final/?page=list");
          } else {
            echo "Invalid password";
          }
        } else {
          echo "Password User not set";
        }
      } else {
        echo " with username: '$username' does not exist";
      }
    } else {
      echo "Username no specified";
    }



$form = new UserForm();
$form->setBtnText("Login");
$form->html();

?>