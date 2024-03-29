<?php

// Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  
  include_once 'Database.php';
  include_once 'Post.php';
  
  // Instantiate DB & connect
  $database = new Database;
  $db = $database->connect();

  //Instantiate post object
  $post = new Post($db);

  //Get type
  if(isset($_GET['table'])){
    $table = $_GET['table'];

  //Get table
  $result = $post->get_single($table);

  //Get row count
  $num = $result->rowCount();
  
//Check if any post - work
if($num > 0) {
    //Post array
    $posts_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $posts_arr[] = $row;
    }

      //Turn to JSON & output
      echo json_encode($posts_arr);

  } else {
      //No data
      echo json_encode(
          array('message' => 'No data found')
      );

  }
}    

?>