<?php

include ("db.php"); //include db.php file to connect to DB


$pagename="Home"; 
$shopname="Bony CAFE";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "<h3>"."<center>" .$shopname."</center>"."</h3>";
echo "<p> ######################################
#############################################
#######################################";

//create a $SQL variable and populate it with a SQL statement that retrieves product details
$aSQL="select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from product where category='B'";
$bSQL="select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from product where category='R'";
$cSQL="select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from product where category='J'";
$dSQL="select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from product where category='S'";
$eSQL="select prodId, prodName, prodPicNameSmall,prodDescripShort,prodPrice from product where category='D'";


//run SQL query for connected DB or exit and display error message

function item($conn,$SQL) {
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
   
    echo "<table style='border: 0px'>";

    
    while ($arrayp=mysqli_fetch_array($exeSQL))
    { 

        echo "<td style='border: 0px'>";
    //make the image into an anchor to prodbuy.php and pass the product id by URL (the id from the array)
    echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
    //display the small image whose name is contained in the array
    echo "<img src=images/uploads/".$arrayp['prodPicNameSmall']." height=200 width=200>";
    echo "</a>";
    
    echo "</td>";
    echo "<td style='border: 0px'>";
    echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
    echo "<p>".$arrayp['prodDescripShort']."</p>";
    echo "<p><b>LK Rs ".$arrayp['prodPrice']."</b></p>";
    echo "</td>";
    echo "</tr>";
    }
    echo "</table>";
  }
  echo"<h3><b><i>Breakfast</i></b></h3>";
  item($conn,$aSQL);
  echo"<h3><b><i>Rice</i></b></h3>";
  item($conn,$bSQL);
  echo"<h3><b><i>Juice</i></b></h3>";
  item($conn,$cSQL);
  echo"<h3><b><i>Soup</i></b></h3>";
  item($conn,$dSQL);
  echo"<h3><b><i>Dinner</i></b></h3>";
  item($conn,$eSQL);

include("footfile.html"); //include head layout
echo "</body>";
?>