<?php
    include_once 'header.php';
?>
<link rel="stylesheet" href="register_login.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="register-form-container">
    <section class="register-form">    
            <h2>Register</h2>
            <form class="register-form-grid" action="includes/register.inc.php" method='POST'>
                <div class="register-form-input form__group field">
                    <input type = "text" name="name" placeholder="Name" class="form__field">
                    <label for="name" class="form__label">Name</label>
                </div>
                <div class="register-form-input form__group field">
                    <input type = "text" name="uid" placeholder="Username" class="form__field">
                    <label for="name" class="form__label">Username</label>
                </div>
                <div class="register-form-input form-full-widht form__group field">
                    <input type = "email" name="email" placeholder="Email" class="form__field"> 
                    <label for="name" class="form__label">Email</label>
                </div>
                <div class="register-form-input form-full-widht form__group field"> 
                    <input type = "text" name="address" placeholder="Address" class="form__field">
                    <label for="name" class="form__label">Address</label>
                </div>
                <div class="register-form-input form__group field">
                    <input type = "password" name="pwd" placeholder="Password" class="form__field">
                    <label for="name" class="form__label">Password</label>
                </div>
                <div class="register-form-input form__group field">
                    <input type = "password" name="pwdrepeat" placeholder="Repeat password" class="form__field">
                    <label for="name" class="form__label">Repeat password</label>
                </div>
                <div class="register-form-input form-full-widht"> 
                <button type = "submit" name = "submit">Register</button>
                <a href = 'login.php'><p class="register_link">Already Registered Login Here.</p></a>
                </div>
            <div class="register-form-input form-full-widht"> 
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                ?>
                    <script>
                        swal({
                        title: "!",
                        text: "Fill in all fields!!",
                        icon: "warning",
                        button: "Sheesh!",
                        });
                    </script>
                    <?php
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Choose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Choose a proper email!</p>";
                }
                else if ($_GET["error"] == "passworddontmatch") {
                    ?>
                    <script>
                        swal({
                        title: "Password doesn't match!!",
                        icon: "warning",
                        button: "Sheesh!",
                        });
                    </script>
                    <?php
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already Taken</p>";
                }
                else if ($_GET["error"] == "none") {
                    ?>
                    <script>
                        swal({
                        title: "Greate!",
                        text: "Successfully Created an account!",
                        icon: "success",
                        button: "Aww yiss!",
                        });
                    </script>
                    <?php
                }
            }

            ?> 
            </div>
            </form>
    </section>
    </div>