<?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="register_login.css">
    <div class="register-form-container">
    <section class="register-form">    
            <h2>Register</h2>
            <form class="register-form-grid" action="includes/register.inc.php" method='POST'>
                <div class="register-form-input">
                    <input type = "text" name="name" placeholder="Name" >
                </div>
                <div class="register-form-input">
                    <input type = "text" name="uid" placeholder="Username" >
                </div>
                <div class="register-form-input form-full-widht">
                    <input type = "email" name="email" placeholder="Email" > 
                </div>
                <div class="register-form-input form-full-widht"> 
                    <input type = "text" name="address" placeholder="Address" >
                </div>
                <div class="register-form-input">
                    <input type = "password" name="pwd" placeholder="Password" >
                </div>
                <div class="register-form-input">
                    <input type = "password" name="pwdrepeat" placeholder="Repeat password" >
                </div>
                    
                <div class="register-form-input form-full-widht"> 
                <button type = "submit" name = "submit">Register</button>
                <a href = 'login.php'><p class="register_link">Already Registered Login Here.</p></a>
                </div>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                echo"<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Choose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Choose a proper email!</p>";
                }
                else if ($_GET["error"] == "passworddontmatch") {
                    echo "<p>Password doesn't match!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already Taken</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up!</p>";
                }
            }

            ?> 
            </form>
            </section>
    </div>