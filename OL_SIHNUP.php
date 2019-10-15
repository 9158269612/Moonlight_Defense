<?php include 'header.php' ?>
<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    #signup_form
	{
		margin:20px;
	}
  </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<center>
    <form action="signup.php" method="post" id="signup_form">
        <input type="email" name="email" class="form-control" style="width:35%" placeholder="E-Mail" required /><br/>
        <input type="password" name="password" class="form-control" style="width:35%" placeholder="Password" max="6" required/><br/>
        <input type="password" name="confirm" class="form-control" style="width:35%" placeholder="Confirm" required/><br/>
        <input type="text" name="name" class="form-control" style="width:35%" placeholder="Name" required /><br/>
        <input type="text" name="mobile" class="form-control" style="width:35%" placeholder="Mobile" max="10" required/><br/>
        <input type="text" name="address" class="form-control" style="width:35%" placeholder="Address" required/><br/>
        <input type="submit" name="sub" value="Sign Up" class="btn btn-danger" />
    </form>
</center>
</html>
<?php
    if(isset($_POST["sub"]))
    {
		//serches the string pattern and return if data exists otherwise false
        if($_POST["password"]==$_POST["confirm"])
        {
			$con=new mysqli("localhost","id11213138_root","supriya","id11213138_restaurant");
			$st_check=$con->prepare("select * from signuptable where email=?");
			$st_check->bind_param("s", $_POST["email"]);
			$st_check->execute();
			$rs=$st_check->get_result();
			if($rs->num_rows>0)
				echo "<script>alert('E-Mail already used');</script>";
			else{
				$st=$con->prepare("insert into signuptable(email,password,name,mobile,address) values(?,?,?,?,?)");
				$st->bind_param("sssss", $_POST["email"],$_POST["password"],$_POST["name"],$_POST["mobile"],$_POST["address"]);
				$st->execute();
				echo "<script>alert('Signup Successfull!')</script>";
			}
        }
        else
            echo "<script>alert('Passowrd Not Match');</script>";
    }
?>


<?php include 'footer.php' ?>

