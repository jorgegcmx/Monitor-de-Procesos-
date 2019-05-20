<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
     <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

<!-- plugins -->
<link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
<link href="asset/css/style.css" rel="stylesheet">
<!-- end: Css -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
</head>
<body id="mimin" class="dashboard">
<nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">              
              <img src="http://www.nutrypollo.com.mx/images/main-logo.png" width="50" height="50"  alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
               <ul class="nav navbar-nav navbar-right user-nav">
                 <li class="user-name"><span>Aplicación Monitoreo de Gas Granjas</span></li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="index.php" type="button" class="btn btn-info"><b>Requisición</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="ventas.php" type="button" class="btn btn-info"><b>Ventas</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="realtime.php" type="button" class="btn btn-info"><b>Tanques RealTime</b></a>
                  </li>
                  <li class="dropdown avatar-dropdown">              
                  <a href="tanques_gas.php" type="button" class="btn btn-info"><b> % Tanques Gas</b></a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
    <div id="recarga" class="container-fluid mimin-wrapper" ></div>
</body>
<script>
    $(document).ready(function(){
        setInterval(() => {
            $('#recarga').load('graficas.php');
        }, 1000        
        );
    });
</script>
</html>