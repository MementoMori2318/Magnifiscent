<?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="register_login.css">
     <div class="register-form-container">
    <section class="login-form">
    <h2>Log In</h2>
    <form class="login-form-grid" action="includes/login.inc.php" method="post">
    <div class="register-form-input form-full-widht">
        <input type = "text" name="uid" placeholder="Username/Email">
    </div>
    <div class="register-form-input form-full-widht">
        <input type = "password" name="pwd" placeholder="Password">
    </div>
    <div class="register-form-input form-full-widht">
        <button type = "submit" name = "submit">Log In</button>
        <a href = 'register.php'><p class="register_link">Not Registered? click Here.</p></a>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
           echo"<p>Fill in all fields!</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information!</p>";
        }
    }
    ?>
    </section>
    </form>
    </div>