<?php 
$pagename="Template"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>About food menu</h4>"; //display name of the page on the web page
//display random text
echo"hello every one.this is food reservation system";
include("footfile.html"); //include head layout
?>
