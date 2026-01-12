<?php
$servernimi = "localhost";
$kasutajanimi = "orlenkoJalgrattas";
$parool = '1234';
$andmebaadnimi = 'jalgrattaeksam';
$yhendus = new mysqli($servernimi, $kasutajanimi, $parool, $andmebaadnimi);
$yhendus->set_charset("utf8")
?>