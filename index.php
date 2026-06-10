<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/test.css">
    <title>Login Form</title>
</head>

<?php
if (isset($_GET['logout']) && $_GET['logout'] == 'successful') {
    echo "You have been logged out successfully.";
}

if (isset($_SESSION["error"])) {
    echo $_SESSION["error"];
    unset($_SESSION["error"]);
}

if (isset($_SESSION["success"])) {
    echo $_SESSION["success"];
    unset($_SESSION["success"]);
}
?>

<body>
       <div class="login-register">
<!-- login and registration form -->
<form method="post" action="auth/register.php" id="register-form">
    <table>
        <tr>
            <th>Register</th>
        </tr>
        <tr>
            <td>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"><span class="error">*</span></td>
        </tr>
        <tr>
            <td>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="">
                <span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                <span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td>
                <label for ="Age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>"><span class="error">*</span></td>
        </tr>
        <tr>
            <td>
                <label for="Male">Male:</label>
                <input type="radio" id="male" name="gender" value="male" <?php echo ($_POST['gender'] ?? '') == 'male' ? 'checked' : ''; ?>>
                <label for="Female">Female</label>
                <input type="radio" id="female" name="gender" value="female" <?php echo ($_POST['gender'] ?? '') == 'female' ? 'checked' : ''; ?>>
                <label for="Other">Other:</label>
                <input type="radio" id="other" name="gender" value="other" <?php echo ($_POST['gender'] ?? '') == 'other' ? 'checked' : ''; ?>><span class="error">*</span>
            </td>
        </tr>   
        <tr>
            <td>
                <label for ="Other">Student:</label>
                <input type="radio" id="Student" name="position" value="Student" <?php echo ($_POST['position'] ?? '') == 'Student' ? 'checked' : ''; ?>>
                <label for ="Other">Worker:</label>
                <input type="radio" id="Worker" name="position" value="Worker" <?php echo ($_POST['position'] ?? '') == 'Worker' ? 'checked' : ''; ?>><span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td>
                <label for ="Comments">About Yourself:</label>
                <textarea id="comments" name="comments"><?php echo htmlspecialchars($_POST['comments'] ?? ''); ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" id="submit" value="Register">
            </td>
        </tr>
    </table>
</form>
<?php 
if (isset($_SESSION["errors"])){
foreach ($_SESSION["errors"] as $err){
        echo $err;
    unset($_SESSION["errors"]);
}

}?>
<form method="post" action="auth/login.php">
    <table>
        <tr>
            <th>Login</th></tr>
        <tr>
            <td>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="">
                <span class="error">*</span>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Login">
            </td>
        </tr>
    </table>
</form>
       </div>
</body>
</html>