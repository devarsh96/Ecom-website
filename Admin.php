<table id="admintable">
        <thead class="tableHeader">
            <tr class="headerrow">
                <th>Username</th>
                <th>Name</th>
                <th>No of products</th>
                <th>Amount</th>
                <th>Payment method</th>
                <th>Address</th>
                <th>Postal Code</th>
            </tr>
        </thead>
        <tbody class="tableBody">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bicycle_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM orders inner join users on orders.user_id = users.user_id");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        for ($i = 0; $i < count($rows); $i++) {               
            echo "<tr class='bodyRow' onclick='javascript:openAdminOrderedProduct(" . $rows[$i]['order_id'] . ")'>"
            . "<td>" . $rows[$i]['username'] . "</td>"
            . "<td>" . $rows[$i]['first_name'] . $rows[$i]['last_name'] . "</td>"
            . "<td>" . $rows[$i]['total_items'] . "</td>"
            . "<td>$" . $rows[$i]['total_price'] . "</td>"
            . "<td>" . (($rows[$i]['payment_method'] == "c_o_d") ? "Cash On delivery" : "Credit card") . "</td>"
            . "<td>" . $rows[$i]['address'] . "</td>"
            . "<td>" . $rows[$i]['postal_code'] . "</td>"
            . "</tr>";
        }

    }

    $stmt->close();
    $conn->close();
?>

</tbody>
</table>
