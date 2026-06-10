<?php //profile edit system, user can edit their profile information and save it to the database.
require "../config/config.php";
require "../models/User.php";
session_start();
$usermodel = new User($conn);
//Checks if the user is logged in, if not then redirects to index page
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
$user= $usermodel->getUserById($_SESSION["user_id"]);
?>

<!-- make a dashboard for login-->
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Dashboard</title>
    </head>

    <body>
        <h1>Welcome</h1>
        <h2> Your information</h2>
        <p>Name: <?php echo htmlspecialchars($user['name']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Age: <?php echo htmlspecialchars($user['age']); ?></p>
        <p>Gender: <?php echo htmlspecialchars($user['gender']); ?></p>
        <p>Position: <?php echo htmlspecialchars($user['position']); ?></p>
        <p>Comments: <?php echo htmlspecialchars($user['comments']); ?></p>

        <a href="../auth/logout.php">Logout</a>
    </body>

</html>