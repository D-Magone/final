<?php

class UserForm
{
  private $btnText;

  public function html()
  {
?>
    <div id="fullscreen_bg" class="fullscreen_bg">
      <div class="container">
              <form id="" class="form-signin" method="POST">
                <h1 class="form-signin-heading text-muted"><?= $this->getHeaderText() ?></h1>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Username">  
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Password">
                  <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span class='error'>$error</span>";
                    }
                  ?>  
                <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block"><?= $this->getBtnText() ?></button>
                <?php
                    if(isset($_SESSION["register"])){
                        $error = $_SESSION["register"];
                        echo "<a href='/final/?page=register'>$error</a>";
                    }
                  ?>
              </form>
      </div>
    </div>

<?php
  }

  public function setBtnText($text)
  {
    $this->btnText = $text;
  }

  public function getBtnText()
  {
    return $this->btnText;
  }

  public function setHeaderText($text)
  {
    $this->btnText = $text;
  }

  public function getHeaderText()
  {
    return $this->btnText;
  }

 
  


}

?>