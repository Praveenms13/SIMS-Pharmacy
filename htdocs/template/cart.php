<?php
$conn = Database::getConnection();
$sql = "SELECT * FROM cart WHERE user_id = " . Session::getUser()->getId(); 
$result = $conn->query($sql);

?>
<div class="container mt-5">
    <h2 class="mb-4">Your Cart</h2>
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
                $total = 0;
                while($row = $result->fetch_assoc()) {
                    $total += $row['price'] * $row['quantity'];
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

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <hr>
            <h4>Checkout</h4>
            <form action="checkout.php" method="post" action="/checkout">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Full Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="number" class="form-control" id="pincode" name="pincode" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Checkout</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<script> 
    var cartCount = getCartCount(); 
    if (cartCount = 0) {
        document.querySelector('.cart-text').innerHTML = 'Your cart is empty';
    } else {
        document.querySelector('.cart-text').innerHTML = 'You have ' + cartCount + ' items in your cart';
    }
</script>