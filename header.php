<!DOCTYPE html>
<html lang="es">
<head>  
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitor de Procesos</title>
  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
    <!-- end: Css -->
  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!--Libreria para generar reportes graficos -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
<body id="mimin" class="dashboard">
      <!-- start: Header class="img-circle avatar" -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">              
              <img src="http://nutrypollo.com.mx/wp-content/uploads/2019/11/main-logo.png" width="50" height="50"  alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
               <ul class="nav navbar-nav navbar-right user-nav">
                 <li class="user-name"><span>Aplicación de Monitoreo </span></li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="pedidos.php" type="button" class="btn btn-info"><b>Pedidos</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="mortalidad.html" type="button" class="btn btn-info"><b>Mortalidad</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="ventas.php" type="button" class="btn btn-info"><b>Salidas de Inventrio</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="realtime.php" type="button" class="btn btn-info"><b>Tanques RealTime</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="tanques_gas.php" type="button" class="btn btn-info"><b> % Tanques Gas</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="http://localhost:8090/SQLSERVER_Visor_proyectos_PE/views/" type="button" class="btn btn-info"><b>Información General Cartones</b></a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->
<div class="container-fluid mimin-wrapper">
<div ><br><br><br><br>

         