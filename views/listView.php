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
        <div class="topbar">
          <header id="header" class="">
            <h1 class="mainheader">Do not pray for tasks equal to your powers.<br/><br/> Pray for powers equal to your tasks.</h1>
            <p>Phillips Brooks</p>

            <form class="" method="POST">
            <input type="hidden" name="logOut">
            <button class="logout btn btn-light" type="submit">Log out</button>
          </form>
          </header>
        </div>
        <div class="container">
          <table id="tableT" class="table table-hover">
            <tbody id="sortable">
              <?php foreach($this->toDoList as $task) { ?>
              <tr>
                <td>
                  <form id="form-check" action="" method="POST">
                    <input type="checkbox" 
                           id="chk_<?=$task['list_id']?>" 
                           class="done"
                           name="done_<?=$task['list_id']?>" 
                           data-list-id="<?=$task['list_id']?>"
                           <?=($task['done']=='1'?'checked':'')?> />
                    <label class="strikethrough" for="chk_<?=$task['list_id']?>"><?= $task["description"] ?></label>
                  </form>
                </td>
                <td>
                  <a href="/final/?page=delete&list_id=<?= $task["list_id"]?>"><span class="material-icons delete-btn btn">delete</span></a>
                </td>
                <td>
                  <a href="/final/?page=list&action=modify&list_id=<?= $task["list_id"]?>"><span class="material-icons edit-btn btn">edit</span></a>
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