<?php
$servernimi = "localhost";
$kasutajanimi = "orlenkoJalgrattas";
$parool = '1234';
$andmebaadnimi = 'jalgrattaeksam';
$connection = new mysqli($servernimi, $kasutajanimi, $parool, $andmebaadnimi);
$connection->set_charset("utf8")
?>