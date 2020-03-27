<?php
include_once 'header.php';
?>

<?php //Nutry Facil

if (isset($_POST['mes'])) {
    $url = "http://localhost:8000/pedidos/" . $_POST['mes'] . "/" . $_POST['ano'] . "";
} else {
    $url = "http://localhost:8000/pedidos/" . date('m') . "/" . date('Y') . "";
}
$r = file_get_contents("" . $url . "");
$dato = json_decode($r, true);
$Descr = array_column($dato, 'Descr');
$kilos = array_column($dato, 'Peso');

?>
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-12">

            <form action="pedidos.php" method="POST">               
                <div class="form-group">
                 <label for="exampleInputPassword1">Año</label>                
                 <select  class="form-control" name="ano" >
                 <option value="2017">2017</option>
                 <option value="2018">2018</option>
                 <option value="2019">2019</option>
                 <option value="2020">2020</option>
                 <option value="2021">2021</option>
                 <option value="2022">2022</option>
                 <option value="2023">2023</option>
                 </select>
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Mes</label>
                <select  class="form-control" name="mes" >
                 <option value="01">01</option>
                 <option value="02">02</option>
                 <option value="03">03</option>
                 <option value="04">04</option>
                 <option value="05">05</option>
                 <option value="06">06</option>
                 <option value="07">07</option>
                 <option value="08">08</option>
                 <option value="09">09</option>
                 <option value="10">10</option>
                 <option value="11">11</option>
                 <option value="12">12</option>                 
                 </select>
                </div>
                  <button type="submit" class="btn btn-primary">Mostrar</button>
             </form>

                  <canvas id="myChart"></canvas>

            </div>
        </div>
     </div>
   </div>
 </div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
  </body>
</html>