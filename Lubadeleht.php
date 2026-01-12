<?php
global $yhendus;
require_once("konf.php");
require("nav.php");
require("funktsioonid.php");


/*--------------------kustutamine---------------------------------*/
if(isset($_REQUEST["kustuta_id"])){
    kustuta($_REQUEST["kustuta_id"]);
}
/*------------------------------------------------------*/


if(!empty($_REQUEST["vormistamine_id"])){
    vormistamineLubadeleht();
}




function asenda($nr){
    if($nr==-1){return ".";} //tegemata
    if($nr== 1){return "korras";}
    if($nr== 2){return "ebaõnnestunud";}
    return "Tundmatu number";
}
?>
<!doctype html>
<html>
<head>
    <title>Lõpetamine</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<h1>Lõpetamine</h1>
<table>
    <tr>
        <th>Eesnimi</th>
        <th>Perekonnanimi</th>
        <th>Teooriaeksam</th>
        <th>Slaalom</th>
        <th>Ringtee</th>
        <th>Tänavasõit</th>
        <th>Lubade väljastus</th>
        <th>Kustutamine</th>
    </tr>
    <?php
    vaataLubadeleht();
    ?>
</table>
</body>
</html>

<?php
require ("footer.php");
?>