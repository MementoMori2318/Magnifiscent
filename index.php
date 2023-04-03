<?php
    require_once('db.php');
    require_once('./component.php');

    $database = new db("Magnifiscent", "Products")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Magnifiscent</title>
</head>
<body>
    <!-- START Product -->
    <div class="container">
        <div class="row">
           <?php
            component("Product 1", 500, "image/1.png");
            component("Product 2", 700, "image/2.png");
            component("Product 3", 300, "image/3.png");
            component("Product 1", 500, "image/1.png");
            component("Product 2", 700, "image/2.png");
            component("Product 3", 300, "image/3.png");
           ?>
        </div>
    </div>
    <!--END Product -->
</body>
</html>