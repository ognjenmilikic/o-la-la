<?php 
include 'databaseConnection.php';
$upit = 'select * from jelovniklabudovobrdo where VrstaProizvoda = "DODACI ZA PICU"';
$rez = $mysqli->query($upit);

echo '
<div class="row menu-item py-3">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <p style="font-size:1.2em"><b>Izaberite dodatke</b></p>
            </div>
        </div>';
    while($red = $rez->fetch_assoc()){
        echo ' 
        <div class="row menu-item py-3">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" name="dodaci" type="checkbox" value="' . $red['CenaVelika'] . '" id="' . $red['NazivProizvoda'] . '" onchange="calculateTotalPrice()">
                    <label class="form-check-label" for="' . $red['NazivProizvoda'] . '">
                    ' . $red['NazivProizvoda'] . '
                    </label>
                    <p class="float-end" id="cenaDodatka"> ' . $red['CenaVelika'] . ',00</p>
                </div>
            </div>
        </div>
        ';
    }
    $mysqli->close();
?>