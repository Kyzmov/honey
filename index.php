<?php
// Include database connection
include 'db_connect.php';

// Fetch products from database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пчелни продукти</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo-container">
        <img src="images/logo.png" alt="Natural Products Logo" class="logo">
    </div>
    <h1>Пчелни продукти</h1>
    <nav>
    <ul>
                <li><a href="index.php">Продукти</a></li>
                <li><a href="about.php">За нас</a></li>
                <li><a href="contact.php">Контакти</a></li>
    </ul>       
        </nav>
    </header>

    <main>
    <section id="products">
     
        <div class="product-container">
            <?php
            $products = [
                ['id' => 1, 'name' => 'Мед', 'image' => 'pr1.png'],
                ['id' => 2, 'name' => 'Прополис', 'image' => 'pr2.png'],
                ['id' => 3, 'name' => 'Пчелен прашец', 'image' => 'pr3.png']
            ];

            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<img src='" . $product['image'] . "' alt='" . $product['name'] . "' class='product-image'>";
                echo "<h3>" . $product['name'] . "</h3>";
                echo "<a href='order.php?id=" . $product['id'] . "' class='order-button'>Order Now</a>";
                echo "</div>";
            }
            ?>
        </div>
    </section>
</main>

    <footer>
        <p>&copy; 2024 Honey Products. All rights reserved.</p>
    </footer>
</body>
</html>