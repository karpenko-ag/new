<?php 
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<form action="index.php?action=addbook" method="POST">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="text" name="price" class="form-control">
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