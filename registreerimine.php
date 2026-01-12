<?php
global $yhendus;
require_once("konf.php");
require("nav.php");

if(isset($_REQUEST["sisestusnupp"])){

    $eesnimi = trim($_REQUEST["eesnimi"]);
    $perekonnanimi = trim($_REQUEST["perekonnanimi"]);

    // Kontroll: ees- ja perekonnanimi ei tohi olla tühjad ega numbrilised
    if($eesnimi === "" || $perekonnanimi === "" || is_numeric($eesnimi) || is_numeric($perekonnanimi)){
        echo "<p>Sisesta korrektne ees ja perekonnanimi</p>";
    } else {

        $kask = $yhendus->prepare(
            "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
        $kask->bind_param("ss", $eesnimi, $perekonnanimi);
        $kask->execute();
        $yhendus->close();


        header("Location: teooriaeksam.php"); //
        exit();
    }
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