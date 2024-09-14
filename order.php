<?php
include 'db_connect.php';
include 'header.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Fetch product details
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process order here (you'll need to implement this part)
}
?>

<main>
    <section id="order-form">
        <h2>Order <?php echo $product['name']; ?></h2>
        <form method="post" class="vertical-form">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="address">Delivery Address:</label>
            <textarea id="address" name="address" required></textarea>
            
            <button type="submit">Place Order</button>
        </form>
    </section>
</main>

<?php include 'footer.php'; ?>