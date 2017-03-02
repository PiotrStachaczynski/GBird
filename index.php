
<?php

$html = file_get_contents("HTML/start.xhtml");       
echo $html;
 session_start();
     
  
 ?>

<?php
    if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
?>