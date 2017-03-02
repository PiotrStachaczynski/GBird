<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Service
 *
 * @author Piotrek
 */
class Service 
{
    private $tekst;
    private $wynik;
    private $key;
    
    public function getKey()
    {
        return $this->key;
    }
    public function zaszyfruj($txt)
    {
        $this->tekst = $txt;
        $this->key = rand(3,30);
        $alfabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxy z1234567890-=!@#$%^&*()_+";
        $szyfr='';
        for ($i=0;$i<strlen($this->tekst);$i++) 
        {
        $szyfr .= $alfabet[(strpos($alfabet, $this->tekst[$i])+$this->key) % (strlen($alfabet)-1)];
        }
        $this->wynik=$szyfr;
        return $this->wynik;
    }
    public function odszyfruj($key,$txt)
    {
        $tekst = $txt;
        $klucz = $key;
        $alfabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxy z1234567890-=!@#$%^&*()_+";
        $szyfr='';
        for ($i=0;$i<strlen($tekst);$i++) 
        {
        $szyfr .= $alfabet[(strpos($alfabet, $tekst[$i])-$klucz) % (strlen($alfabet)-1)];
        }
        $this->wynik=$szyfr;
        return $this->wynik;
        
    }
}
