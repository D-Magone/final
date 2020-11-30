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
          
          $isValidPassword = password_verify(
            $_POST["password"],
            $response["password"]
          );
  
          if($isValidPassword) {
            session_start();
            $_SESSION["user_id"] = $response["username"];
            Header("Location: /final/?page=list");
          } else {
            $error = "Invalid password";
            $_SESSION["error"] = $error;
          }
        } else {
          $error = "Password not set";
          $_SESSION["error"] = $error;
        }
      } else {
        $error = "'$username' does not exist";
        $_SESSION["error"] = $error;
      }
    } else {
    
    }

//Create a link to register
$register = "Create an account";
$_SESSION["register"] = $register;

$form = new UserForm();
$form->setBtnText("Login");
$form->setHeaderText("Login");
$form->html();

unset($_SESSION["error"]);

?>