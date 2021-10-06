<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password="";
    $dbname="bookstore";

    //Create connection
    $con = mysqli_connect($servername,$username,$password);

    //check connection
    if(!$con){
        die("Connection failed:".mysqli_connect_error());
    }

    //create DB
    $sql = "Create Database if not exists $dbname";

    if(mysqli_query($con,$sql)){
        $con = mysqli_connect($servername,$username,$password,$dbname);

        $sql="Create table if not exists books(
                id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                book_name VARCHAR(50) NOT NULL,
                book_publisher VARCHAR(50),
                book_price FLOAT )
             ";
        
        if(mysqli_query($con,$sql)){
            return $con;
        }else{
            echo "Can not create table.";
        }
    }
    else{
        echo "Error while creating database".mysqli_error($con);
    }
}

?>