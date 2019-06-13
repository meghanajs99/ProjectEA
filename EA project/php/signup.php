<?php
$username=$_POST['name'];
$password=$_POST['password'];
$cpwd=$_POST['re_password'];
$email=$_POST['email'];
$host = "localhost";
if(!empty($username) || !empty($password) || !empty($cpwd) ||!empty($email)){
	$conn = mysqli_connect('localhost','root','','projectea');
   error_reporting(0);
 	if(mysqli_connect_error())
 	{
 		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
 	}
	else{
		if($password!=$cpwd)
 		{
 			echo "<script language='javascript'>";
			echo  "window.alert('Password mismatch');
                    window.location.href='http://localhost/EA%20project/register.html'";
			echo "</script>";
 			die();
 		}
        $res2=mysqli_query($conn,"SELECT * FROM userinfo where username='".$username."'");
        	if(mysqli_num_rows($res2)==1)
 		{
 			echo "<script language='javascript'>";
			echo  "window.alert('Username already exists');
                    window.location.href='http://localhost/EA%20project/register.html'";
			echo "</script>";
 		}
        
		$res=mysqli_query($conn,"INSERT INTO userinfo(`username`,`password`,`email`) VALUES('".$username."','".$password."','".$email."')");
		$res1=mysqli_query($conn,"SELECT * FROM userinfo where username='".$username."'");
		
		
		if(mysqli_num_rows($res1)==1)
 		{
 			echo "<script language='javascript'>";
			echo  "window.alert('Succesfully Updated');
                    window.location.href='http://localhost/EA%20project/Signin.php'";
			echo "</script>";
 		}
 		else
 		{
 			echo "Error: ".$res."<br>".$conn->error;
 		}
 		$conn->close();
 		}
}
else{
	echo "All fields should be filled";
	die();
}

?>