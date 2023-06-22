<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<div style="height:5rem"></div>
<?php
    require('db.php');
    include('header.php');
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    
        $username = mysqli_real_escape_string($connection, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);
        $query    = "SELECT * FROM c2224779_Ghibliweb.`users` WHERE  username='$username'
        AND password='" . md5($password) . "'";
        $result = $connection->query($query);
        if (mysqli_num_rows($result)==1) {
        echo "login successully";
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            while($row = $result->fetch_assoc()){
            $_SESSION['userid'] = $row['id'];};
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a style='color:black'href='login.php'>Login</a> again or <a style='color:black'href='registration.php'> Register </a> here.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <label for="username">Username</label>
        <input type="text" id="username" class="login-input" name="username" placeholder="Username"/>
        <label for="password">Password</label>
        <input type="password" class="login-input" id="password" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>