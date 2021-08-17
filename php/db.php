<?php

function Createdb(){
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="DB";

    //Create connection
    $con=mysqli_connect($servername,$username,$password);

    //Check connection
    if(!$con){
        die("Connection Failed: ".mysqli_connect_error());
    }

    //Create Database
    $sql="CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con,$sql)){
        $con=mysqli_connect($servername,$username,$password,$dbname);

        $sql="
            CREATE TABLE IF NOT EXISTS student(
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                STUDENTNAME CHAR(30)NOT NULL,
                USN VARCHAR(30)NOT NULL,
                DEPT CHAR(30)NOT NULL,
                CITY CHAR(30)NOT NULL 
            );
        ";

        if(mysqli_query($con,$sql)){
           return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "ERROR while creating database".mysqli_error($con);
    }

}