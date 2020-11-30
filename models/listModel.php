<?php

  require_once __DIR__ . "/../models/db_wrapper.php";

  class listModel {
    public function getAll() {
      $sql = "SELECT * FROM list";
      $response = DB::run($sql)->fetch_all(MYSQLI_ASSOC);

      return $response;
    }
    
//Delete task
    public function deleteById($list_id) {
      $sql = "DELETE FROM list WHERE list_id=$list_id";
      DB::run($sql);
    }
//Update html list
    public function getById($list_id) {
      $sql = "SELECT * FROM list WHERE list_id=$list_id";
      $response = DB::run($sql);

      if ($response->num_rows === 0) {
        return [];
      } else {
        return $response->fetch_assoc();
      }
    }
//Update task name
    public function updateById($list_id, $description) {
      $sql = "UPDATE list SET description = '$description' WHERE list_id=$list_id";
      DB::run($sql);
    }
// Add new task
    public function insertNew($description, $list_id) {
      $sql = "INSERT INTO list (description, list_id, user_id) VALUES 
      ('$description', '$list_id', (SELECT user_id FROM user))";
      DB::run($sql);
    }
  }
?>