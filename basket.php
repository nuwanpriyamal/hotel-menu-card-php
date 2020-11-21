<?php
if (!isset($_SESSION)) {
    session_start();
}
include "db.php"; //include db.php file to connect to DB
$pagename = "Your Smart Bucket"; //create and populate variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>" . $pagename . "</title>";
echo "<body>";
include "headfile.html";
echo "<h4>" . $pagename . "</h4>";

if (isset($_POST['removeId'])) {
    unset($_SESSION['basket'][$_POST['removeId']]);
    echo "1 item removed from the basket</br></br>";
}

if (isset($_POST["h_prodid"])) {
    $newprodid = $_POST["h_prodid"];
    $reququantity = $_POST["prodQuantity"];
    echo "Id of selected food item : " . $newprodid;
    echo "</br>Quantity of selected food : " . $reququantity;
    //create a new cell in the basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity
    $_SESSION['basket'][$newprodid] = $reququantity;
//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
    echo "<p>1 item added";

} 

if (isset($_SESSION['basket']) && count($_SESSION['basket']) > 0) {
    echo "<table><tr><th>food Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
    $total = 0;
    foreach ($_SESSION['basket'] as $index => $value) {
        $SQL = "select * from product WHERE prodId = " . $index;
        $exeSQL = mysqli_query($conn, $SQL);
        $arrayp = array();
        while ($row = mysqli_fetch_assoc($exeSQL)) {
            $arrayp[] = $row;
        }

        echo "<tr>";
        foreach ($arrayp as $user) {
            echo "<td>" . $user["prodName"] . "</td>";
            echo "<td>LK Rs " . $user["prodPrice"] . "</td>";
            echo "<td>" . $value . "</td>";
            $subTotal = 0;
            $subTotal = $user["prodPrice"] * $value;
            echo "<td>LK Rs " . $subTotal . "</td>";
            $total += $subTotal;

            echo "<td><form action='basket.php' method='post'><input type=hidden name=removeId value=$index><button type='submit'>Remove</button></form></td>";
        }
    }

    echo "</tr>";
    echo '<tr><td colspan="3" style="text-align:right;"><b>Total</b></td><td><b>LK Rs ' . $total . '</td></b></tr>';
    echo "</table>";
    echo "<a href='clearbasket.php'> Clear the Basket</a></br></br>";


    
    //not yet build.

} else {
    echo "Current basket is empty</br>";
}

include "footfile.html";
echo "</body>";
