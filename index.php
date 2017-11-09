<?php 
$title = "Главная страница";
require_once('templates/top.php');
?>
          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>
<?php
$query ="SELECT * FROM catalogues WHERE type='main'";
$adr =  mysqli_query($db_con, $query);


if (!$adr)	{
		exit($query);
			
	}

	while ($tbl_catalogue = mysqli_fetch_array($adr)){
?>











          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><a href="catalogue.php?id=<?php echo $tbl_catalogue['id']?>" class='link'>		
<?php echo $tbl_catalogue['name']?>
</a></h2>
              <p class="card-text"><?php echo $tbl_catalogue['body']?></p>
              <a href="catalogue.php?id=<?php echo $tbl_catalogue['id']?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>
<?php
	}

	
	
	/* echo "<pre>";
	print_r($tbl_maintext);
	echo "</pre>"; */

?>
         
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>
		  
		  
<?php require_once('templates/bottom.php')?>