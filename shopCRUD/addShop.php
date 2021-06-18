<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="updateProduct.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="addShop.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet"> 
    <title>Add Shop</title>
</head>
<body>

    <?php
        include '../navbar/navbar.php';
    ?>
    <?php
        $_SESSION['url']="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>

    
    <div class="add-container">

        <div class="form-container">
        
            <h2 class="container-title">
                Add Shop
            </h2>

            <form action="add.php" method="POST">
                <input type="text" placeholder="Enter Shop Name"name="shop_name">
                <?php
                    if(isset($_SESSION['error'])){
                        if($_SESSION['error']=="name"){
                            echo "shop name must be filled";
                            unset($_SESSION['error']);
                        }
                    }
                ?>
                <input class="add-button" type="submit" value="Add New Shop" name="submit">           
            </form>

            <?php
                if(isset($_SESSION['status'])){
                    if($_SESSION['status']=="success"){
                        echo "shop added successfully.";
                        unset($_SESSION['status']);
                    }
                    elseif($_SESSION['status']=="fail"){
                        echo "shop adding failed";
                        unset($_SESSION['status']);
                    }

                }
            ?>

        
        </div>

    </div>


    <?php
        include '../footer/footer.php';
    ?>

    <script src="../navbar/navbar.js"></script>
    
</body>
</html>