<?php
	if($_POST['submit']){
		
		$user_id = $_GET['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$address = $_POST['address'];
		$countryid = $_POST['country_id'];
		
		//Instantiate Database object
		$database = new Database;
		
		$database->query('UPDATE users SET firstname = :firstname,lastname = :lastname,email = :email,username = :username,password = :password,address = :address,countryid = :countryid WHERE id = :id');
		
		
		
			$database->bind(':firstname', $firstname);  
			$database->bind(':lastname', $lastname);   
			$database->bind(':email', $email);  
			$database->bind(':username', $username);  
			$database->bind(':password', $enc_password);  
		    $database->bind(':address', $address);  
			$database->bind(':country_id', $countryid);  
			$database->bind(':id',$user_id);
		
		$database->execute();
		if($database->rowCount()){
			echo '<p class="msg">users are updated</p>';
		}
	}
?>

<?php
$user_id = $_GET['id'];

//Instantiate Database object
$database = new Database;
//Query
$database->query('SELECT * FROM users WHERE id = :id');
$database->bind(':id',$user_id);
$row = $database->single();
?>

<h1>Edit users</h1>



 <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
 				<label>First Name: </label>
                <input type="text" name="firstname" value="<?php if($_POST['firstname'])echo $_POST['firstname'] ?>" /><br />
                <label>Last Name: </label>
                <input type="text" name="lastname" value="<?php if($_POST['lastname'])echo $_POST['lastname'] ?>" /><br />
 
                <label>Email: </label>
                <input type="text" name="email" value="<?php if($_POST['email'])echo $_POST['email'] ?>" /><br />
                <label>Username: </label>
                <input type="text" name="username" value="<?php if($_POST['username'])echo $_POST['username'] ?>" /><br />
                <label>Password: </label>
                <input type="password" name="password" value="<?php if($_POST['password'])echo $_POST['password'] ?>"/><br />
                 <label>Confirm Password: </label>
                <input type="password2" name="password2" value="<?php if($_POST['password2'])echo $_POST['password2'] ?>" /><br />
				
				  <label>address: </label>
                <input type="text" name="address" value="<?php if($_POST['address'])echo $_POST['address'] ?>" /><br />
                <label>countryid: </label>
                <input type="text" name="country_id" value="<?php if($_POST['country_id'])echo $_POST['country_id'] ?>" /><br />
                <br />
                <input type="submit" value="Register" name="register_submit" />
             
          </form>
		  