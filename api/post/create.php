<?php

// Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  //header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
  //Access-Control-Allow-Methods, Authorization, X-Requested-with');
  
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
          $place = $data['place'];
          $title = $data['title'];
          $description = $data['description'];
          $start_date = $data['start_date'];
          $end_date = $data['end_date'];  

  //Create post
  if($post->create($table, $place, $title, $description, $start_date, $end_date)) {
      echo 
          'Successfully created';
  } else {
      echo
        ' No post created';
  }