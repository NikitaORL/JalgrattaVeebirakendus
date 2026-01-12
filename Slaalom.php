<?php
global $yhendus;

require_once("konf.php");
require_once("nav.php");
require("funktsioonid.php");

if(!empty($_REQUEST["korras_id"])){
 korradIdSlaalom();
}
if(!empty($_REQUEST["vigane_id"])){
viganeIdSlaalom();
}

?>
<!doctype html>
<html>
<head>
    <title>Slaalom</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<h1>Slaalom</h1>
<table>
    <?php
   vaataSlaalom();
    ?>
</table>
</body>
</html>

<?php
require ("footer.php");
?>