<?php 
require_once('phpQuery/phpQuery/phpQuery.php');
require_once('config/config.php');

$query = "SELECT * FROM products WHERE picture = ''";
$adr =  mysqli_query($db_con, $query);
if (!$adr)	{
		exit($query);
			
	}
while($prod=mysqli_fetch_array($adr))	{
	$str = preg_replace('/ /', '+', $prod['name']);
	$url ='http://www.google.by/search?q='.$str.'&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjG1c26zcPXAhXEXBoKHUcMD_QQ_AUICigB&biw=1534&bih=848';
	$hap = file_get_contents($url);
	
	$document = phpQuery::newDocument($hap);
	$hentry = $document->find('.images_table img:eq(1)');
	$src = $document->find('.images_table img:eq(1)')->attr('src');
	$dir = $_SERVER['DOCUMENT-ROOT'].'/media/uploads/';
	$newfile = date('y_m_d_h_i_s').'.jpg';
	if(copy($src, $dir.$newfile))	{
		$query1 = "UPDATE products SET picture = '$newfile' WHERE id=".$prod['id'];
		$adr1 =  mysqli_query($db_con, $query1);
			if (!$adr1)	{
					exit($query1);
						
				}
	}else{
		echo "Failed to copy".$src;
	}
	
	
	
	
	echo $hentry;
	echo $src;
	echo "<hr />";
	sleep(1);
	
}








?>