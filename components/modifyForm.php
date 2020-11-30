<?php

  class modifyForm {
    private $description;
    private $list_id;
    private $user_id;
    public function __construct($description = null, $list_id = null, $user_id = null)
    {
      $this->description = $description;
      $this->list_id = $list_id;
      $this->user_id = $user_id;
    }

    public function html() {
      ?>
      
      <form class="form-group" action="/final/?page=modify" method="POST">
        <input name="description" class="form-control inputTask" placeholder="Write a task..." value="<?= $this->description ?>">
        <input type="hidden" name="list_id" value="<?= $this->list_id ?>">
        <input type="hidden" name="user_id" value="<?= $this->user_id ?>">

        <button id="saveBtn" class="btn btn-info" type="submit">Save</button>
      </form>

      <?php

    }
  }
?>