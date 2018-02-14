<?php 
require_once 'functions.php';

$id = isset($_GET['id'])?$_GET['id']:'';
	if($id!='')
	{
		$rec = mysqli_query($mysqli,'SELECT name,price FROM books WHERE id='.$id);
        $cat = mysqli_fetch_assoc($rec);
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<form action="index.php?action=updateBook" method="POST">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="<?= $cat["name"]?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="text" name="price" value="<?= $cat["price"]?>" class="form-control">
		</div>
		<div class="form-group">
			<label><input type="checkbox" value="1" name="new">New</label>
		</div>
		<select name="category">
        <option>Select Category </option>
    <?php
        showCategories();

    ?>
   <div class="form-group">
			<label><input type="checkbox" value="1" name="new">New</label>
		</div>
		<br>
		 <select name="izd">
        <option>Select Themes </option>
    <?php
       showIzd();

    ?>
    <div class="form-group">
			<label><input type="checkbox" value="1" name="new">New</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
