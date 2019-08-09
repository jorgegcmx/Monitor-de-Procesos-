<?php
include_once 'header.php';
$url='http://localhost:8000';
?>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
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