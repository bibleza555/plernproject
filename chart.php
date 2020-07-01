<!DOCTYPE html>
<html>
<title>Plern Plern</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="font/stylesheet.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/all.css">
<style>
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: 'itimregular', cursive;}
body {background-color: #A3E7D8;}
</style>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
    <title>รายงานการขาย</title>
    <style>
        canvas {

            width: 750px !important;
            height: 500px !important;

        }
            body,
            h1,
            h2,
            h3,
            h4,
            h5 {
                font-family: "itimregular", cursive
            }
            body{font-size:16px;}

           
            
    </style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" ></script>

 
</head>
<body>
<?php include('navadmin.php');?>

  <div class="w3-card-4 w3-padding" style="max-width:800px;background-color:#FFBE7D;margin:auto;margin-top:100px;">
        <h1><center>กราฟยอดขาย</center></h1><br>

        <?php
        include ('connect.php');

 
$query = " SELECT SUM(sum) AS total, DATE_FORMAT(order_date, '%M') AS order_date
FROM `tb_order`
GROUP BY DATE_FORMAT(order_date, '%M%') ";
$result = mysqli_query($conn, $query);
$resultchart = mysqli_query($conn, $query);  


 //for chart
$order_date = array();
$total = array();

while($rs = mysqli_fetch_array($resultchart)){ 
  $order_date[] = "\"".$rs['order_date']."\""; 
  $total[] = "\"".$rs['total']."\""; 
}
$order_date = implode(",", $order_date); 
$total = implode(",", $total); 
 
?>


<table class="dark" width="200" border="1" cellpadding="0"  cellspacing="0" align="center">
  <thead>
  <tr class="bg-info">
    <th width="10%" class="text-center">เดือน</th>
    <th width="10%"  class="text-center">รายได้ (บาท)</th>
  </tr>
  </thead>
  
  <?php while($row = mysqli_fetch_array($result)) { ?>
    <tr class="bg-light"> 
      <td align="center"><?php echo $row['order_date'];?></td>
      <td align="right"><?php echo number_format($row['total'],2);?></td> 
    </tr>
    <?php } ?>

</table>
<?php mysqli_close($conn);?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">

 <!--devbanban.com-->

<canvas id="myChart" width="350px" height="250px"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $order_date;?>
    
        ],
        datasets: [{
            label: 'รายงานรายได้ แยกตามเดือน (บาท)',
            data: [<?php echo $total;?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  
</p> 











    </div>


<footer class="w3-center w3-blue w3-padding w3-large w3-margin-top">
  <p>The Clothing Store Management System : A case study of PlernPlern shop</p>
  <p>Contact :Leegardens Plaza ชั้น 2  โทร:088-7914540</p>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>