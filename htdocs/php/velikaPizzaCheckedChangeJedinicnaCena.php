<?php
include 'databaseConnection.php';
$upit = "select CenaVelika from jelovniklabudovobrdo where ProizvodID = '" . $_POST['id'] . "'";
$rez = $mysqli->query($upit);
$red = $rez->fetch_assoc();
echo $red['CenaVelika'];
$mysqli->close();
?>