<?php
session_start();

   	if(!empty($_POST['username']) && !empty($_POST['password'])) 
	{  
		$SESSION_user=$_POST['username'];  
		$SESSION_pass=$_POST['password'];  
        $host = "marauto.db.3337167.hostedresource.com";
		$conn=mysqli_connect('','root','','projectea');
        if(mysqli_connect_error())
 	{
 		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
 	}
		$qury ="SELECT * FROM Userinfo WHERE username= '".$SESSION_user."' AND password='".$SESSION_pass."'";
                 $res1=mysqli_query($conn,$qury);
        
		if(mysqli_num_rows($res1)==1)
 		{
 			echo "<script language='javascript'>";
			echo "alert('Succesful')";
			echo "</script>";
            header("Location:http://localhost/EA%20project/index.php");
            $_SESSION['susername'] = $SESSION_user;
  
 		}
 		
 		
		else 
		{ // header("Location:http://localhost/EA%20project/Signin.html");
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid Username or password');
 window.location.href='http://localhost/EA%20project/Signin.html';
    </script>");
		}
		$conn->close();
    }

?>