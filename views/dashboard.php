<?php
session_start();
include "../phpCode/databaseConnection.php";

if(!isset($_SESSION["email"])) {
    header("location: ../index.html");
} else {
    $email = $_SESSION["email"];
    $get_fname = "SELECT * FROM users WHERE email = '$email'";
    $fname_result = $database->query($get_fname);
    if($fname_result->num_rows > 0) {
        while($data = $fname_result->fetch_assoc()) {
            $fname = $data["firstname"];
        }
    }

    if(isset($_SESSION["logged_in"])) {
        $status = "signed in";
    } else {
        $status = "signed up";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="navbar">
        <span>Hi, <?php echo $fname ?></span>
        <a href="../phpCode/logOut.php">Sign Out</a>
    </div>

    <div class="main">
        <div class="dashboard">
            <h2>Dashboard</h2>
            <div>
            <p>You have <?php echo $status ?></p>
            </div>
        </div>
    </div>
</body>
</html>