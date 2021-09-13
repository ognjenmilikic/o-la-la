<?php 
    include 'databaseConnection.php';
    $id = $_POST['id'];
    $upit = "select * from jelovniklabudovobrdo where ProizvodID = " . $id;
    $rez = $mysqli->query($upit);
    $red = $rez->fetch_assoc();
    echo '
    <div class="modal-header">
    <div>
    <h5 id="nazivProizvoda"><b>' . $red['NazivProizvoda'] . '</b></h5> ';
    if(!is_null($red['Sastojci'])){
        echo '<p style="font-size:0.8em" id="sastojci">' . $red['Sastojci'] . '</p>';
    }
    echo '
    <p style="font-size:0.8em" id="vrstaProizvoda">' . $red['VrstaProizvoda'] . '</p>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <input type="hidden" id="id" name="id" value="' . $id . '">';
    if($red['VrstaProizvoda'] == 'PIZZE' || $red['VrstaProizvoda'] == 'POSNE PIZZE'){
        echo '<input type="hidden" id="jedinicnaCena" name="jedinicnaCena" value="' . $red['CenaMala'] . '">';
    }
    else{
        echo '<input type="hidden" id="jedinicnaCena" name="jedinicnaCena" value="' . $red['Cena'] . '">';
    }
    if($red['VrstaProizvoda'] == 'PIZZE' || $red['VrstaProizvoda'] == 'POSNE PIZZE'){
        echo '
        <div class="row">
        <div class="col-md-12">
            <p class="float-start">Veličina:</p>
            <div class="float-end">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="velicina" id="velicina20"
                        value="20" checked="checked" onchange="changePizzaSize(' . $id . '); calculateTotalPriceOnRadioChange(' . $red['CenaMala'] . ')">
                    <label class="form-check-label" for="velicina20">20</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="velicina" id="velicina32"
                        value="32" onchange="changePizzaSize(' . $id . '); calculateTotalPriceOnRadioChange(' . $red['CenaSrednja'] . ')">
                    <label class="form-check-label" for="velicina32">32</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="velicina" id="velicina40"
                        value="40" onchange="changePizzaSize(' . $id . '); calculateTotalPriceOnRadioChange(' . $red['CenaVelika'] . ')">
                    <label class="form-check-label" for="velicina40">40</label>
                </div>
            </div>
        </div>
    </div>
        ';
    }
    echo '
    <div class="row mt-3">
        <div class="col-md-12">
            <p class="float-start">Količina:</p>
            <div class="float-end">
                <select class="form-select form-select-sm" id="kolicina" onchange="calculateTotalPrice()">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <p class="float-start">Ukupna cena:</p>
            <div class="float-end">';
            if($red['VrstaProizvoda'] == 'PIZZE' || $red['VrstaProizvoda'] == 'POSNE PIZZE'){
                echo '<p class="float-end" id="ukupnaCena">' . $red['CenaMala'] . ',00</p>';
            }
            else{
                echo '<p class="float-end" id="ukupnaCena">' . $red['Cena'] . ',00</p>';
            }
                echo '
            </div>
        </div>
    </div>';
    if($red['VrstaProizvoda'] == 'PIZZE' || $red['VrstaProizvoda'] == 'POSNE PIZZE'){
        echo '
    <div id="dodaci">
        <div class="row menu-item py-3">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <p style="font-size:1.2em"><b>Izaberite dodatke</b></p>
            </div>
        </div>';
    $upitDodaciZaPicu = "select * from jelovniklabudovobrdo where VrstaProizvoda = 'DODACI ZA PICU'";
    $rezUpitDodaciZaPicu = $mysqli->query($upitDodaciZaPicu);
    while($redUpitDodaciZaPicu = $rezUpitDodaciZaPicu->fetch_assoc()){
        echo ' 
        <div class="row menu-item py-3">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dodaci" value="' . $redUpitDodaciZaPicu['CenaMala'] . '" id="' . $redUpitDodaciZaPicu['NazivProizvoda'] . '" onchange="calculateTotalPrice()">
                    <label class="form-check-label" for="' . $redUpitDodaciZaPicu['NazivProizvoda'] . '">
                    ' . $redUpitDodaciZaPicu['NazivProizvoda'] . '
                    </label>
                    <p class="float-end" id="cenaDodatka"> ' . $redUpitDodaciZaPicu['CenaMala'] . ',00</p>
                </div>
            </div>
        </div>
        ';
    }
    echo '</div>';
    }
    if($red['VrstaProizvoda'] == 'SLATKE PALAČINKE'){
        echo '
    <div id="dodaci">
        <div class="row menu-item py-3">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <p style="font-size:1.2em"><b>Izaberite dodatke</b></p>
            </div>
        </div>
    </div>';
    $upitDodaciZaSlatkuPalacinku = "select * from jelovniklabudovobrdo where VrstaProizvoda = 'DODACI ZA SLATKU PALACINKU'";
    $rezUpitDodaciZaSlatkuPalacinku = $mysqli->query($upitDodaciZaSlatkuPalacinku);
    while($redUpitDodaciZaSlatkuPalacinku = $rezUpitDodaciZaSlatkuPalacinku->fetch_assoc()){
        echo ' 
        <div class="row menu-item py-3">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dodaci" value="' . $redUpitDodaciZaSlatkuPalacinku['Cena'] . '" id="' . $redUpitDodaciZaSlatkuPalacinku['NazivProizvoda'] . '" onchange="calculateTotalPrice()">
                    <label class="form-check-label" for="' . $redUpitDodaciZaSlatkuPalacinku['NazivProizvoda'] . '">
                    ' . $redUpitDodaciZaSlatkuPalacinku['NazivProizvoda'] . '
                    </label>
                    <p class="float-end" id="cenaDodatka"> ' . $redUpitDodaciZaSlatkuPalacinku['Cena'] . ',00</p>
                </div>
            </div>
        </div>
        ';
    }
    }
    if($red['VrstaProizvoda'] == 'SLANE PALAČINKE'){
        echo '
    <div id="dodaci">
        <div class="row menu-item py-3">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <p style="font-size:1.2em"><b>Izaberite dodatke</b></p>
            </div>
        </div>
    </div>';
    $upitDodaciZaSlanuPalacinku = "select * from jelovniklabudovobrdo where VrstaProizvoda = 'DODACI ZA SLANU PALACINKU'";
    $rezUpitDodaciZaSlanuPalacinku = $mysqli->query($upitDodaciZaSlanuPalacinku);
    while($redUpitDodaciZaSlanuPalacinku = $rezUpitDodaciZaSlanuPalacinku->fetch_assoc()){
        echo ' 
        <div class="row menu-item py-3">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dodaci" value="' . $redUpitDodaciZaSlanuPalacinku['Cena'] . '" id="' . $redUpitDodaciZaSlanuPalacinku['NazivProizvoda'] . '" onchange="calculateTotalPrice()">
                    <label class="form-check-label" for="' . $redUpitDodaciZaSlanuPalacinku['NazivProizvoda'] . '">
                    ' . $redUpitDodaciZaSlanuPalacinku['NazivProizvoda'] . '
                    </label>
                    <p class="float-end" id="cenaDodatka"> ' . $redUpitDodaciZaSlanuPalacinku['Cena'] . ',00</p>
                </div>
            </div>
        </div>
        ';
    }
    }
    if($red['VrstaProizvoda'] == 'POHOVANE PALAČINKE'){
        echo '
    <div id="dodaci">
        <div class="row menu-item py-3">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <p style="font-size:1.2em"><b>Izaberite dodatke</b></p>
            </div>
        </div>
    </div>';
    $upitDodaciZaSlanuPalacinku = "select * from jelovniklabudovobrdo where VrstaProizvoda = 'DODACI ZA SLANU PALACINKU'";
    $rezUpitDodaciZaSlanuPalacinku = $mysqli->query($upitDodaciZaSlanuPalacinku);
    while($redUpitDodaciZaSlanuPalacinku = $rezUpitDodaciZaSlanuPalacinku->fetch_assoc()){
        echo ' 
        <div class="row menu-item py-3">
            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dodaci" value="' . $redUpitDodaciZaSlanuPalacinku['Cena'] . '" id="' . $redUpitDodaciZaSlanuPalacinku['NazivProizvoda'] . '" onchange="calculateTotalPrice()">
                    <label class="form-check-label" for="' . $redUpitDodaciZaSlanuPalacinku['NazivProizvoda'] . '">
                    ' . $redUpitDodaciZaSlanuPalacinku['NazivProizvoda'] . '
                    </label>
                    <p class="float-end" id="cenaDodatka"> ' . $redUpitDodaciZaSlanuPalacinku['Cena'] . ',00</p>
                </div>
            </div>
        </div>
        ';
    }
    }
    echo '
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izađi</button>
    <button type="button" class="btn btn-primary" onclick="addToCart()">Dodaj u korpu</button>
</div>
    ';
    $mysqli->close();
?>