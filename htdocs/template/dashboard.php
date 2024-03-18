<?php
$conn = Database::getConnection();
$sql = "SELECT drug_name, price FROM drug_data";
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
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='3'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br><br><br>