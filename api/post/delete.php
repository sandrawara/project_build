<?php

// Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
  //Access-Control-Allow-Methods, Authorization, X-Requested-with');
  
  include_once '../../config/Database.php';
  include_once '../../models/Post.php';
  
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

  //delete post
  if($post->delete($table, $id)) {
      echo 
          'Successfully deleted';
  } else {
      echo
        'Error: post could not be deleted';
  }