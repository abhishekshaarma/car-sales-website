<?php

    include "database.php";
    //Register Logic
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone_number = $_POST['number'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO seller(name, address, phone_number, email, username, password) VALUES ('$name', '$email', '$phone_number', '$address', '$username', '$password')";
        mysqli_query($con, $sql);
       
        
        // Redirect to Login.php with the message
        header("Location: login.html");
        exit;
    }
    if(isset($_POST['login'])){
        $login_username = $_POST['username'];
        $login_password = $_POST['password'];
        $login_sql = "SELECT * FROM seller WHERE username='$login_username' AND password='$login_password'";
        mysqli_query($con, $login_sql);
        $result = $con->query($login_sql);
        if($result->num_rows == 1){
            header("Location: login.html#carregister");
            exit;
        }else{
            echo"login failed";
        };
    }    
   

    if(isset($_POST["carregister"])){
        $seller_id = $_POST["sellerid"];
        $make = $_POST["make"];
        $model = $_POST["model"]; 
        $year = $_POST["year"];
        $milage = $_POST["milage"];
        $location = $_POST["location"];
        $price = $_POST["price"];

        $sql = "INSERT INTO car(s_id, make, model, year, milage, location, price) VALUES('$seller_id', '$make', '$model', '$year', '$milage', '$location', '$price')";

        mysqli_query($con, $sql);
    }
    header("Location: index.html");
    exit;
?>