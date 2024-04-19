<?php
$conn = Database::getConnection();
$sql = "SELECT id, drug_name, price FROM drug_data";
$result = $conn->query($sql);
?>
<br><br><br>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped custom-table">
            <thead>
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price (₹)</th>
                    <th scope="col">Add to Cart</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $sr_no = 1;
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $sr_no++; ?></td>
                            <td><?php echo $row["drug_name"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <!-- add "add to cart" button here -->
                            <td>
                                <form action="libs/add_to_cart.php" method="post">
                                    <input type="hidden" name="drug_name" value="<?php echo $row["drug_name"]; ?>">
                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                                    <button type="button" class="primary addToCartBtn" onclick="addToCart(<?php echo $row['id'] ?>)" id="add-to-cart-<?php echo $row['id'];?>">Add to Cart</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
?>
            </tbody>
        </table>
    </div>
</div>
<br><br><br>