<?php

include_once 'header.php';

$url='http://localhost:8000';

?> 
        <script src="ajax.js"></script> 

             <div><br><br><br><br>
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-6">
                       <form action="tanques_gas.php" method="GET">
                       <div class="form-group">
                       <label for="exampleInputEmail1">Ingresa el Almacen</label>
                       <input type="text" required name="almacen" class="form-control" width="6" >
                       </div>
                      <button type="submit" class="btn btn-primary">Buscar</button><br>
                        </form>                       
                     </div>                    
               <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Tanques de Gas</h3> <a href="tanques_gas.php" type="submit" class="btn btn-primary">Todos</a></div>
                    
                    <div class="panel-body"> 
                           <?php
                           if(isset($_GET['almacen'])){
                             $al=$_GET['almacen'];
                             $r = file_get_contents("".$url."/Tanques/".$al."");
                             $dato= json_decode($r,true);  
                             $almacen = array_column($dato, 'AlmacenTanque');
                             //print_r($almacen);    
                             $litros = array_column($dato, 'PorceCorrecto');
                             //print_r($litros);  
                             echo "<div id='myDiv'><!-- Graficas --></div>";
                           }else{
                            $al='';
                            $r = file_get_contents("".$url."/Tanques/".$al."");
                            $dato= json_decode($r,true);  
                            $almacen = array_column($dato, 'AlmacenTanque');
                            //print_r($almacen);    
                            $litros = array_column($dato, 'PorceCorrecto');
                            //print_r($litros);  
                            echo "<div id='myDiv'><!-- Graficas --></div>";
                            }                                   
                            ?>
                             
                   </div>
                      
                  </div>
                </div>
              </div>  
                <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Tanques Gas</h3></div>
                    <div class="panel-body">   
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Datos Espesificos
                   </button>                   
                      <div class="responsive-table">
                          <table   class="table table-striped table-bordered" width="100%" cellspacing="0">
                           <thead>
						    <tr>        <th>Status</th>
						                <th>Almacen</th>
						                <th>Tanque</th>
                            <th>Capacidad</th>
						                 <th>Litros Facturados</th>
                            <th>% Real</th>
						                <th>% Variable</th>
                            <th>Ultimo Lot Recepción</th>
						                <th>Ultimo Lot Salida</th>
						    </tr>
						    </thead>
						    <tbody>
                            <?php
                            $res = file_get_contents("".$url."/Tanques/".$al."");
                            $datos= json_decode($res,true);
                            foreach($datos as $key=> $recordsets)
 	                        { 	    
 	                        ?>
                           <tr>
                           <td>
                          <?php
                           if($recordsets['div']<>0){ 
                             echo"<div class='alert alert-danger'><strong>Error %</strong>
                          </div>";
                          }else{
                            echo"<div class='alert alert-success'> <strong>OK</strong> 
                          </div>";
                          }?>               
                          </td>
                           <td><a href="salidasGas.php?almacen=<?php echo $recordsets['almacen'];?>&tanque=<?php echo  trim($recordsets['Tanque']);?>&fecha=<?php echo date("Y-m-d")?>"><?php echo $recordsets['almacen']; ?></a></td>
                           <td><?php echo $recordsets['Tanque']; ?> </td>
                           <td><?php echo $recordsets['S4Future09']; ?> </td>
                           <td><?php echo $recordsets['QtyAvail']; ?> </td>
                           <td><?php echo $recordsets['PorceCorrecto']; ?> </td>
                           <td><?php echo $recordsets['movimiento']; ?> </td>
                           <td><?php echo $recordsets['loteRecep']; ?> </td>
                           <td><?php echo $recordsets['loteSal']; ?> </td>
                           </tr>
                            <?php 
                            }
                            ?>
                           </tbody>
                           </table>                      
                      </div>
                  </div>
                </div>
              </div>  
              </div>			     
            </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
          <!-- end: content -->
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
<?php
include_once 'footer.php';
?>