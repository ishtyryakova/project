<?php require_once('templates/top.php');

if ($_SESSION['user_id'])	{
	
	if ($_GET['id'])	{
	$id = (int)$_GET['id'];
}
else {
	$id=0;
	
}
$query ="SELECT * FROM products WHERE id = $id";
$adr = mysqli_query($db_con, $query);
	if(!$adr)	{
			exit($query);
	}
	$product = mysqli_fetch_array($adr);
	
	
	

if ($_POST)	{
	$pname = $_POST['name'];
	$pbody = $_POST['body'];
	$pcatalogue_id = (int)$_POST['catalogue_id'];
	
	if($_FILES)	{
		//del picture proddel
		//add picture cabinet
		$picture=$_FILES['picture']['name'];
	}
	else{
		$picture='';
	}
	
	$query = "UPDATE products SET name=$pname, body=$pbody WHERE id = $id AND user_id = ".$_SESSION['user_id'];
		$adr = mysqli_query($db_con, $query);
	if(!$adr)	{
			exit('error');
	}
	?>
	<script>
		document.location.href="prodedit.php?id=<?php echo $id?>";
	</script>
	
<?php

	


	
	}
?>






<form action="prodedit.php?id=<?php echo $id?>" method="post" enctype = "multipart/form-data">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value = "<?php echo $product['name']?>" class="form-control" id="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control"  rows="3" name="body" id="body" ><?php echo $product['body']?> </textarea>
  </div>
	<p class="help-block">Description here.</p>
  <div class="form-group">
    <label for="picture">File input</label>
	
    <input type="file" id="picture" name="picture" value = "<?php echo $product['picture']?>">
    <p class="help-block">Example here.</p>
  </div>
    <div class="form-group">
		<label for="picture">Category</label>
		<select class="form-control" name="catalogue_id">
		<option <?php ($product['catalog_id']== $cats['id'])? 'selected':''?>></option>
		</select>
		</div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>





<?php
}
?>








<?php require_once('templates/bottom.php')?>