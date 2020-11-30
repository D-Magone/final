<?php 

require_once __DIR__ . "/../components/userForm.php";

class RegisterView {
  public function html() {
   $form = new UserForm();
   $form->setBtnText("Save user");
   $form->setHeaderText("Sign up");
   $form->html();
  }
}

unset($_SESSION["register"]);

?>