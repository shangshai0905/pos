<?php
include "connection.php";

// Get the updated data from the database
$sql = "SELECT * FROM orders";
$result = mysqli_query($connection, $sql);

// Build the HTML table with the updated data
$output = "";
$totalprice = 0;
if ($result->num_rows > 0) {
    $output .= "<tr>";
    $output .= "<td> Item Name </td>";
    $output .= "<td> Quantity </td>";
    $output .= "<td> Price </td>";
    $output .= "<td> Total </td>";
    $output .= "<tr>";

    while ($row = $result->fetch_assoc()) {
        $p_id = $row['p_id'];
        $name = $row['o_name'];
        $quantity = $row['o_quantity'];
        $price = $row['o_price'];
        $total = $quantity * $price;
        $totalprice = $totalprice + $total;
        $output .= "<td>{$name}</td>";
        $output .= "<td>{$quantity}</td>";
        $output .= "<td>₱{$price}</td>";
        $output .= "<td>₱{$total}</td>";
        $output .= "</tr>";
        
    }
    $output .= "<tr>";
    $output .= "<td style='padding-top: 20px'>TOTAL</td>";
    $output .= "<td colspan='2' style='padding-top: 20px'></td>";
    $output .= "<td style='padding-top: 20px'> '₱'{$totalprice}</td>";
    $output .= "</tr>";
    $output .= "<tr>";
    $output .= '<td>Amount Tend</td>';
    $output .= '<td colspan="2" style="padding-top: 20px"></td>';
    $output .= '<td id="amount"></td>';
    $output .= '</tr>';
    $output .= '<tr>';
    $output .= '<td>Change</td>';
    $output .= '<td colspan="2" style="padding-top: 20px"></td>';
    $output .= '<td id="change"></td>';
    $output .= '</tr>';
    $output .= '<tr>';
    $output .= '<td colspan="4"> THANK YOU!! </td>';
    $output .= '</tr>';
if(isset($p_id) && isset($quantity)) {
        $sql = "UPDATE orders SET o_quantity='$quantity' WHERE p_id='$p_id'";
        $result = mysqli_query($connection, $sql);
    }
    
} else {
    $output = "<tr><td colspan='4'>No records found</td></tr>";
}

echo $output;
?>
