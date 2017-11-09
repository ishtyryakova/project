<?php require_once('config/config.php');
if ($_SESSION['user_id'])	{
if($_GET['id'])	{
	$id=(int)$_GET['id'];
}
else	{
	$id=0;

}
$query ="SELECT * FROM products WHERE id = $id";
$adr = mysqli_query($db_con, $query);
	if(!$adr)	{
			exit($query);
	}
	$pic = mysqli_fetch_array($adr);
	if($pic['picture']){
		$file = '/media/uploads/'.$pic['picture'];
		if (file_exists($file))	{
			@unlink($file);
		}
	}

$query = "DELETE FROM products WHERE id = $id AND user_id = ".$_SESSION['user_id'];
$adr = mysqli_query($db_con, $query);
	if(!$adr)	{
			exit($query);
	}
	
}



?>

<script>
document.location.href="cabinet.php"
</script>