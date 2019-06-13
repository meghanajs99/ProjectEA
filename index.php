<html>
<head>
    <title>
        Energy Analysis
    </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                       

  <link href="css/Icomoon/style.css" rel="stylesheet" type="text/css" />
  <link href="css/main.css" rel="stylesheet" type="text/css"/>
     <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
    
    

    <style type="text/css">
.bgimg{
	background-image:url("a.jpg");
	}
</style>

    
    </head>
    <body><div class="container-fluid">
        <div class="header-fluid"><span>Energy Analysis</span>
        <span id="logoutbtn">
            <a href="Signin.php"><button type="button" class="btn btn-outline-dark">Logout</button></a></span></div>
        
        
       <nav class="fill">
                <ul>
                  <li><a href="index.php">My Bills</a></li>
                  <li><a href="analysis.html">Save New Bill</a></li>
                  <li><a href="Aboutus.html">About Us</a></li>
                </ul>
              </nav>
        </div>			  
	<br>
	<br>
	<br>

	

<!--  <div class="login-card">
    <font color="white"><h1>Log-in</h1></font>
  <form action="#" method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="Login">
  </form>

  <div class="login-help">
   <center> <a href="register.html"><font color="white">Register</font></a></center>
  </div>
</div>
        
        
         <section name="mybill" a>
        <span id="secheader"><h2>My Bills</h2></span>
            <div class="container"><table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">Select</th>
      <th scope="col">Bill No</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr><td><input type="checkbox" id ="b1"></td>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr><td><input type="checkbox" id ="b2"></td>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr><td><input type="checkbox" id ="b3"></td>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        
        
        
        
        
        
    <!--    <div class="wrapper-inner-tab">
                <div class="wrapper-inner-tab-backgrounds" style="width:500px;">
                        <div class="sim-button button16" style="background-color:black;text-align:center;font-size:25px;padding:8px 10px;height:70px"><span><b style="color:#ffffff;font-style:initial;font-family:Arial;font-size:30px">ANALYSE</b></span></div>
            </div></div>-->
        
        <div class="container">
            <form method="post" >
        <?php 
            session_start();
            error_reporting(0);
	$con=mysqli_connect('localhost','root','','projectea');
	if(!$con)
	{
		echo("The connectiom is not Established");
	}
    $username = $_SESSION['susername'];
	$query="SELECT * FROM userbillinfo WHERE username='$username'";
	$result=mysqli_query($con,$query);
	if (mysqli_num_rows($result)>0)
    {
		echo "<center>";
		echo "<h1>"."MY BILL"."<h1>";
		echo "<table bordercolor='black' border='2'  cellspacing='0' cellpadding='15' class='table' id='myTable'>";
		echo"<thead class='thead-dark'>"."<th>"."</th>"."<th>" ."BILL NO:"."</th>"."<th>" ."STATE:"."</th>"."<th>" ."DISCOM"."</th>"."<th>" ."BILL PERIOD"."</th>"."</thead>";
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<tr><td>"."<input type='checkbox' name='checkbox[]'  value=".$row["billno"]." class='checkboxes'/>"."</td><td>".$row["billno"]."</td><td>".$row["state"]."</td><td>".$row["discom"]."</td> <td>".$row["billperiod"]."</td></tr>";
        }
		echo "</table>";
		echo "</center>";
    }

	else
	{
		echo "THERE ARE NO BILLS PLEASE ADD BILLS TO ANALYZE";
        
	}
    
         ?>
                <br>
                <br>
                <br>
                <br>

        

<center><button type="submit" class="btn btn-outline-dark" formaction="report.php">Analyse</button></center>

             <center> <button type="submit" class="btn btn-outline-dark" formaction="php/delete.php">Delete</button></center></form>
   
        </div>
    <script>
  $(document).ready(function(){

    // code to read selected table row cell data (values).
    $("#myTable").on('click','.checkboxes',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var data=col1+"\n"+col2+"\n"+col3;
         
        
    });
});</script>
    </body>
</html>