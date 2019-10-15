<?php include "header.php" ?>
<!doctype html>

<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="w3.css">
<style>
	#w3div
		{
			margin:20px;
			padding:8px;
			opacity:0.8;
			width:30vw;
			
		}
		.Formbtn
		{
		  background-color:transparent;
		  color:#8DA632;
		  width:20vw;
		}
		#h1Btn
		{
		   color:white;
		   padding:5px;
		   border:1px solid #D92211;
		   border-radius:5px;
		   background-color: #D92211;
		   padding:5px;
		   font-size:17px;
		  
		}
	
	#pwd,#usr
	{
		border:1px solid #D92211;
        color:#D92211;	
		width:30vw;
		height:40px;
	}
	.NewUser
	{
		color:#8DA632;
		margin-top:20px;
		font-weight:bold;
	}
	</style>
</head>
 <body>

<div id="order_content"  style="margin:20px">
<div id="w3div" style="margin:0 auto;">
	<center><h1 style="color:#D92211;font-weight:bold;">LOGIN</h1></center>
         <form action="Login.php" method="post">
		    <div class="inputDiv">
				<center><input type="email"  name="email" id="usr" placeholder="Enter email" required></center>
			</div><br>
			<div class="inputDiv">
				<center><input type="password" name="password" id="pwd" placeholder="Enter password" required></center>
			</div><br>
			<center>
			<center><div class="Formbtn">
				<input type="submit" id="h1Btn" name="submit" value="Login">
				</div></center>
			</center>
		</form>
		
		<center><div class="NewUser">
                <a href="signup.php"> <p>New User</p></a>
				</div></center>
			</center>
   </div>
 </div> 
 
 </body>
 
 </html>
	
	
	<?php 
        if(isset($_POST["submit"]))
        {
			
			$username = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
 
			$password = isset($_POST['password']) ? $_POST['password'] : NULL;
 
            $errors = array();
 
            if (!$password && !$username)
                     $errors[] = 'Empty fields';
				
				if (!$errors && $username && $password)
				 {
			        $con=new mysqli("localhost","id11213138_root","supriya","id11213138_restaurant");
					$st_check=$con->prepare("select * from signuptable where email=? and password=?");
					$st_check->bind_param("ss", $_POST['email'],$_POST['password']);
					$st_check->execute();
			
					$rs=$st_check->get_result();
						if($rs->num_rows==0)
						{					
							echo "<script>alert('Login Fail');</script>";			
						}
						else
						{
								$user=$_POST["email"];
								echo "<script>alert('hello $user');</script>";
								$_SESSION["user"]=$_POST["email"];
								echo "<script>window.location='Menu.php';</script>";	
						}	
				 }				
		}
    ?>
	<?php include 'footer.php' ?>
