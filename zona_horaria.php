
<div class=" row">
<?php
$idzona = null;
include_once '../Zonashorarias/Classe.php';
$usu1 = new Classe();
$datos = $usu1->get_zona($idadmin);
while ($fila = $datos->fetchObject()) {
    ?>
 <div class="col-md-3 col-sm-3 col-xs-6">
  <a data-toggle="tooltip" title="Editar" class="well top-block" href="index.php?id=<?php if ($fila->idzona != null) {echo $idzona = $fila->idzona;} else { $idzona = null;}
    ;?>">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Zona Horaria Establecida</div>
            <div>
 <?php echo $fila->zonahoraria; ?>
   </div>
   </a>

    </div>
	  <?php
}
?>
</div>

<div class="row">

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i>Administrador: <?php echo $_SESSION['nombreadmin']; ?></h2>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h1>Sistema de Monitoreo </h1> Permitirá saber la localización de tus Empleados, solo debes dar de alta a tus empleados asignado el Nombre del Empleado, Usuario y Contraseña para que posteriormente acceda al sistema y guarde su localización de esta manera quedara registrada en conjunto con la hora y fecha en que guardo. <br>

			   <?php if ($idzona == null) {?>
              <div class="alert alert-warning">
              <strong>Alerta!!!</strong> Recuede agregar la zona horariá y principalmente los departamentos!!!.
                 </div>
				<form class="form-horizontal" action="../Zonashorarias/agregar.php" method="post">
          		<input type="hidden" name="admin_idadmin" class="form-control" required value="<?php echo $_SESSION['idadmin']; ?>">
			     <div class="control-group">
                    <label class="control-label" for="selectError">Establece la zona horaria</label>
                    <div class="controls">
                        <select id="selectError" data-rel="chosen" required name="zonahoraria">
                        <option></option>
                         <?php
                      foreach (timezone_abbreviations_list() as $abbr => $timezone) {
                      foreach ($timezone as $val) {
                      if (isset($val['timezone_id'])) {
                        echo "<option value=" . $val['timezone_id'] . ">" . $val['timezone_id'] . "</option>";
                          }
                        }
                    }
                   ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="selectError"></label>
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
            </form>
        <?php } elseif (isset($_GET['id'])) {
    include_once '../conexion/Conexion.php';
    $id = $_GET['id'];
    include_once '../Zonashorarias/Classe.php';
    $usu1 = new Classe();
    $datos = $usu1->get_zonah($id);
    $fila = $datos->fetchObject();

    ?>

			 <form class="form-horizontal" action="../Zonashorarias/agregar.php" method="post">
			<?php if (isset($id)) {echo "<input type='hidden' value='$fila->idzona' name='id'>";}?>
          		<input type="hidden" name="admin_idadmin" class="form-control" required value="<?php echo $_SESSION['idadmin']; ?>">
			     <div class="control-group">
                    <label class="control-label" for="selectError">Selecciona la nueva zona horaria</label>
                    <div class="controls">
                        <select id="selectError" data-rel="chosen" required name="zonahoraria">
                        <option></option>
                         <?php
foreach (timezone_abbreviations_list() as $abbr => $timezone) {
        foreach ($timezone as $val) {
            if (isset($val['timezone_id'])) {
                echo "<option value=" . $val['timezone_id'] . ">" . $val['timezone_id'] . "</option>";
            }
        }
    }
    ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="selectError"></label>
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
            </form>
               <?php }?>  <!-- Ads end -->

            </div>
        </div>
    </div>
</div>
