<?php include "./inc/header.php" ?>

    <div class="container">
        <?php
            $sql = 'SELECT * FROM products';
            //var_dump($_SESSION['conn']);
            $result = mysqli_query($_SESSION['conn'], $sql);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>

        <?php foreach($products as $product): ?>
            <div class="item">
                <input type="checkbox" id="<?php echo $product["SKU"] ?>">
                <p><?php echo $product["SKU"] ?></p>
                <p><?php echo $product["name"] ?></p>
                <p class="price"><?php echo $product["price"] ?></p>
                <p class="size"><?php echo $product["size"] ?></p>
            </div>
        <?php endforeach ?>
        <!--
        <div class="item">
            <input type="checkbox" id="JVC200123">
            <p>JVC200123</p>
            <p>Portable Table</p>
            <p class="price">199.00</p>
            <p class="size">10x50x30</p>
        </div>
        -->
    </div>

<?php include "./inc/footer.php" ?>