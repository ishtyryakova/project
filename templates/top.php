<?php require_once('config/config.php')

?>
	

	
	

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $description;?>">
    <meta name="author" content="">
	

    <title>
		<?php echo (isset($title))?$title:''?>
	
		</title>
		
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>
  
<?php if(($_SESSION['user_id']))	{
	
?>
	<a href="/cabinet.php">Кабинет</a> <br />
	<a href="/logout.php">Выход</a>
	
	<?php
	
} else	{
?>
    <a href="/login.php">Вход</a>	<br />
	<a href="/register.php">Регистрация</a>
	
<?php } ?>
	
	
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="static.php?url=about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="static.php?url=services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="static.php?url=contacts">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <div class="container">

      <div class="row">

        
        <div class="col-md-8">