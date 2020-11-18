<?php include('server_reg.php') ?>
    <!DOCTYPE html>
<html>
<head>
    <title>Registration form Collaid</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>

<form name="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php include('C:\xampp\htdocs\PBL\collaid\resources\views\errors.blade.php'); ?>
    <div class="input-group">
        <label>First Name:</label>
        <input type="text" name="first_name">

    </div>
        <div class="input-group">
            <label>Last Name:</label>
            <input type="text" name="last_name">
        </div>
    <div class="input-group">
        <label>E-mail:</label>
        <input type="email" name="email">
    </div>

        <div class="input-group">
            <label>Date of Birth:</label>
            <input type="date" name="date_of_birth">
        </div>

        <div class="input-group">
            <label>Nickname (must be unique):</label>
            <input type="text" name="nickname">
        </div>

        <div class="input-group">
            <label>Provided Service (main job you are good at):</label>
            <input type="text" name="provided_service">
        </div>

        <div class="input-group">
            <label>Bio:</label>
            <textarea rows="4" cols="54" placeholder="Enter your bio here..." name="bio" form="registration"></textarea>
        </div>

    <div class="input-group">
        <label>Password:</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <label>Confirm password:</label>
        <input type="password" name="password1">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="../login/login.blade.php">Sign in</a>
    </p>
</form>
</body>
</html>
