<?php

// Assume you have a database connection in $conn
$conn = Database::getConnection();

// Get order ID from URL
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;

// Fetch order details
$orderQuery = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($orderQuery);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$orderResult = $stmt->get_result();
$order = $orderResult->fetch_assoc();

// Fetch ordered items
$orderItemsQuery = "SELECT * FROM order_items WHERE order_id = ?";
$stmt = $conn->prepare($orderItemsQuery);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$orderItemsResult = $stmt->get_result();
$orderItems = [];  // Initialize the $orderItems array
while ($row = $orderItemsResult->fetch_assoc()) {
    $orderItems[] = $row;
}

// print_r($orderItems);
?>

<div class="container mt-5">
    <h2 class="mb-4">Thank You for Your Order!</h2>
    <p>Your order has been placed successfully. Here are the details:</p>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order ID: <?php echo $order['id']; ?></h5>
            <p class="card-text"><strong>Name:</strong> <?php echo $order['name']; ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo $order['email']; ?></p>
            <p class="card-text"><strong>Phone:</strong> <?php echo $order['phone']; ?></p>
            <p class="card-text"><strong>Address:</strong> <?php echo $order['address']; ?></p>
            <p class="card-text"><strong>Pincode:</strong> <?php echo $order['pincode']; ?></p>
            <h5 class="card-title">Ordered Products</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Drug Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($orderItems as $row) {
                            echo "<tr>";
                            echo "<td>{$row['drug_name']}</td>";
                            echo "<td>{$row['price']}</td>";
                            echo "<td>{$row['quantity']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
