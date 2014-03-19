<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
        session_name("Courtney" . sha1($_SERVER['REMOTE_ADDR']));
        session_start();
        include_once("functions_inc.php");
        print_html_header('Users\'s View');
        if(isset($_SESSION['password']))
        {
        error_reporting(E_ALL);          // place these two lines at the top of
        ini_set('display_errors', 1);    // the script you are debugging
       
        if(isset($_COOKIE['selectedTopic']))
        {
            $selectedTopic = $_COOKIE['selectedTopic'];
        }
        else
            {
                $selectedTopic = 'Most Recent';
            }
        
        //Connection info.
        $gHostName="localhost";
        $gUserName="cnd6006"; // change to your nova id
        $gPassword="60195cd";
        $gDBName="cnd6006"; // change to the database you wish to select.

        $mysqli= new mysqli($gHostName, $gUserName,$gPassword,$gDBName);

        if($mysqli->connect_error){
            echo("Connection failed: ". mysqli_connect_error());
            exit();
        }

        $theHTML  = "<div id='main_wrapper'>";
        $theHTML .=  "<div id='header'>";
        $theHTML .=     "<div id='header_inner'>";
        $theHTML .=        "<img src=\"header.gif\" alt=\"Header for the IPhone Web Portal\" width=\"850\" height=\"172\"/>";
        $theHTML .= "</div>";
        $theHTML .=   "</div>";
        $theHTML .=   "<div id='nav'>";
        $theHTML .=        "<div id='nav_inner'>";
        $theHTML .=          "<div id=\"menu-links\">\n";
        $theHTML .=            "<ul id='links'>"; //may need to use DOM + AJAX to replace links
        $theHTML .=              "<li><a class=\"link\" href=\"logout.php\">Logout</a></li>\n";
                                    $queryString = "Select * from rss_feeds1";
                                    $resultSet = $mysqli->query($queryString);

                                    While($current = $resultSet->fetch_assoc())
                                    {
                                       $theHTML .= "<li><a class=\"link\" href=\"displayFeedTopic.php?feedTopic=".$current['title']."\" onclick=\"displayFeeds(this.href); return false; \">".$current['title']."</a></li>\n";
                                    }
        $theHTML .=            "</ul>";
        $theHTML .=         "</div>";
        $theHTML .=       "</div>";
        $theHTML .=    "</div>";
        $theHTML .=    "<div id='content'>";
        $theHTML .=        "<div id='content_inner'>";
                       $queryString = "Select * from rss_feeds1 where title = '$selectedTopic'";
                     $resultSet = $mysqli->query($queryString);
                     $xml = $resultSet->fetch_object();

                     $xmlDoc = new DOMDocument();
                     $xmlDoc->load($xml->url);

                     $title = $xmlDoc->getElementsByTagName('title')->item(0)->nodeValue;
                     $description=$xmlDoc->getElementsByTagName('description')->item(0)->nodeValue;
        $theHTML  .=  "<div id='rssTitle' style='font-size:1.5em'>".$xml->title."</div>";
        
        //$theHTML .=  "<p><em>$description</em></p>";
        $theHTML .=  "<hr />";
                     $items=$xmlDoc->getElementsByTagName('item');

                     foreach($items as $item){
                        $title = $item->getElementsByTagName('title')->item(0)->nodeValue;
                        $description=$item->getElementsByTagName('description')->item(0)->nodeValue;
                        $link=$item->getElementsByTagName('link')->item(0)->nodeValue;
        $theHTML .=     "<div id='link' ><a class='link' style='text-decoration:none' href='$link'>";
        $theHTML .=         "<h3>$title</h3>\n";
        $theHTML .=         "<p><em>$description<br />Read More...</em></p>\n";
        $theHTML .=         "<hr />\n";
        $theHTML .=     "</a></div>";
                    

                     }


        $theHTML .=        "</div>";
        $theHTML .=    "</div>";
        $theHTML .=    "<div id='footer'>";
        $theHTML .=        "<div id='footer_inner'>";
        $theHTML .=                    "<p style=\"margin-top:0; margin-bottom:0; padding-top:0; padding-bottom:0;\"  align=\"center\">
                       	    <a href=\"http://validator.w3.org/check?uri=referer\"><img border=\"0\"
                	       src=\"http://www.w3.org/Icons/valid-xhtml10\"
                 	     	alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a>";
        $theHTML .=        "</div>";
        $theHTML .=    "</div>";
        $theHTML .="</div>";
        echo $theHTML;
        }
        print_html_footer();
?>
