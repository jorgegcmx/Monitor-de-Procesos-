
<?php
include_once 'header.php';
$url='http://localhost:8000';
?>  
 <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-6">
                       <form action="index.php" method="GET">
                       <div class="form-group">
                         <label for="exampleInputEmail1">LoteRequisición</label>
                           <input type="number" required name="requi" class="form-control" width="6" >
                             </div>
                            <button type="submit" class="btn btn-primary">Buscar</button></form>
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Requisiciones</h3></div>
                    <div class="panel-body">                      
                      <div class="responsive-table">
                      <?php 
                      if(isset($_GET['requi'])){
                      ?>
                <table  class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
						    <tr>
						    <th>Datos Requisicion</th>
						    <th>Pastidas</th>
						    </tr>
						    </thead>
						    <tbody>
<?php
$lot=$_GET['requi'];
$res = file_get_contents("".$url."/Requisiciones/".$lot."");
//print_r($res);
$datos= json_decode($res,true);
//print_r($datos);
foreach($datos as $key=> $recordsets)
 	{ 	    
 	    ?>
 		 <tr class="table-primary">						
			<td>
			<ul class="list-group">
			    <li class="list-group-item active"><?php echo $recordsets['BatNbr']; ?>  </li> 
			    <li class="list-group-item">DivSolic: <?php 	echo $recordsets['DivSolic'];	?></li>  
			    <li class="list-group-item">AreaSolic: <?php 	echo $recordsets['AreaSolic'];	?></li>  
			    <li class="list-group-item">PersonaSol: <?php 	echo $recordsets['PersonaSol'];	?></li>
			    <li class="list-group-item">
			    <?php 	
			    if($recordsets['Status']=='C'){
			         echo "<span class='label label-warning'><b>Abierta</b></span>";
			    }elseif($recordsets['Status']=='U'){
			         echo "<span class='label label-info'>En Captura</span>";
			    }elseif($recordsets['Status']=='A'){
			     echo "<span class='label label-success'>Autorizada</span>";
			    }elseif($recordsets['Status']=='P'){
			    echo "<span class='badge badge-dark'>Cerrada</span>";
			    }	?></li> 
			 </ul>
			</td>
			<td>
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
        <th scope="col">Información</th>
    </tr>
  </thead>
  <tbody>
		<?php
             $Batnbr=$recordsets['BatNbr'];
             $partidas = file_get_contents("".$url."/partidas/".$Batnbr."");
             $datos_partidas= json_decode($partidas,true);
             foreach($datos_partidas as $key => $part_req)
 	         {
 	         ?>

      <tr>
      <td>
      <?php 
                if($part_req['StatusPartida']=='C'){
			         echo "<span class='badge badge-dark'><b>Cerrada</b></span>";
			    }elseif($part_req['StatusPartida']=='U'){
			         echo "<span class='label label-info'>Por Autorizar</span>";
			    }elseif($part_req['StatusPartida']=='A'){
			     echo "<span class='label label-success'>Autorizada</span>";
			    }elseif($part_req['StatusPartida']=='P'){
			    echo "<span class='label label-warning'>Parcial Abierta</span>";
			    }
      ?>
      </td>
    
      <td>
      <ul class="list-group">
      <li class="list-group-item active"><?php echo $part_req['InvtID'];?></li>
	  <li class="list-group-item"><?php 	echo $part_req['DescrSL'];	?>  </li>
	  <li class="list-group-item"><b>Cant </b><?php 	echo $part_req['CantOrdBASE'];	?>  </li>
	  <li class="list-group-item"><?php 	echo $part_req['User7'];	?>  </li>
	  </ul>
      </td>
       <td>
          <table>
              <tr>
                  <th>RQ_Padre</th>
                  <th>Ord_Compra</th>
              </tr>
            <?php  
             $RegistroID=$part_req['RegistroID'];
             $requipadre = file_get_contents("".$url."/requipadre/".$RegistroID."");
             $reqpa= json_decode($requipadre ,true);
             foreach($reqpa as $key => $req_pa)
 	         {
 	             ?>
 	            <tr>
                 <td>
                     <ul class="list-group">
                     <li class="list-group-item active"><?php echo $req_pa['BatNbrPadre'];?></span></li>
                     <li class="list-group-item "><?php echo $req_pa['DivSolic'];?></span></li>
                     <li class="list-group-item "><?php echo $req_pa['AreaSolic'];?></span></li>
                     <li class="list-group-item "><?php echo $req_pa['PersonaSol'];?></span></li>
                      </ul>
                </td>
                  <td>
                  <table >
                    <tr>
                    <th></th>
                    <th>Recepción</th>
                    </tr>
                  <?php 
                  $ID_pdre=$req_pa['RegistroIDPadre'];
                  $orden = file_get_contents("".$url."/orden/".$ID_pdre."");
                  $ord= json_decode($orden ,true);
                  foreach($ord as $key => $or)
 	                {
 	               ?>
 	                <tr>
                      <td>
                     <ul class="list-group">
                     <li class="list-group-item active"><?php echo $or['PONbr']; ?></li>
                      <li class="list-group-item"><?php echo $or['vendid']; ?></li>
                      <li class="list-group-item"><?php echo $or['VendName'];?></li>
                      <li class="list-group-item"><b><?php echo $or['InvtID']; ?></b></li>
                      <li class="list-group-item"><b>Cant </b><?php echo $or['qtyord']; ?></li>
                      <li class="list-group-item"><b>UniCost $</b><?php echo $or['curyunitcost']; ?></li>
                      <li class="list-group-item">
                      <?php 
                if($or['status']=='M'){
			          echo "<span class='label label-default'><b>Completada</b></span>";
			          }elseif($or['status']=='O'){
			          echo "<span class='label label-info'>Abierta</span>";
			          }elseif($or['status']=='P'){
			          echo "<span class='label label-success'>Orden Compra</span>";
			          }elseif($or['status']=='Q'){
			           echo "<span class='label label-warning'>Cotización</span>";
			          }elseif($or['status']=='X'){
			           echo "<span class='label label-danger'>Cancelada</span>";
			          }
                      ?>
                      </li>
                      </ul>
                      </td>
                      <td>
                       <table>
                           <tr>
                               <th></th>
                               <th>Factura</th>
                      </tr>
                           
                   <?php 
                   if($or['status']=='X'){
                   }else{
                    $ID_pdre=$req_pa['RegistroIDPadre'];
                   $reception = file_get_contents("".$url."/reception/".$ID_pdre."");
                   $recept= json_decode($reception ,true);
                   foreach($recept as $key => $recep)
 	                {
 	               ?>
 	               <tr>
 	                  <td>
 	                 <ul class="list-group">
                     <li class="list-group-item active"><?php echo $recep['BatNbr']; ?></span></li>
 	                 <li class="list-group-item"><?php echo $recep['VendID']; ?></li>
 	                 <li class="list-group-item"><span class="label label-info"><?php echo $recep['PONbr']; ?></span></li>
 	                 <li class="list-group-item"><b><?php echo $recep['InvtID']; ?></b></li>
 	                 <li class="list-group-item"><b>Cant </b><?php echo $recep['Qty']; ?></li>
 	                 <li class="list-group-item"><b>UniCost $</b><?php echo $recep['UnitCost']; ?></li>
 	                 <li class="list-group-item"><?php echo $recep['rcptdate']; ?></li>
 	                 </ul>
 	                 </td>
 	                 <td>
 	                      <table>
                           <tr>
                               <th></th>
                               <th>Detalle de Factura</th>
                           </tr>
 	                     <?php
 	                     $lotereffac=$recep['PONbr'];
 	                     $factura = file_get_contents("".$url."/factura/".$lotereffac."");
                         $fac= json_decode($factura ,true);
                         foreach($fac as $key => $f)
 	                       {
 	                     ?>
 	                     <tr>
 	                        <td>
 	                          <ul class="list-group">
			                  <li class="list-group-item active"><?php echo $f['BatNbr']; ?></li> 
			                  <li class="list-group-item "><?php echo $f['User2']; ?></li> 
			                  <li class="list-group-item ">FechaFac: <?php echo $f['Fecha1']; ?></li>
			                  <li class="list-group-item ">FechaRecp:<?php echo $f['Recep']; ?></li>
			                  <li class="list-group-item ">FechaRecpTeso:<?php echo $f['RecepTeso']; ?></li>
			                  </ul>  
 	                      </td> 
 	                        <td>
                           <table class="table">
                           <tr>
                           <th>Articulo</th>
                           <th>Cant</th>
                           <th>UnitCost</th>
                           <th>SubTotal</th>
                           </tr>
                           <?php
                            $Nolotffac=$f['BatNbr'];
                            $total_Factura=0;
                            $detfactura = file_get_contents("".$url."/detallefactura/".$Nolotffac."");                          
                             $detfac= json_decode($detfactura ,true);
                             foreach($detfac as $key => $detf)
                              {
                           ?>
                        <tr>
                        <td><?php echo $detf['InvtID']; ?></td>
                        <td><?php echo $detf['Qty']; ?></td>
                        <td>$<?php echo $detf['CuryPOUnitPrice']; ?></td>
                        <td><?php echo $detf['CuryPOExtPrice']; ?></td>
                        </tr>                          
                        <?php 
                        $total_Factura=$total_Factura+$detf['CuryPOExtPrice'];
                          }
                         ?>
                         <tr>
                         <td colspan="2"></td>
                         <td colspan="2"><b>Total: $<?php echo $total_Factura; ?></b></td>
                         </tr>
                        </table>
                          </td>
 	                     </tr>
 	                       <?php
 	                       } 	                     
 	                     ?>
 	                     </table>
 	                 </td>
 	               </tr>
                    <?php
 	                  }
                    }
 	                ?> 
 	                </table>  
                      </td>
                    </tr>
 	               <?php
 	                }
                    ?> 
                   </table>
                  </td>
                </tr>
 	         <?php
 	         }
             ?>
             </table>
             </td>
             </tr>
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