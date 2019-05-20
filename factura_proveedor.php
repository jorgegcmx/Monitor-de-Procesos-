<?php

include_once 'header.php';

$url='http://localhost:8000';

?>  
  <div ><br><br><br><br>
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-6">
                       <form action="index.php" method="GET">
  <div class="form-group">
    <label for="exampleInputEmail1">Lote de Factura</label>
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
                    <div class="panel-heading"><h3>Factura</h3></div>
                    <div class="panel-body">                      
                      <div class="responsive-table">
                      <?php 
                      if(isset($_GET['requi'])){
                      ?>
                <table  class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
						    <tr>
						    <th>Datos de Factura</th>
						    <th>Detalle</th>
						    </tr>
						    </thead>
						    <tbody>
                            <td>


                            
                            <td>
                           </tbody>
                           </table>
                        <?php
                        }else{
                          echo "<div class='alert alert-success' role='alert'>
                          <h4 class='alert-heading'>Bienvenido</h4>
                          <p>En siguiente apartodo se mostraran los procesos relacionados a una Factura en espesifico</p>
                          <hr>
                          <p class='mb-0'>Solo debes ingresar el Lote de Factura a consultar</p>
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