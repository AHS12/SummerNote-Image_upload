<?php 
include_once('database.php');
if(isset($_POST)){
    $postData = mysqli_escape_string($connection,$_POST['post']);

    $query = "INSERT INTO posts(body,status) VALUES('$postData',1)";

    if (mysqli_query($connection,$query)) {
        echo "Success";
        header("Location: index.php");

    } else {
        echo "Error: ".$connection->error;
    }

}