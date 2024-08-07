Set the link for logout

<a href="../logout.php">Logout</a>

Create page logout.php and add the code

<?php
session_start();
session_destroy();
header("location:Guest/login.php");
?>


Add the following code in header.php file

<?php
session_start();
if(!isset($_SESSION["loginid"]))
{
	header("location:../Guest/login.php");
}
?>
