<?php include('server_login.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div class="header">
    <h2>Login</h2>
</div>

<form method="post" action="login.blade.php">
    <?php include('C:\xampp\htdocs\PBL\collaid\resources\views\errors.blade.php'); ?>
    <div class="input-group">
        <label>Email/username:</label>
        <input type="text" name="nickname" >
    </div>
    <div class="input-group">
        <label>Password:</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="../registration/register.blade.php">Sign up</a>
    </p>
</form>
</body>
</html>
