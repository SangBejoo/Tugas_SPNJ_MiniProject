<?php
$con = mysqli_connect("localhost", "root", "", "ayub");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['id', 'nama', 'code', 'category', 'price', 'stock_count'],
          <?php
            $sql = "SELECT * FROM subagiya";
            $fire = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($fire)){
                echo "['".$result['id']."', '".$result['name']."', '".$result['code']."', '".$result['category']."', '".$result['price']."', '".$result['stock_count']."'],";
            }
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
