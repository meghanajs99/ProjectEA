<?php
    

    session_start();
	$conn = mysqli_connect('localhost','root','','projectea');
   error_reporting(0);
	if(!$conn)
	{
		echo "The Connection is not established.";
	}
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$state=$_POST['State'];
	$discom=$_POST['DIsName'];
	$billno=$_POST['billno'];
	$supplyvoltage=$_POST['VoltageLevel'];
	$contractdemand=$_POST['contractdemand'];
	$billperiod=$_POST['billperiod'];
	$loadfactor=$_POST['loadfactor'];
	$energyconsumedkvah=$_POST['energyconsumedkvah'];
	$energyconsumedkva=$_POST['energyconsumedkva'];
	$todkvah=$_POST['todkvah'];
    $username = $_SESSION['susername'];
        $val="33";
    
		$res2=mysqli_query($conn,"SELECT * FROM userbillinfo where billno='".$billno."'");
		
		
		if(mysqli_num_rows($res2)==1)
 		{
 			
          
            
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('NOT INSERTED:Bill No. Already Exists!');
 window.location.href='http://localhost/EA%20project/analysis.html';
    </script>");
 		}
    
else
{
	$qry="INSERT INTO userbillinfo VALUES ('".$state."','".$discom."','".$supplyvoltage."','".$contractdemand."','".$energyconsumedkva."','".$energyconsumedkvah."','".$todkvah."','".$billperiod."','".$loadfactor."','".$billno."','".$username."')";
	$res=mysqli_query($conn,$qry);
	$res1=mysqli_query($conn,"SELECT * FROM userbillinfo where billno='".$billno."'");
		
		
		if(mysqli_num_rows($res1)==1)
 		{
 			header("Location:http://localhost/EA%20project/index.php");
           
    
            
 		}
 		else
 		{
 			echo "NOT INSERTED";
 		}
 		$conn->close();
}
}
?>

