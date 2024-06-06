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
                    while ($row = $result->fetch_assoc()) { 
                        $id = $row['id'];
                        $sql = "SELECT * from cart WHERE id = '$id'"; 
                        $result_ = $conn->query($sql);
                        if ($result_->num_rows > 0) {
                            while($row2 = $result_->fetch_assoc()) {
                                if ($id == $row2['id']) {
                                    $text = "Added to Cart";
                                    $button = "<button type='button' class='primary addToCartBtn'>" . $text . "</button>";
                                } 
                            }
                        } else {
                            $text = "Add to Cart";
                            $button = "<button type='button' class='primary addToCartBtn' onclick='addToCart(" . $row['id'] . ")' id='add-to-cart-" . $row['id'] . "'>" . $text . "</button>";
                        }
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
                                    <?php echo $button; ?>
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