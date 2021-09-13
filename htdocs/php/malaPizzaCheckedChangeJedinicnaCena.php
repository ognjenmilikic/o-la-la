<?php
include 'databaseConnection.php';
$upit = "select CenaMala from jelovniklabudovobrdo where ProizvodID = '" . $_POST['id'] . "'";
$rez = $mysqli->query($upit);
$red = $rez->fetch_assoc();
echo $red['CenaMala'];
$mysqli->close();
?>