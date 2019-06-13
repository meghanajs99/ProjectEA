<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Unit', 'bill1', 'bill2'],
                <?php
            
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					if(count($_POST['checkbox'])==2)
                    {
                        
                    }
                    elseif(count($_POST['checkbox'])==1)
                    {
                  
                    }
        ?>

            ]);

            var options = {title: 'Population (in millions)'};  
             // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('container'));
            chart.draw(data, options);
            flag++;  
           google.charts.setOnLoadCallback(drawChart);
         }
      function drawChart() 
        {
          var flag=1;
          var data = google.visualization.arrayToDataTable
          ([
          ['Task', 'Hours per Day'],
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
                            echo "['Cost for peak hours', ".$row['onpeakkvah']."],";
                            echo "['Cost for normal hours', ".$row['kvah']."],";
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
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
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
  <body><div class="header-fluid"><span>Energy Analysis</span>
        <span id="logoutbtn">
            <a href="php/logout.php"><button type="button" class="btn btn-outline-dark" >Logout</button></a></span></div>
        
      <div class="container" style="margin-left:400px;margin-top:200px">
          <div id="piechart" style="width: 900px; height: 500px;"></div></div>
  </body>
</html>