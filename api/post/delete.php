<?php

// Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');

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
          $type = $data['table'];
          $id = $data['id']; 

  //delete post
  if($post->delete($type, $id)) {
      echo 
          '<p>Successfully deleted</p>';
  } else {
      echo
        '<p>Error: post could not be deleted</p>';
  }