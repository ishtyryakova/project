<?php require_once('templates/top.php');
	if ($_POST)	{
		
	$pname = $_POST['name'];
	$pbody = $_POST['body'];
	$pcatalogue_id = (int)$_POST['catalogue_id'];
	
		if ($_FILES)	{
			$_FILES['picture']['type'];
			
			$file_name_tmp = $_FILES['picture']['tmp_name'];
			$dir = '/media/uploads/';
			$file_new_name = $_SERVER['DOCUMENT_ROOT'].$dir;
			//$picture =  $_FILES['picture']['name']
			$picture =  date('y_m_d_h_i_s').'.jpg';
				if (move_uploaded_file($file_name_tmp, $file_new_name.$picture)){
					$ok= true;
				}
		}
		
		else {
			$picture='';
			echo "no file";
		}
		
		$query = "INSERT INTO products VALUES(
			NULL,
			'$pname',
			'$pbody',
			'$picture',
			'-',
			0,
			NOW(),
			'-',
			'".date('ymdhis')."',
			'new',
			$pcatalogue_id,
			".$_SESSION['user_id']."
		)";
		
		$ard = mysqli_query($db_con, $query);
		if (!$ard)	{
			exit('error');
		}
	?>
	
	<script>
		document.location.href="cabinet.php";
	</script>
	<?php
	
	
		
	}

	if ($_SESSION['user_id']){
?>
	

<form action="cabinet.php" method="post" enctype = "multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" rows="3" name="body" id="body" > </textarea>
  </div>
	<p class="help-block">Description here.</p>
  <div class="form-group">
    <label for="picture">File input</label>
	
    <input type="file" id="picture" name="picture">
    <p class="help-block">Example here.</p>
  </div>
    <div class="form-group">
		<label for="picture">Category</label>
		<select class="form-control" name="catalogue_id">
		
		<?php 
			$query = "SELECT * FROM catalogues";
			$adr = mysqli_query($db_con, $query);
			if(!$adr)	{
				exit("error");
			}
			while ($cats = mysqli_fetch_array($adr))	{
		?>
				<option value="<?php echo $cats['id']?>"><?php echo $cats['name']?></option>
			
		<?php
			}
		?></select>
		</div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
} else {


?>
<div class="error">Ошибка доступа</div>

<?php
}
?>

<table class="table table-bordered">
	<tr>
		<th>Photo</th>
		<th>Name</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
	
	
<?php

$query = "SELECT * FROM products WHERE	user_id =".
$_SESSION['user_id'];
$adr = mysqli_query($db_con, $query);
	if(!$adr)	{
			exit($query);
	}
	while($prod = mysqli_fetch_array($adr))	{
	?>	
	
	<tr>
		<td width="200px">
		
	<?php 
		if ($prod['picture'] != ''){
			$pic = '/media/uploads/'.$prod['picture'];
		}
		else {
			$pic = '/media/uploads/no_photo.jpg';
		}
		
		$id = (int)$prod['id'];
	?>	
		<img src="<?php echo $pic;?>" width=100% class="pic"/>
		</td>
		<td><?php echo $prod['name']?></td>
		<td><?php echo $prod['price']?></td>
		<td class="action" >
			<a href="prodedit.php?id=<?php echo $id;?>" class="btn btn-success btn-block edit">Редактировать</a>
			<a href="#" onClick="delete_position('proddel.php?id=<?php echo $id?>', 'Вы действительно хотите удалить данный товар?')" class="btn btn-warning btn-block delete">Удалить</a>
			</td>
	</tr>
	
	
<?php
	}



?>	
		
</table>

<?php require_once('templates/bottom.php')?>