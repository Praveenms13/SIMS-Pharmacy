<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $conn = Database::getConnection();

    
    // Insert order details into orders table
    $userid = Session::getUser()->getId();
    $orderQuery = "INSERT INTO orders (user_id, name, email, phone, address, pincode) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($orderQuery);
    $stmt->bind_param("ssssss", $userid, $name, $email, $phone, $address, $pincode);
    $stmt->execute();
    // Get the last inserted order id
    $orderId = $stmt->insert_id;

    // Fetch cart items
    $cartQuery = "SELECT * FROM cart";
    $cartResult = $conn->query($cartQuery);

    // Insert cart items into order_items table
    while ($row = $cartResult->fetch_assoc()) {
        $drug_name = $row['drug_name'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $orderItemQuery = "INSERT INTO order_items (order_id, drug_name, price, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($orderItemQuery);
        $stmt->bind_param("isdi", $orderId, $drug_name, $price, $quantity);
        $stmt->execute();
    }
    
    // Clear the cart (optional)
    $clearCartQuery = "DELETE FROM cart";
    $conn->query($clearCartQuery);
    ?>
    <script>
        window.location.href = "thank_you.php?order_id=<?php echo $orderId; ?>";
    </script>
    <?php
    exit();
}
?>
