
<?php
include_once 'header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<canvas id="myChart"></canvas>

<?php 
//Nutry Facil
$url="http://localhost:8000/pedidos/".date('m')."/".date('Y')."";
$r = file_get_contents("".$url."");
$dato= json_decode($r,true);  
$Descr = array_column($dato,'Descr');
$kilos = array_column($dato,'Peso');
;
?>

<script>
var listDescr = new Array(<?php echo json_encode($Descr); ?>);
var listKilos = new Array(<?php echo json_encode($kilos); ?>);


var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels:listDescr[0],
        datasets: [{
            label: 'Pedidos del mes / <?php echo date('m'); ?>/<?php echo date('Y'); ?>',
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            data: listKilos[0]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>