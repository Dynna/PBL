<?php include('server_reg.php') ?>
    <!DOCTYPE html>
<html>
<head>
    <title>Registration form Collaid</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>

<form method="post" action="register.blade.php">
    <?php include('errors.blade.php'); ?>
    <div class="input-group">
        <label>First Name</label>
        <input type="text" name="first_name">
    </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="last_name">
        </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email">
    </div>

        <div class="input-group">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth">
        </div>

        <div class="input-group">
            <label>Nickname</label>
            <input type="text" name="nickname">
        </div>

        <div class="input-group">
            <label>Provided Service</label>
            <input type="text" name="provided_service">
        </div>

        <div class="input-group">
            <label>Biography</label>
            <input type="text" name="bio">
        </div>

    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="login.blade.php">Sign in</a>
    </p>
</form>
</body>
</html>
