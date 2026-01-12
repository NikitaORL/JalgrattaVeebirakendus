<?php
global $yhendus;
require_once ("konf.php");

/*--------------REGISTREERIMINE-----------------------------*/
function registreerimine($eesnimi, $perekonnanimi){
    global $yhendus;
    if(empty($eesnimi) || empty($perekonnanimi) || is_numeric($eesnimi) || is_numeric($perekonnanimi)){
        header("Location: $_SERVER[PHP_SELF]?viga=1");
        exit();
    }
    $kask=$yhendus->prepare(
    "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
    $kask->bind_param("ss", $eesnimi, $perekonnanimi);
    $kask->execute();
    $yhendus->close();

    header("Location: teooriaeksam.php?");
}


/*---------------------KUSTUTA LUBALEHT--------------------------------------------*/
function kustuta($id){
    global $yhendus;
    $kask = $yhendus->prepare("DELETE FROM jalgrattaeksam WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
}


/*---------------------VORMISTAMINE LUBADELEHT--------------------------------------------*/
function vormistamineLubadeleht()
{
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET luba=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vormistamine_id"]);
    $kask->execute();
}

/*---------------------VORMISTAMINE LUBADELEHT--------------------------------------------*/


function vaataLubadeleht(){
    global $yhendus;
    $kask=$yhendus->prepare(
        "SELECT id, eesnimi, perekonnanimi, teooriatulemus,  
 slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;");
    $kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus,   $slaalom, $ringtee, $t2nav, $luba);
    $kask->execute();


    while($kask->fetch()){
        $asendatud_slaalom=asenda($slaalom);
        $asendatud_ringtee=asenda($ringtee);
        $asendatud_t2nav=asenda($t2nav);
        $loalahter=".";
        if($luba==1){$loalahter="Väljastatud";}
        if($luba==-1 and $t2nav==1){
            $loalahter="<a href='?vormistamine_id=$id'>Vormista load</a>";  }
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td>$teooriatulemus</td> 
 <td>$asendatud_slaalom</td> 
 <td>$asendatud_ringtee</td> 
 <td>$asendatud_t2nav</td> 
 <td>$loalahter</td> 
 
 <td>
        <a href='?kustuta_id=$id'>Kustuta</a>
 </td>
 
 </tr> 
 ";
    }
    $kask->close();
}



/*---------------------KORRAS ID RINGTEE--------------------------------------------*/

function korrasIdRingtee()
{
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET ringtee=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
}



/*---------------------VIGANE ID RINGTEE--------------------------------------------*/
function viganeIdRingtee($id){
    global $yhendus;
    $kask = $yhendus->prepare("UPDATE jalgrattaeksam SET ringtee=2 WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
}



/*-------------------------VAATA RINGTEE----------------------------------------*/
function vaataRingtee()
{
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus>=9 AND ringtee=-1");  $kask->bind_result($id, $eesnimi, $perekonnanimi);
    $kask->execute();

    while($kask->fetch()){
        echo "
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td> 
 <a href='?korras_id=$id'>Korras</a> 
 <a href='?vigane_id=$id'>Ebaõnnestunud</a> 
 </td> 
</tr> 
 ";
    }
}


/*--------------------------TEOORIA TULEMUS---------------------------------------*/
function teooriatulemus($teooriatulemus, $id)
{
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $teooriatulemus, $id);
    $kask->execute();

}



/*--------------------------TEOORIA VAATA---------------------------------------*/

function vaataTeooriaTulemused(){
    global $yhendus;
    $kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi, teooriatulemus  FROM jalgrattaeksam WHERE teooriatulemus<10");
    $kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus);
    $kask->execute();

    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td>$teooriatulemus</td>
 <td><form action=''> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
}


/*--------------------------KORRAS ID SLAALOM---------------------------------------*/
function korradIdSlaalom(){
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["korras_id"]);
    $kask->execute();
}

/*--------------------------VIGANE ID SLAALOM---------------------------------------*/

function viganeIdSlaalom(){
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["vigane_id"]);
    $kask->execute();
}
/*--------------------------VAATA ID SLAALOM---------------------------------------*/
function vaataSlaalom(){
    global $yhendus;
    $kask = $yhendus->prepare("SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam WHERE teooriatulemus>=10 AND slaalom=-1");
    $kask->bind_result($id, $eesnimi, $perekonnanimi);
    $kask->execute();

    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td> 
 <a href='?korras_id=$id'>Korras</a>
 <a href='?vigane_id=$id'>Ebaõnnestunud</a> 
 </td> 
</tr> 
 ";
    }
}