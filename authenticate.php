<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
        session_name("Courtney" . sha1($_SERVER['REMOTE_ADDR']));
        session_start();
        if (isset($_POST['submit'])){

	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];

        //Connection info.
        $gHostName="localhost";
        $gUserName="cnd6006"; // change to your nova id
        $gPassword="60195cd";
        $gDBName="cnd6006"; // change to the database you wish to select.

        //Open connection
        $mysqli= new mysqli($gHostName,$gUserName,$gPassword,$gDBName);

        //check connection
            if ($mysqli->connect_error) {
                 echo("Connect failed: " . mysqli_connect_error());
                 exit();
            }


            //Select all users
            $queryString = "select * from users";//remeber to change back to users
            $resultSet = $mysqli->query($queryString);

            //Authenticate user
            while ($row = $resultSet->fetch_assoc()){
		if( $row['Username']==$_SESSION['username'] && sha1($_SESSION['password'])==$row['Encrypted_Password']){
		$userType =	$row['Admin_Previleges'];
                }

                if ($userType == 1) {
                    header("location: admin.php?option=1");
                } elseif ($userType == 0) {
                         header("location: userView.php");
                } else {
                        echo "You entered an invalid password or user name";
                }
           }
    }

?>
