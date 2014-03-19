<?php
 if($_GET['option'] == 1){

 	if(isset($_GET['submit'])){
 		$queryString = "INSERT into rss_feeds1 VALUES('','$_GET[url]','$_GET[title]')";
 		$resultSet = $mysqli->query($queryString);
 		$theHTML .= "<p style=\"color:green\">RSS Feed added successfully!</p>";
  	}
	 else{
                $theHTML .= "<h3>Enter the required values to add ad RSS Feed:</h3>";
	 	$theHTML .= "<form action=\"admin.php\" method=\"get\">";
 		$theHTML .= "<table border='1'>\n";
 		$theHTML .= "<tr><td>Title:</td><td><input type=\"text\" name=\"title\" /></td></tr>";
 		$theHTML .= "<tr><td>URL:</td><td><input type=\"text\" name=\"url\" /></td></tr>";
 		$theHTML .= "</table>";
 		$theHTML .= "<input type=\"hidden\" name=\"option\" value=\"1\" />";
 		$theHTML .= "<input type=\"submit\" name=\"submit\" value=\"Add\" />";
 		$theHTML .= "<input type=\"reset\" value=\"Reset form\" />\n";
 		$theHTML .= "</form>";


 	}

 } else if($_GET['option'] == 2){

$gHostName="localhost";
$gUserName="cnd6006"; // change to your nova id
$gPassword="60195cd";
$gDBName="cnd6006"; // change to the database you wish to select.

//Open connection
$mysqli= new mysqli($gHostName,$gUserName,$gPassword,$gDBName);



 	if(isset($_GET['submit'])){
 		$queryString = "DELETE from rss_feeds where rssID='$_GET[DeleteRss]'";
 		$resultSet = $mysqli->query($queryString);
 		$theHTML .= "<p style=\"color:green\">RSS Feed deleted successfully!</p>\n";
  	}
	 else{

  		$queryString = "select * from rss_feeds1";
 		$resultSet = $mysqli->query($queryString);

 		$theHTML .= "<h3>The Current RSS Feeds:</h3>";
 		$theHTML .= "<form action=\"admin.php\" method=\"get\">\n";
 		$theHTML .= "<table>\n";

		 while ($row = $resultSet->fetch_assoc()){
 			$theHTML .= "<tr><td><input type=\"radio\" name=\"DeleteRss\" value=\"$row[rssID]\" /></td><td>$row[title]</td></tr>\n";
 		}
 		$theHTML .= "</table>";
 		$theHTML .= "<input type=\"hidden\" name=\"option\" value=\"2\" />\n";
		$theHTML .= "<input type=\"submit\" name=\"submit\" value=\"Delete\" />\n";
		$theHTML .= "<input type=\"reset\" value=\"Reset form\" />\n";
 		$theHTML .= "</form>";
 	}
 }
echo $theHTML;


?>
