<?php

class Post {
    //DB 
    private $conn;

    //Properties
    public $id;
    public $table;
    public $place;
    public $school;
    public $program;
    public $url;
    public $description;
    public $title;
    public $start_date;
    public $end_date;
    

    //Constructor with BD
    public function __construct($db) {
        $this->conn = $db;
    }

    //Get post - query

     public function getPost(){
        $query = "SELECT * FROM work
        UNION
        SELECT * FROM education
        UNION
        SELECT * FROM web_pages
        ORDER BY id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    //Get single post
    public function get_single($table) {

        $query = "SELECT * FROM $table";

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
   
    }

    //Create post
    public function create($table, $type, $place, $title, $description, $start_date, $end_date) { 

        //create query
        $query = "INSERT INTO $table (type, place, title, description, start_date, end_date) VALUES
        ('$type', '$place', '$title', '$description', '$start_date', '$end_date')";

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Execute query
            if($stmt->execute()) {
                return true;
            }

            //Print error if not workning
            printf("Error: %s. \n", $stmt->error);

            return false;
    }

    //Update post
    public function update($table, $id, $type, $place, $title, $description, $start_date, $end_date) { 

        //update query
        $query = "UPDATE $table SET type = '$type', place = '$place', title = '$title',
        description = '$description', start_date = '$start_date', end_date = '$end_date' 
        WHERE id = '$id'";

        //Prepare statement
        $stmt = $this->conn->prepare($query);

            //Execute query
            if($stmt->execute()) {
                return true;
            }

            //Print error if not workning
            printf("Error: %s. \n", $stmt->error);

            return false;
    }

    //Delete post
    public function delete($table, $id) {
        $query = "DELETE FROM $table WHERE id = $id";

        //Prepare statement
        $stmt = $this->conn->prepare($query); 

          //Execute query
          if($stmt->execute()) {
            return true;
        }

        //Print error if not workning
        printf("Error: %s. \n", $stmt->error);

        return false;
    }

}



?>