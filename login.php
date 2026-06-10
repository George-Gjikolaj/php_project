<?php 

require "../config/config.php";
require "../models/User.php";
session_start();
$usermodel = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"] ?? '';
    $email =$_POST["email"] ?? '';
        $user = $usermodel->getUserByEmail($email);
    if( $user && password_verify($password, $user['password'])) {
        $_SESSION["user_id"]= $user["id"];
        $_SESSION["user_name"]= $user["name"];
        header("Location: ../pages/dashboard.php");
        exit;
    }
    else{
        $_SESSION["error"]= "login failed. Invalid email or password.";
        header("Location: ../index.php");
        exit;
    }
}
?>