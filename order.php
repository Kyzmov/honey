<?php
include 'db_connect.php';
include 'header.php';

// Fetch all products
$query = "SELECT * FROM products";
$result = $conn->query($query);
$products = $result->fetch_all(MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $insert_query = "INSERT INTO orders (product_id, quantity, customer_name, customer_email, customer_address) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("iisss", $product_id, $quantity, $name, $email, $address);

    if ($stmt->execute()) {
        $success_message = "Order placed successfully!";
    } else {
        $error_message = "Error placing order. Please try again.";
    }
}
?>

<main>
    <section id="order-form">
        <h2>Place an Order</h2>
        <?php
        if (isset($success_message)) {
            echo "<p class='success'>{$success_message}</p>";
        }
        if (isset($error_message)) {
            echo "<p class='error'>{$error_message}</p>";
        }
        ?>
        <form method="post" class="vertical-form">
            <label for="product_id">Select Product:</label>
            <select id="product_id" name="product_id" required>
                <?php foreach ($products as $product): ?>
                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                <?php endforeach; ?>
            </select>

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