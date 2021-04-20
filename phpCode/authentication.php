<?php
session_start();
require_once "databaseConnection.php";

//Sign In
if(isset($_POST["fname"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password1 = $_POST["pass1"];
    $password2 = $_POST["pass2"];

    if($fname != null && $lname !=null && $email != null && $password1 != null && $password2 != null) {

    //Check if passwords are equal
    if($password1 != $password2) {
        echo "Passwords does not match";
    } else {
        //Check if email is not registered
        $password = md5($password1);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $email_result = $database->query($check_email);
        if($email_result->num_rows > 0) {
            echo "This account has been registered already";
        } else {
        //register user 
        $register = "INSERT INTO users(firstname, lastname, email, password) VALUES('$fname', '$lname' ,'$email', '$password')";
        if($database->query($register)) {
            echo "true";
            $_SESSION["email"] = $email;
        } else {
            echo "not registered";
        }
        }
        
    }
    } else {
        echo "Enter all fields";
    }

}


//Sign In
if(isset($_POST["email2"]) && isset($_POST["password3"])) {
    $email = $_POST["email2"];
    $password = md5($_POST["password3"]);

    $login = "SELECT * FROM users WHERE email ='$email' && password = '$password'";
    $login_result = $database->query($login);
    if($login_result->num_rows > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["logged_in"] = "true";
        echo "true";
    } else {
        echo "Email or password is not correct";
    }


}



?>