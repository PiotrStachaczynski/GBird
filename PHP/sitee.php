<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
    
    if ((!isset($_POST['login'])) || (!isset($_POST['pass'])))
    {
        header('Location: ../index.php');
        exit();
    }
 
    require_once "connect.php";
 
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
     
    if ($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        
        $login = $_POST['login'];
        $haslo = $_POST['pass'];
         
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
     
        if ($rezultat = @$polaczenie->query(
        sprintf("SELECT * FROM user WHERE login='%s' AND pass='%s'",
        mysqli_real_escape_string($polaczenie,$login),
        mysqli_real_escape_string($polaczenie,$haslo))))
        {
            
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $_SESSION['zalogowany'] = true;
                 
                $wiersz = $rezultat->fetch_assoc();  
                unset($_SESSION['blad']);
                $rezultat->free_result();
                header('Location: serv.php');
                 
            } else {
                 
                $_SESSION['blad'] = '';
                header('Location: index.php');
                 
            }
             
        }
         
        $polaczenie->close();
    }
     
    ?>
