<?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="css/register-login.css">
     <div class="register-form-container">
    <section class="register-form">
    <h2>Log In</h2>
    <form action="includes/login.inc.php" method="post">
        <input type = "text" name="uid" placeholder="Username/Email">
        <input type = "password" name="pwd" placeholder="Password">
        <button type = "submit" name = "submit">Log In</button>
        <a href = 'register.php'><p class="register_link">Not Registered? click Here.</p></a>
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