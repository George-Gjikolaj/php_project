 <?php 
require "../config/config.php";
require "../models/User.php";
session_start();
 $usermodel = new User($conn);
 $name = $password = $email = $age = $gender = $position = $comments = "";

 // Function to sanitize input data to prevent XSS and other attacks
   function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error array
    $error = array();
    // Collect sanitized input data
    $name = sanitize_input($_POST['name']);
    $password = sanitize_input($_POST['password']);
    $email = sanitize_input($_POST['email']);
    $age = isset($_POST['age']) ? (int)($_POST['age']) : NULL;
    $gender = sanitize_input($_POST['gender'] ?? '');
    $position = sanitize_input($_POST['position'] ?? '');
    $comments = sanitize_input($_POST['comments'] ?? '');
 

  
 
if(empty($name)) {
        $error[]="Name is required.";
    }

if(empty($email)) {
        $error[]="Email is required.";
    }

if(empty($password)) {
        $error[]="Password is required.";
    }

if(empty($gender)) {
        $error[]= "Gender is required.";
    }

if(empty($age)) {
        $error[]="Age is required.";
    }

if (!empty($age) && ($age < 18 || $age > 120)) {
       $error[]="Age must be a number between 18 and 120.";
    }

if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error[]="Only letters and white space allowed in name.";
    }

if(!preg_match("/^(?=.*[a-zA-Z])(?=.*[0-9]).{8,}$/"  , $password)) {
        $error[]="Password must be at least 8 characters long and contain at least one number and one letter.";
    }

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error[]="Invalid email format.";
    }
    // Display errors with sessions FIX 
  if (!empty($error)) {
        $_SESSION["errors"] =$error;
        header("Location: ../index.php");
        exit;
    }

 if (empty($error)) {

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
  
    $result = $usermodel->createUser($name, $email, $hashed_password, $age, $gender, $position, $comments);
    
    }  

    if ($result) {

        $_SESSION["success"] = "Registration successful.";
        header("Location: ../index.php");
        exit;

    } else {
        $_SESSION["error"] = "Something went wrong: " ;
    
    }

 }
     ?>