<?php 

  require_once __DIR__ . "/../components/modifyForm.php";
  
  class listView {
    private $toDoList;

    public function __construct($data)
    {
      $this->toDoList = $data;
    }

    public function html() {
      ?>
        <div class="topbar-sticky">
          <header id="header" class="jumbotron">
            <h1>Do not pray for tasks equal to your powers.<br/><br/> Pray for powers equal to your tasks.</h1>
            <p>Phillips Brooks</p>
            <span class=" buttonSlide material-icons delete-btn btn">expand_less</span>
          </header>
        </div>
        <div class="container">
          
          <table id="tableT" class="table">
            <tbody>
              <?php foreach($this->toDoList as $task) { ?>

              <tr>
                <td>
                  <form  action="/final/?page=modify" method="POST">
                    <input type="checkbox" id="done" name="done" value="<?= $task["done"]?>">
                  </form>
                </td>
                <td><?= $task["description"] ?></td>
                <td>
                  <a href="/final/?page=list&action=modify&list_id=<?= $task["list_id"]?>">Edit</a>
                  <a href="/final/?page=delete&list_id=<?= $task["list_id"]?>">Delete</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      <?php


     
    }
  }
?>