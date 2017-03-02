<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_REQUEST['zaszyfr']) && ($_REQUEST['zaszyfr']=='ZASZYFRUJ'))
{
        $tekst = $_POST['tekst'];
        $klucz = rand(3,30);
        $alfabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-=!@#$%^&*()_+";
        $szyfr='';
        for ($i=0;$i<strlen($tekst);$i++) 
        {
        $szyfr .= $alfabet[(strpos($alfabet, $tekst[$i])+$klucz) % (strlen($alfabet)-1)];
        }
        $wynik=$szyfr;
}
if(isset($_REQUEST['odszyfr']) && ($_REQUEST['odszyfr']=='ODSZYFRUJ'))
{
    
        $tekst = $_POST['tekst'];
        $klucz = $_POST['klucz'];
        $alfabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-=!@#$%^&*()_+";
        $szyfr='';
        for ($i=0;$i<strlen($tekst);$i++) 
        {
        $szyfr .= $alfabet[(strpos($alfabet, $tekst[$i])-$klucz) % (strlen($alfabet)-1)];
        }
        $wynik=$szyfr;
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>GreyBird Szyfrowanie Synchroniczne</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="syncs.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
         <div id="nawigacja">
           <button type="button" onclick="window.location.href='serv.php'" name="sync" value="sync" class="css3button">INFORMACJE</button>
        <button type="button" onclick="window.location.href='szyfr2.php'" name="sync" value="sync" class="css3button">SZYFROWANIE SYNC</button>
          <button type="button" onclick="window.location.href='szyfr.php'" name="sync" value="sync" class="css3button">SZYFROWANIE ASYNC</button>
           <button type="button" onclick="window.location.href='index.php'" name="sync" value="sync" class="css3button">WYLOGUJ</button>
        </div>
        <h1>Szyfrowanie Synchroniczne (Szyfr Cezara)</h1>
        <div id="place">
            <form action="sync.php" method="post">
           <textarea rows="10" name="tekst" cols="30">Zapisz wiadomość</textarea>
           <textarea rows="10" name="wynik" cols="30" readonly="readonly"><?php echo htmlspecialchars($wynik); ?></textarea> <br/>
           
            <input type="submit" name="zaszyfr" value="ZASZYFRUJ" /> &nbsp;&nbsp;&nbsp;&nbsp; 
            <input type="submit" name="odszyfr" value="ODSZYFRUJ" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspKlucz: 
           <input type="text"  name="klucz" class="krotki" value="<?php echo htmlspecialchars($klucz); ?>" />  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Autor: <input type="text" name="autor" class="Autor"  /> &nbsp; <input type="text" name="mail" class="tekst"/> &nbsp;&nbsp;&nbsp;
          <input type="submit" value="e-mail"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </form>
        </div>
        <div>TODO write content</div>
    </body>
</html>
