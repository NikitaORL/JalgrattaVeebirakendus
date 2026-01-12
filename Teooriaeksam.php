<?php
global $yhendus;
require_once("konf.php");
require("nav.php");
require("funktsioonid.php");

if(!empty($_REQUEST["teooriatulemus"])){
teooriatulemus($_REQUEST["teooriatulemus"], $_REQUEST["id"]);
}
?>
<!doctype html>
<html>
<head>
    <title>Teooriaeksam</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<table>
    <?php
    vaataTeooriaTulemused();
    ?>
</table>
</body>
</html>

<?php
require ("footer.php");
?>