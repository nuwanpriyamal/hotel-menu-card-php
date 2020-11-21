<?php
include("db.php");
$pagename="DEATAILS"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file

echo "<h4>Food ordering System</h4>"; //display name of the page on the web page

$prodid=$_GET['u_prod_id'];

// database connection
$SQL="select * from product WHERE prodId = ".$prodid;
//run SQL query for connected DB or exit and display error message
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

$arrayp=mysqli_fetch_array($exeSQL);
echo "<img src=images/uploads/".$arrayp['prodPicNameLarge']." height=300 width=300 style='float:left; margin:10px;'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$arrayp['prodDescripLong']."</p>";
echo "<p><b>LK Rs ".$arrayp['prodPrice']."</b></p>";
echo "<p>Number left in stock: ".$arrayp['prodQuantity']."</p>";

echo "<p>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";
echo "<select name=prodQuantity>";
for($x=1; $x<=$arrayp['prodQuantity']; $x++){
	echo "<option value=".$x.">".$x."</option>";
}

echo "</select>";
echo "<input type=submit value='ADD BASKET TO ORDER'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";
echo "</form>";
include("footfile.html"); //include head layout
echo "</body>";
?>