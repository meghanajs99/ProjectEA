<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
               <?php
					$con=mysqli_connect('localhost','root','','projectea');
					if(!$con)
					{
						echo("The connectiom is not Established");
					}	
					if(!empty($_POST['checkbox'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['checkbox'] as $selected){
//echo $selected."</br>";
$query="SELECT * FROM userbillinfo WHERE billno='$selected'";
					$result=mysqli_query($con,$query);
	
                        
                   
                        while($row = mysqli_fetch_array($result)){
                            
                            

                            echo "['onpeak', ".$row['onpeakkvah']."],";
                            echo "['kva', ".$row['kvah']."],";
                            

                        }}}
						?>
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>