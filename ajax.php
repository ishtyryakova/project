<?php
require_once('config/config.php');
$p_url = $_POST['url'];
$arr = explode('=', $p_url);



$query = "SELECT * FROM maintexts WHERE url = '".$arr[1]."'";


$adr =  mysqli_query($db_con, $query);


if (!$adr)	{
		exit($query);
			
	}

	$tbl_maintext = mysqli_fetch_array($adr);
		
		
		
echo "<h2>".$tbl_maintext['name']."</h2>";
echo "<div>".$tbl_maintext['body']."</div>";
?>