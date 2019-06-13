<?php
session_start();
error_reporting(0);
if(count($_POST['checkbox'])==0)
{
echo "please select at least 1 box";
}
					
elseif(count($_POST['checkbox'])==1)
{
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart1() 
        {
          var flag=1;
          var data = google.visualization.arrayToDataTable
          ([
          ['On-Peak', 'Off-Peak'],
          <?php
            $flag=1;
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					if(count($_POST['checkbox'])==1)
                    {
                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected)
                    {
                    //echo $selected."</br>";
                    if($flag==1)
                    {
                    $query="SELECT * FROM userbillinfo WHERE billno='$selected'";
                    $result=mysqli_query($con,$query); 
                    while($row = mysqli_fetch_array($result))
                    {
                            echo "['Energy Consumed in peak hours', ".$row['onpeakkvah']."],";
                            echo "['Energy Consumed in normal hours', ".$row['kvah']."],";
                    }
    
                    }
                    }
                    }
        ?>
        ]);
        var options = {
                          title: 'My Electricity BIll',
                          is3D:true
                      };
        if(flag==1)
                    {
                        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                        chart.draw(data, options);
                        flag++;  
                    }
      }
        function drawChart2() 
        {
          var flag=1;
          var data = google.visualization.arrayToDataTable
          ([
          ['Contract Demand', 'Demand Consumed'],
          <?php
            $flag=1;
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					if(count($_POST['checkbox'])==1)
                    {
                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected)
                    {
                    //echo $selected."</br>";
                    if($flag==1)
                    {
                    $query="SELECT * FROM userbillinfo WHERE billno='$selected'";
                    $result=mysqli_query($con,$query); 
                    while($row = mysqli_fetch_array($result))
                    {
                            echo "['Contract Demand', ".$row['contractdemand']."],";
                            echo "['Demand Consumed', ".$row['kva']."],";
                    }
    
                    }
                    }
                    }
        ?>
        ]);
        var options = {
                          title: 'My Electricity BIll',
                          is3D:true
                      };
        if(flag==1)
                    {
                        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                        chart.draw(data, options);
                        flag++;  
                    }
      }
    </script>
      
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
  </head>
    

  <body>
       <div class="container-fluid">
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
       <table class="columns">
      <tr>
        <td><div class="container" style="margin-left:200px;margin-top:200px">
          <div id="piechart1" style="width: 900px; height: 500px;"></div></div></td>
          <td><div style=" border:solid;color:#009876;padding:15px"><center><h1 style="color:#001107">SUGGESTIONS</h1></center>
              <style>
                  p
                  {
                      color:darkturquoise;
                      font-size: 25px;
                      font-family: cursive;
                      
                  }</style>
             <?php
    $selected= $_POST['checkbox'];
     $query="SELECT * FROM userbillinfo WHERE billno='$selected'";
     $result=mysqli_query($con,$query); 
     $row = mysqli_fetch_array($result);
     $query2="Select onpeaktime from todcharges where tariffid in (select TariffId from  tariff  where disno in (select DisNo no from state  where disname = '".$row['discom']."')and sid in (select SID from category where voltagelevel ='".$row['category']."'))";
    $result2=mysqli_query($con,$query2); 
    $row2= mysqli_fetch_array($result2);
     $flag=0;
    echo "<ol>";
     if($row['contractdemand']<$row['kva'])
        echo"<li><p>Please Increase the Contract demand.</p></li>";
    else 
    {$flag++;
        echo"<li><p>You are using according to your Contract Demand.</p></li>";}

     if($row['loadFactor']<1)
        echo"<li><p>Please maintain the load factor to 1 to minimize the cost in the electricity bill.</p></li>";
    else 
    {
        $flag++;
        echo"<li><p>Load Factor is good.</p></li>";
    }
     if($row['onpeakkvah']!="")
        echo"<li><p>Please maximise your usage in tod off-peak hours.</p></li>";
     else {
         $flag++;
         echo"<li><p>Everything is upto the mark!</p></li>";
     }
    echo "</ol>";
             ?>
 </div></td></tr>
          <tr><td><div class="container" style="margin-left:200px;margin-top:200px">
          <div id="piechart2" style="width: 900px; height: 500px;"></div></div></td></tr>
         <tr></tr>
    </table> 
      
  </body>
