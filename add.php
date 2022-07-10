<?php require "./inc/header-alt.php" ?>
    <?php
        $messages = [];
        if($_POST)
        {
            switch($_POST['category'])
            {
                case "DVD-disc":
                    $obj = new DVD_disc($_POST['sku'],$_POST['name'],$_POST['price'],$_POST['size']);
                    if(!empty($obj->errors))
                    {
                        $messages = $obj->errors;
                    }
                    else
                    {
                        $skucheck = "SELECT * FROM `products` WHERE SKU='" . $obj->SKU . "';";
                        if(empty(mysqli_fetch_all(mysqli_query($_SESSION['conn'], $skucheck),MYSQLI_ASSOC)))
                        {
                            $query = "INSERT INTO `products` (`SKU`, `name`, `price`, `size`) VALUES ('" . $obj->SKU . "', '" . $obj->name . "', '" . $obj->price . "', '" . $obj->size . "');";
                            $_SESSION['conn']->query($query);
                        }
                        else
                        {
                            $messages[] = "This SKU already exists, try another one.";
                        }
                    }
                    break;
                case "Book":
                    $obj = new Book($_POST['sku'],$_POST['name'],$_POST['price'],$_POST['size']);
                    if(!empty($obj->errors))
                    {
                        $messages = $obj->errors;
                    }
                    else
                    {
                        $skucheck = "SELECT * FROM `products` WHERE SKU='" . $obj->SKU . "';";
                        if(empty(mysqli_fetch_all(mysqli_query($_SESSION['conn'], $skucheck),MYSQLI_ASSOC)))
                        {
                            $query = "INSERT INTO `products` (`SKU`, `name`, `price`, `size`) VALUES ('" . $obj->SKU . "', '" . $obj->name . "', '" . $obj->price . "', '" . $obj->size . "');";
                            $_SESSION['conn']->query($query);
                        }
                        else
                        {
                            $messages[] = "This SKU already exists, try another one.";
                        }
                    }
                    break;
                case "Furniture":
                    var_dump($_POST);
                    $obj = new Furniture($_POST['sku'],$_POST['name'],$_POST['price'],[$_POST['height'],$_POST['width'],$_POST['length']]);
                    if(!empty($obj->errors))
                    {
                        $messages = $obj->errors;
                    }
                    else
                    {
                        $skucheck = "SELECT * FROM `products` WHERE SKU='" . $obj->SKU . "';";
                        if(empty(mysqli_fetch_all(mysqli_query($_SESSION['conn'], $skucheck),MYSQLI_ASSOC)))
                        {
                            $query = "INSERT INTO `products` (`SKU`, `name`, `price`, `size`) VALUES ('" . $obj->SKU . "', '" . $obj->name . "', '" . $obj->price . "', '" . $obj->size . "');";
                            $_SESSION['conn']->query($query);
                        }
                        else
                        {
                            $messages[] = "This SKU already exists, try another one.";
                        }
                    }
                    break;
            }
            if(empty($messages))
            {
                header("Location: http://localhost:63342/Lukas_Project/index.php");
            }
            else
            {
                foreach($messages as $message)
                {
                    echo "<p class='alert'>" . $message . "</p><br>";
                }
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="product_form" method="POST">
        <div>
            <label for="sku">SKU: </label>
            <input type="text" id="sku" name="sku" required pattern="^[a-zA-Z01-9_\-!@#$%^&*()=]+$"/>
        </div>
        <div>
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" required pattern="^[a-zA-Z01-9_\-][a-zA-Z01-9_\-\s]*$"/>
        </div>
        <div>
            <label for="price">Price: </label>
            <input type="number" id="price" name="price" required min="0" step=".01" pattern="^\d*(\.\d{0,2})?$"/>
        </div>
        <div>
            <label for="category">Type: </label>
            <select name="category" id="productType" required>
                <option disabled selected value> -- select an option -- </option>
                <option value="DVD-disc">DVD-disc</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
        </div>
        <div id="size-div">
        </div>
    </form>
<?php require "./inc/footer-alt.php" ?>