<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .orders-container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      padding: 30px;
      max-width: 800px;
      margin: 0 auto;
      margin-top: 100px;
    }
    .order-card {
      border-radius: 10px;
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-bottom: 20px;
      background-color: #f8f9fa;
    }
    .order-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .order-header h3 {
      font-weight: bold;
      color: #333;
    }
    .order-header span {
      color: #666;
      font-size: 14px;
    }
    .order-items {
      margin-bottom: 10px;
    }
    .order-total {
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="orders-container">
      <h2 class="text-center mb-4">My Orders</h2>
      <?php
      $conn = Database::getConnection();
      $orders = "SELECT * FROM orders WHERE user_id = " . Session::getUser()->getId();
      $result = $conn->query($orders);
      if ($result) {
        while ($order = $result->fetch_assoc()) {
          $order_id = $order['id'];
          $order_date = $order['order_date'];
          $order_items = "SELECT * FROM order_items WHERE order_id = " . $order_id;
          $items = $conn->query($order_items);
          $total = 0;
          ?>
          <div class="order-card">
            <div class="order-header">
              <h3>Order #<?php echo $order_id; ?></h3>
              <span>Placed on: <?php echo $order_date; ?></span>
            </div>
            <div class="order-items">
              <?php
              while ($item = $items->fetch_assoc()) {
                $total += $item['price'] * $item['quantity'];
                echo "<p>{$item['drug_name']}</p>";
              }
              ?>
            </div>
            <div class="order-total">Total: Rs. <?php echo $total; ?></div>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>