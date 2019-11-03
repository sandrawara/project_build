<?php

// Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');

  include_once 'Database.php';
  include_once 'Post.php';
  
  // Instantiate DB & connect
  $database = new Database;
  $db = $database->connect();

  //Instantiate post object
  $post = new Post($db);

  //Get raw posted data
  $data = json_decode(file_get_contents("php://input"),true);
  
          //Set properties
          $table = $data['table'];
          $id = $data['id'];
          $type = $data['type'];
          $place = $data['place'];
          $title = $data['title'];
          $description = $data['description'];
          $start_date = $data['start_date'];
          $end_date = $data['end_date'];  

  //update post
  if($post->update($table, $id, $type, $place, $title, $description, $start_date, $end_date)) {
      echo 
          '<p>Successfully updated</p>';
  } else {
      echo
        '<p>Error: No post was updated</p>';
  }