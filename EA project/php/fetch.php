<?php 
	$con=mysqli_connect('localhost','root','','projectea');
	if(!$con)
	{
		echo("The connectiom is not Established");
	}
	$query="SELECT * FROM userbillinfo WHERE username='01'";
	$result=mysqli_query($con,$query);
	if (mysqli_num_rows($result)>0)
    {
		echo "<center>";
		echo "<h1>"."MY BILL"."<h1>";
		echo "<table bordercolor='black' border='2'  cellspacing='0' cellpadding='15'>";
		echo"<th>"."</th>"."<th>" ."BILL NO:"."</th>"."<th>" ."STATE:"."</th>"."<th>" ."DISCOM"."</th>"."<th>" ."BILL PERIOD"."</th>";
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<tr><td>"."<input type='checkbox'/>"."</td><td>".$row["billno"]."</td><td>".$row["state"]."</td><td>".$row["discom"]."</td> <td>".$row["billperiod"]."</td></tr>";
        }
		echo "</table>";
		echo "</center>";
    }

	else
	{
		echo "THERE ARE NO BILLS PLEASE ADD BILLS TO ANALYZE";
	}
?>