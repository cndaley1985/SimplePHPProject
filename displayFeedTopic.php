<?php
        error_reporting(E_ALL);          // place these two lines at the top of
        ini_set('display_errors', 1);    // the script you are debugging
       

        //Connection info.
        $gHostName="localhost";
        $gUserName="cnd6006"; // change to your nova id
        $gPassword="60195cd";
        $gDBName="cnd6006"; // change to the database you wish to select.

        $mysqli= new mysqli($gHostName, $gUserName,$gPassword,$gDBName);

        if(isset($_GET['feedTopic']))
        {
            $selectedTopic = $_GET['feedTopic'];//get selected feed topic from parameter feedTopic
            setcookie('selectedTopic',$selectedTopic);
        }
        

                    $queryString = "Select * from rss_feeds1 where title = '$selectedTopic'";
                     $resultSet = $mysqli->query($queryString);
                     $xml = $resultSet->fetch_object();

                     $xmlDoc = new DOMDocument();
                     $xmlDoc->load($xml->url);

                     $title = $xmlDoc->getElementsByTagName('title')->item(0)->nodeValue;
                     $description=$xmlDoc->getElementsByTagName('description')->item(0)->nodeValue;
        $theHTML  =  "<div id='rssTitle' style='font-size:1.5em'>".$xml->title."</div>";
        $theHTML .=  "<hr />";
        //$theHTML .=  "<p><em>$description</em></p>";
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


       echo $theHTML;


?>
