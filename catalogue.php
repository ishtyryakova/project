<?php 
$title = "Главная страница";
require_once('templates/top.php');

$id = (int)$_GET["id"];

$query ="SELECT * FROM catalogues WHERE id='$id'";
$adr =  mysqli_query($db_con, $query);


if (!$adr)	{
		exit($query);
			
	}
	
$tbl_catalogue = mysqli_fetch_array($adr);
?>	

<h2><?=$tbl_catalogue["name"]?></h2>

<?=$tbl_catalogue["body"]?>

<?=$tbl_catalogue["body"]?>

	
          
		  
<?php require_once('templates/bottom.php')?>