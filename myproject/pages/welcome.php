<h1>Welcome to myTasks!</h1>

<?php
if($_SESSION['logged_in']){
//Instantiate Database object

$database = new Database;

//Get logged in user
$list_user = $_SESSION['username'];

//Query
$database->query('SELECT * FROM lists WHERE list_user=:list_user');
$database->bind(':list_user',$list_user);
$rows = $database->resultset();

echo '<h4>Here are your current lists</h4><br />';
if($rows){
echo '<ul class="items">';
foreach($rows as $list){
	echo '<li><a href="?page=list&id='.$list['id'].'">'.$list['list_name'].'</a></li>';
}
	echo '</ul>';
} else {
	echo 'There are no lists available -<a href="index.php?page=new_list">Create One Now</a>';
}	
} else {
	echo "<p>Hello we welcome you to the best e-warehouse of all times.....please register in order to be part of the biggest online market";
}
?>