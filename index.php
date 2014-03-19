<?php
     include_once("functions_inc.php");
     print_html_header('Users\'s View');

echo <<<END
        <div id="main_wrapper">
	<div id="header">
	<div id="header_inner">
		<img src="header.gif" alt="Header for the IPhone Web Portal" width="850" height="172"/>
	</div>
	</div>
	<div id="nav">
	<div id="nav_inner">
	

	<!-- Display form -->
	<form action="authenticate.php" method="post" style="margin-left:.2em; margin-top:.2em">
		<h3 style="text-align:center; margin-bottom: 0em;">Login</h3>
		<hr />
		<table border="0" cellpadding="5">
			<tr><th width="77" align="right">User ID:</th><td width="176"><input type="text" value="" name="username" size="15"/></td></tr>
			<tr><th width="77" align="right">Password:</th><td width="176"><input type="password" name="password" value="" size="15" /><br/></td></tr>
			<tr><td colspan="2"><input style="margin-left:10em;"name="submit" type="submit" value="Submit"/></tr>
		</table>
                <hr />
	</form>
	

	</div>
	</div>
	<div id="content">
	<div id="content_inner">
	<h2>Welcome to the iPhone Web Portal!</h2>
        <h3>Our Goal:</h3>
	<p>To provide a web portal/content aggregation site that will display a number of RSS Feeds related to iPhone Applications and Development.</p>
        
        <h3> People will come to the site to obtain:</h3>
        <ul>
        <li>Information about the most recently added applications on the App Store</li>
	<li>Overview of the top 10 paid applications on the App Store</li>
	<li>An overview of the top 10 free applications on the App Store</li>
	<li>Access to learning material, terminology information </li>
	<li>Information on updated developers programming guide</li>
        </ul>
 
	</div>
	</div>
	<div id="footer">
	<div id="footer_inner">
	<p style="margin-top:0; margin-bottom:0; padding-top:0; padding-bottom:0;"  align="center">
		    <a href="http://validator.w3.org/check?uri=referer"><img border="0"
		       src="http://www.w3.org/Icons/valid-xhtml10"
		     	alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
	 </p>
	</div>
	</div>
	</div>
END;
 print_html_footer();
?>
    