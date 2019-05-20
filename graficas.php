
                                            
                            <?php
                            $url='http://localhost:8000';
                            $al='';                           
                            $r = file_get_contents("".$url."/Tanques/".$al."");
                            $dato= json_decode($r,true);  
                            $almacen = array_column($dato, 'AlmacenTanque');
                            $litros = array_column($dato, 'PorceCorrecto');
                            ?>
                             <div id="myDiv">
                                 
                             
                             </div>
                             <div align="center" style="border:1px solid blue">
                             <h1><?php echo date("d-m-Y H:i:s");?></h1> 
                             </div>
<!-- end: content -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>    
<script>
var list = new Array(<?php echo json_encode($almacen); ?>);
var listtow = new Array(<?php echo json_encode($litros); ?>);
var xValue = list[0];
var yValue = listtow[0];
var trace1 = {
  x: xValue, 
  y: yValue,
  type: 'bar',
  text: yValue,
  textposition: 'auto',
  hoverinfo: 'none',
  marker: {
    color: 'rgb(158,202,225)',
    opacity: 0.6,
    line: {
      color: 'rbg(8,48,107)',
      width: 1.5
    }
  }
};
var data = [trace1];
var layout = {
  title: 'Grafica Tanque Gas Granjas'
};
Plotly.newPlot('myDiv', data, layout, {showSendToCloud:true});
</script>