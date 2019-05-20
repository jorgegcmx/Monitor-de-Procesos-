<?php
include_once 'header.php';
$url='http://localhost:8000';
$al=$_GET['almacen'];
$tan=$_GET['tanque'];
$fecha=$_GET['fecha'];
$res = file_get_contents("".$url."/Salidas/".$al."/".$tan."/".$fecha."");
$datos= json_decode($res,true);
?>
<div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Tanques Gas</h3></div>
                    <div class="panel-body">   
                    <!-- Button trigger modal -->                                       
                      <div class="responsive-table">
                          <table   class="table table-striped table-bordered" width="100%" cellspacing="0">
                           <thead>
						                <tr>   
                              <th></th>     
                            <th>ALMACEN_GAS</th>
						                <th>LOCALIZACION_GAS</th>
						                <th>FECHA_TRANSACCION</th>
                            <th>CONSUMO_POR_CASETA</th>						                
						                </tr>
						                </thead>
						                <tbody>
                            <?php
                            $item=0;
                            foreach($datos as $key=> $recordsets)
                            $item=$item+1;
                           
 	                        { 	    
 	                        ?>
                           <tr>
                           <?php 
                            if($item==0){
                             echo "<td colspan='5'>
                             <div align='center' class='alert alert-danger' role='alert'>
                              No existe registro de Salida en esta Fecha ".$fecha."
                             </div></td>";
                            }else{
                           ?>
                           <td><?php echo $item;?></td>
                           <td><?php echo $recordsets['ALMACEN_GAS']; ?> </td>
                           <td><?php echo $recordsets['LOCALIZACION_GAS']; ?> </td>
                           <td><?php echo $recordsets['FECHA_TRANSACCION']; ?> </td>
                           <td><?php echo $recordsets['CONSUMO_POR_CASETA']; ?> </td>
                           <?php }?>
                           </tr>
                            <?php 
                            }
                            ?>
                           </tbody>
                           </table>                      
                      </div>
                  </div>
                </div>