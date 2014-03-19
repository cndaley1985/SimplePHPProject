<?php
  session_name("Courtney" . sha1($_SERVER['REMOTE_ADDR']));
  session_start();
include_once("functions_inc.php");
print_html_header('Adminitstrator\'s View');
//admin page
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_SESSION['password']))
{

$gHostName="localhost";
$gUserName="cnd6006"; // change to your nova id
$gPassword="60195cd";
$gDBName="cnd6006"; // change to the database you wish to select.

//Open connection
$mysqli= new mysqli($gHostName,$gUserName,$gPassword,$gDBName);


  $theHTML  = "<div id=\"main_wrapper\">\n";
 echo "<div id=\"main_wrapper\">\n";
 echo "<div id=\"header\">\n";
 echo 	"<div id=\"header_inner\">\n";
 echo 		"<img src=\"header.gif\" alt=\"Header for the IPhone Web Portal\" width=\"850\" height=\"172\"/>";
 echo 	"</div>\n";
 echo "</div>\n";
 echo 	"<div id=\"nav\">\n";
 echo 		"<div id=\"nav_inner\">\n";
 echo			"<div id=\"menu-links\">\n";
 echo				"<ul>\n";
 echo 					"<li><a class=\"link\" href=\"logout.php\">Logout</a></li>\n";
 echo						"<li><a class=\"link\" href=\"displayModifiedRSS.php?option=1 \" onclick=\"displayFeeds(this.href); return false; \">Add Feed</a></li>\n";
 echo                                               "<li><a class=\"link\" href=\"displayModifiedRSS.php?option=2 \" onclick=\"displayFeeds(this.href); return false; \" >Delete Feed</a></li>\n";
 echo 				"</ul>\n";
 echo 			"</div>\n";
 echo 		"</div>\n";
 echo "</div>\n";
 echo 	"<div id=\"content\">\n";
 echo 		"<div id=\"content_inner\">\n";
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
 	if(isset($_GET['submit'])){
 		$queryString = "DELETE from rss_feeds1 where rssID='$_GET[DeleteRss]'";
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
echo 		"</div>\n";
		echo 	"</div>\n";
		echo 	"<div id=\"footer\">\n";
		echo		"<div id=\"footer_inner\">\n";
		echo		"<p style=\"margin-top:0; margin-bottom:0; padding-top:0; padding-bottom:0;\"  align=\"center\">
						    <a href=\"http://validator.w3.org/check?uri=referer\"><img border=\"0\"
						       src=\"http://www.w3.org/Icons/valid-xhtml10\"
							     	alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a>
					</p>";
		echo		"</div>\n";
		echo 	"</div>\n";
		echo "</div>\n";

 print_html_footer();
}

?>
