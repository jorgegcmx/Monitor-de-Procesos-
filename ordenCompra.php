<?php

include_once 'header.php';

$url='http://localhost:8000';
?>  
  <div ><br><br><br><br>
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-6">
                       <form action="ordenCompra.php" method="GET">
  <div class="form-group">
    <label for="exampleInputEmail1">Lote de Orden de Compra</label>
    <input type="number" required name="orden" class="form-control" width="6" >
  </div>
  <button type="submit" class="btn btn-primary">Buscar</button></form>
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Ordenes de Compra</h3></div>
                    <div class="panel-body">                      
                      <div class="responsive-table">
                      <?php 
                      if(isset($_GET['orden'])){                        
                      ?>
                <table  class="table">
                <thead>
						    <tr>
						    <th>Datos de Orden</th>
						    <th></th>
						    </tr>
						    </thead>
						    <tbody>
<?php
$lot=$_GET['orden'];
$res = file_get_contents("".$url."/ordenes/".$lot."");
//print_r($res);
$datos= json_decode($res,true);
//print_r($datos);
foreach($datos as $key=> $recordsets)
 	{ 	    
 	    ?>
 		 <tr >						
			<td>
			<ul class="list-group">
			    <li class="list-group-item active">Lote :<?php echo $recordsets['PONbr']; ?> Total: $<?php echo $recordsets['CuryPOAmt']; ?>  </li> 
			    <li class="list-group-item">Codigo Proveedor: <?php echo $recordsets['VendID'];	?></li>  
			    <li class="list-group-item">Nombre: <?php 	echo $recordsets['VendName'];	?></li> 
                <li class="list-group-item">Usuario: <?php 	echo $recordsets['Crtd_User'];	?></li>   
			    <li class="list-group-item">
          <?php   
          if ($recordsets['Status']=='X'){
             echo"<span class='label label-danger'>Cancelada</span>";
          }	elseif ($recordsets['Status']=='M'){
            echo"<span class='label label-success'>Completada</span>";
          }elseif ($recordsets['Status']=='O'){
            echo"<span class='label label-info'>Orden Abierta</span>";
          }elseif ($recordsets['Status']=='P'){
            echo"<span class='label label-primary'>Orden Compra</span>";
          }elseif ($recordsets['Status']=='Q'){
            echo"<span class='label label-warning'>Cotización</span>";
          }
            ?>
                </li> 
			 </ul>
			</td>
			<td>
            <table class="table">
                      <thead>
                      <tr>
                               
                               <th>Partidas de Orden de Compra</th>
                               <th>Requisiciones de Origen</th>
                      </tr>
                      </thead> 
                      <tbody> 
                   <?php 
                   $Lote_pdre=$recordsets['PONbr'];
                   $parti = file_get_contents("".$url."/ordenespartidas/".$Lote_pdre."");
                   $part= json_decode($parti ,true);
                   foreach($part as $key => $pa)
 	                {
 	               ?>
 	               <tr>
 	                  <td>
 	                 <ul class="list-group">
                     <li class="list-group-item active"><?php echo $pa['InvtID']; ?>-<?php echo $pa['TranDesc']; ?></span></li>
 	                 <li class="list-group-item">Cantidad: <b><?php echo $pa['QtyOrd']; ?></b></li> 	                
 	                 <li class="list-group-item">Costo Unitario: <b>$<?php echo $pa['CuryUnitCost']; ?></b></li>
                     
 	                 </ul>
 	                  </td>
                       <td>
                       <?php 
                   $IDRegistroPadre=$pa['User3'];
                   $requi = file_get_contents("".$url."/datosrequi/".$IDRegistroPadre."");
                   $req= json_decode($requi ,true);
                   foreach($req as $key => $re)
 	                {
 	               ?>
                    <ul class="list-group">
                     <li class="list-group-item active">Lote: <?php echo $re['BatNbr']; ?>-Semana: <?php echo $re['S4Future02']; ?></span></li>
 	                 <li class="list-group-item">DivSolic: <?php echo $re['DivSolic']; ?></li> 	                
 	                 <li class="list-group-item">AreaSolic: <b><?php echo $re['AreaSolic']; ?></b></li>
                      <li class="list-group-item">PersonaSol: <b><?php echo $re['PersonaSol']; ?></b></li>
                      <li class="list-group-item">Articulo: <b><?php echo $re['InvtID']; ?></b></li>
                      <li class="list-group-item">Cantidad: <b><?php echo $re['suma']; ?></b></li>
 	                 </ul>
                    <?php
 		           }
 	               ?>
                       
                       </td> 	                 
                      </tr>
                      </tbody> 
                    <?php
 		           }
 	                ?>
                </table>
			</td>
			</tr>
 		   <?php
 		    }
 	        ?>

                       </tbody>
                        </table>
                        <?php
                        }else{
                          echo "<div class='alert alert-primary' role='alert'>
                          <h4 class='alert-heading'>Bienvenido</h4>
                          <p>En siguiente apartodo se mostraran los procesos relacionados a una requisicion en espesifico</p>
                          <hr>
                          <p class='mb-0'>Solo debes ingresar el lote de Requisición a consultar</p>
                        </div>";
                        }
                        ?>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
			     
            </div>
          <!-- end: content -->
<?php
include_once 'footer.php';
?>