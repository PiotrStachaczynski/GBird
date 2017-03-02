
<?php

$html = file_get_contents("start.xhtml");       
echo $html;
 session_start();
     
  
 ?>

<?php
    if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
?>