</html>

<?php
  }
elseif(count($_POST['checkbox'])>=3)
{
?>   
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['BillPeriod', 'EnergyConsumed in Normal Period', 'Energy Consumed in Peak Hours','Contract Demand','kva'],
          <?php
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					
                        

                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected){
						$query="SELECT * FROM userbillinfo WHERE billno='$selected'";
						$result=mysqli_query($con,$query); 
                   
                        while($row = mysqli_fetch_array($result)){  
                            echo "['BILL:".$row['billperiod']."',".$row['kvah'].",".$row['onpeakkvah'].",".$row['contractdemand'].",".$row['kva']."],";
                           
                           }
			}
              

						?>
        ]);

        var options = {
          title: 'Analysis',
          hAxis: {title: 'Bill Period',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
        function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['BillPeriod','Load factor'],
          <?php
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					
                        

                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected){
						$query="SELECT * FROM userbillinfo WHERE billno='$selected'";
						$result=mysqli_query($con,$query); 
                   
                        while($row = mysqli_fetch_array($result)){  
                            echo "['BILL:".$row['billperiod']."',".$row['loadFactor']."],";
                           
                           }
			}
              

						?>
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
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
  </head>
    

  <body> <div class="container-fluid">
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
<table class="columns">
      <tr>
        <td><div id="chart_div1" style="width: 900px; height: 300px;margin-right:100px;"></div></td>
          <td><div id="chart_div2" style="width: 900px; height: 300px;"></div></td></tr>
    </table>  </body>
</html>
<?php
}
else
{
?>
<html>
  <head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);

    function drawChart1() {
      var data = google.visualization.arrayToDataTable([
        ["Bill Period", "kVAh", "onpeakkVAh"],
         <?php
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					
                        

                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected){
						$query="SELECT * FROM userbillinfo WHERE billno='$selected'";
						$result=mysqli_query($con,$query); 
                   
                        while($row = mysqli_fetch_array($result)){  
                            echo "['".$row['billperiod']."',".$row['kvah'].",".$row['onpeakkvah']."],";
                           
                           }
			}
              

						?>
      ]);


      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Off-Peak Vs On-Peak",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      chart.draw(view, options);
  }
      function drawChart2() {
      var data = google.visualization.arrayToDataTable([
        ["Bill Period","Contract Demand","kva" ],
         <?php
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					
                        

                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected){
						$query="SELECT * FROM userbillinfo WHERE billno='$selected'";
						$result=mysqli_query($con,$query); 
                   
                        while($row = mysqli_fetch_array($result)){  
                            echo "['".$row['billperiod']."',".$row['contractdemand'].",".$row['kva']."],";
                           
                           }
			}
              

						?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Contract Demand Vs Demand Consumed",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view, options);
  }
      function drawChart3() {
      var data = google.visualization.arrayToDataTable([
        ["Bill Period","Load Factor" ],
         <?php
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					
                        

                    // Loop to store and display values of individual checked checkbox.
                    foreach($_POST['checkbox'] as $selected){
						$query="SELECT * FROM userbillinfo WHERE billno='$selected'";
						$result=mysqli_query($con,$query); 
                   
                        while($row = mysqli_fetch_array($result)){  
                            echo "['".$row['billperiod']."',".$row['loadFactor']."],";
                           
                           }
			}
              

						?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }]);

      var options = {
        title: "Load Factor",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values3"));
      chart.draw(view, options);
  }
  </script>
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
  </head>
    

  <body> <div class="container-fluid">
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

      <table class="columns">
      <tr>
        <td><div id="columnchart_values1" style="width: 900px; height: 300px;margin-top:100px;"></div></td>
          <td><div id="columnchart_values2" style="width: 900px; height: 300px;margin-top:100px;"></div></td></tr></table>
      <div id="columnchart_values3" style="width: 900px; height: 300px;margin-top:200px;"></div>
 </body>
</html>
<?php                   
}
?>
      
