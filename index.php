<?php  
include 'db_connect.php';  
include 'header.php';  

// Fetch all products  
$query = "SELECT * FROM products";  
$result = $conn->query($query);  
$products = $result->fetch_all(MYSQLI_ASSOC);  
?>  

<main>  
    <section id="products">  
        <h2 class="section-title">Продукти</h2>  
        <div class="product-container">  
            <?php foreach ($products as $product): ?>  
                <div class="product">  
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">  
                    <h3><?php echo $product['name']; ?></h3>  
                    <p><?php echo $product['description']; ?></p>  
                    <p class="price">Price: $<?php echo number_format($product['price'], 2); ?></p>  
                    <a href="order.php" class="order-button">Поръчай</a>  
                </div>  
            <?php endforeach; ?>  
        </div>  
    </section>  
</main>  

<?php include 'footer.php'; ?>