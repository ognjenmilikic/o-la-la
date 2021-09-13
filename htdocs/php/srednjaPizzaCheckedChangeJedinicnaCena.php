<?php
include 'databaseConnection.php';
$upit = "select CenaSrednja from jelovniklabudovobrdo where ProizvodID = '" . $_POST['id'] . "'";
$rez = $mysqli->query($upit);
$red = $rez->fetch_assoc();
echo $red['CenaSrednja'];
$mysqli->close();
?>