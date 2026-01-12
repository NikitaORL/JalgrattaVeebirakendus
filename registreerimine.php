<?php
global $yhendus;
require_once("konf.php");
require("nav.php");
require("funktsioonid.php");


if(isset($_POST["sisestusnupp"])){
    registreerimine($_POST["eesnimi"], $_POST["perekonnanimi"]);
}
?>
<!doctype html>
<html>
<head>
    <title>Kasutaja registreerimine</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<h1>Kasutaja registreerimine</h1>

<form action="" method="post">
    <dl>
        <dt>Eesnimi:</dt>
        <dd><input type="text" name="eesnimi" /></dd>

        <dt>Perekonnanimi:</dt>
        <dd><input type="text" name="perekonnanimi" /></dd>

        <dt><input type="submit" name="sisestusnupp" value="Sisesta" /></dt>
    </dl>
</form>
</body>
</html>

<?php
require ("footer.php");
?>