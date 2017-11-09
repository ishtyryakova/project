<?php 
$title = "Главная страница";
require_once('templates/top.php');

if (isset($_GET['url']))	{
			  $url = $_GET['url'];
			  
		  }
		  else	{
			  $url='index';
			 
		  }
		  $query ="SELECT * FROM maintexts WHERE url='$url'";
		
	$adr =  mysqli_query($db_con, $query);
	
	if (!$adr)	{
		exit($query);
			
	}

	$tbl_maintext = mysqli_fetch_array($adr);
	
	/* echo "<pre>";
	print_r($tbl_maintext);
	echo "</pre>"; */






?>

          <h1>
			<?=$tbl_maintext['name'];?>
          </h1>

          
		  
<?php require_once('templates/bottom.php')?>