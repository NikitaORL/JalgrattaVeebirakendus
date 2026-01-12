<?php
global $yhendus;


require("funktsioonid.php");

/*-------------KORRAS ID----------------------*/
if(!empty($_REQUEST["korras_id"])){
    korrasIdRingtee();
}
/*--------------VIGANE ID-------------------------------------*/
if(!empty($_REQUEST["vigane_id"])){
    viganeIdRingtee($_REQUEST["vigane_id"]);
}


?>
<!doctype html>
<html>
<head>
    <title>Ringtee</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<h1>Ringtee</h1>


<nav>
    <ul>
        <li><a href="registreerimine.php">Registreerimine</a></li>
        <li><a href="Teooriaeksam.php">Teooriaeksam</a></li>
        <li><a href="Slaalom.php">Slaalom</a></li>
        <li><a href="Ringtee.php">Ringtee</a></li>
        <li><a href="Tanav.php">Tänavasõit</a></li>
        <li><a href="Lubadeleht.php">Lubade leht</a></li>
    </ul>
</nav>


<table>
    <?php

    vaataRingtee();
    ?>
</table>
</body>
</html>

<?php
require ("footer.php");
?>