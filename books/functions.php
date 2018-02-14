<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'test');
$action = (isset($_GET['action']))?$_GET['action']:'';
if ($action!='')
	{$action();}


function showBooks()
{
	global $mysqli;
	$res = mysqli_query($mysqli,'SELECT * FROM books ORDER BY id  DESC LIMIT 0, 10');
	$books = mysqli_fetch_all($res, MYSQLI_ASSOC);
	echo '<table class="table table-striped">';
	echo '<tr><th>id</th> <th>name</th> <th>new</th> <th>price</th>
	<th>category</th> <th>themes</th> <th></th></tr>';
	
	foreach ($books as $book ) 
	{
		echo '<tr>';
		echo '<td>'.$book['id'].'</td>';
		echo '<td>'.$book['name'].'</td>';
		echo '<td>'.$book['new'].'</td>';
		echo '<td>'.$book['price'].'</td>';
		echo '<td>'.$book['category'].'</td>';
		echo '<td>'.$book['themes'].'</td>';
		echo '<td><a href="index.php?action=deleteBook&id='.$book['id'].'" class="btn btn-danger">DELETE</a></td>';
		echo '<td><a href="update.php?action=updateBook&id='.$book['id'].'" class="btn btn-primary">UPDATE</a></td>';
		echo '</tr>';
	}
	echo '</table>';
}
function deleteBook(){
	global $mysqli;
	$id = isset($_GET['id'])?$_GET['id']:'';
	if($id!='')  //&&(is_numeric($id)))
	{
		 // echo "фывфыв";
		mysqli_query($mysqli,'DELETE FROM books WHERE id='.$id);


	}
}
function addBook(){
	global $mysqli;
	$name = isset($_POST['name'])?$_POST['name']:'';
	$price = isset($_POST['price'])?$_POST['price']:'0';
	$new = isset($_POST['new'])?$_POST['new']:0;
	mysqli_query($mysqli, "INSERT INTO books(name,price,new) VALUES('$name', $price, $new)");
	header ('Location: index.php');
	exit();
}
function showCategories()
{
  global $mysqli;
	$res = mysqli_query($mysqli,'SELECT DISTINCT category FROM books WHERE category IS NOT NULL');
	$cat = mysqli_fetch_all($res);
	for($i = 0; $i <count($cat); $i++)
	{
		echo '<option>'.$cat[$i][0].'</option>';
	}
	}
	function updateBook ()
	{

	}
	function showIzd()
	{
		global $mysqli;
	$res = mysqli_query($mysqli,'SELECT DISTINCT izd FROM books WHERE izd IS NOT NULL');
	$cat = mysqli_fetch_all($res);
	for($i = 0; $i <count($cat); $i++)
	{
		echo '<option>'.$cat[$i][0].'</option>';
	}
	}
	
?>