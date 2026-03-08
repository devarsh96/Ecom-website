<table id="admintable">
        <thead class="tableHeader">
            <tr class="headerrow">
                <th>Product Name</th>
                <th>Price</th>
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

    $order_id = $_GET['order_id'];

    $stmt = $conn->prepare("SELECT * FROM ordered_product where order_id = " . $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        for ($i = 0; $i < count($rows); $i++) {               
            echo "<tr class='bodyRow'>"
            . "<td>" . $rows[$i]['product_name'] . "</td>"
            . "<td>" . $rows[$i]['price'] . "</td>"
            . "</tr>";
        }
    }

    $stmt->close();
    $conn->close();
?>

</tbody>
</table>
