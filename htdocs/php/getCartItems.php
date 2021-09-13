 <?php
 session_start();
 if($_POST['mod']!=0){
     unset($_SESSION['cart'][$_POST['mod']]);
 }
 if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $keys = array_keys($_SESSION['cart']);
    $ukupnaCenaKorpe = 0;
     echo '
     <div class="modal-header">
                    <h5 class="modal-title" id="CartModalLabel">Korpa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">';
                foreach($keys as $key){
                    $ukupnaCenaKorpe+=(int)($_SESSION['cart'][$key]['ukupnaCena']);
                    echo '
                    <div class="row menu-item py-3">
                        <div class="col-1">
                            <p><b>' . $_SESSION['cart'][$key]['kolicina'] . 'x</b></p>
                        </div>
                        <div class="col-6">
                            <p><b>' . $_SESSION['cart'][$key]['nazivProizvoda'] . '</b></p>
                            <p style="font-size: 0.8em"> ' . $_SESSION['cart'][$key]['vrstaProizvoda'] . '</p>';
                            if($_SESSION['cart'][$key]['velicina']!= 'undefined'){
                                echo '<p style="font-size: 0.8em">Veličina: ' . $_SESSION['cart'][$key]['velicina'] . '</p>';
                            }
                            if(!empty($_SESSION['cart'][$key]['dodaci'])){
                                echo '<p style="font-size: 0.8em">Dodaci: ' . $_SESSION['cart'][$key]['dodaci'] . '</p>';
                            }
                            echo '
                        </div>';
                        echo '
                        <div class="col-3">
                            <p>Cena: ' . $_SESSION['cart'][$key]['ukupnaCena'] . '</p>
                        </div>
                        <div class="col-2">
                            <button style="font-size:1em; padding:0;" class="btn delete-item-button float-end" onclick="getCartItems(' . $key . ')"><i class="fas fa-times"></i></button>
                        </div>
                    </div>';
                }
                echo '
                <div class="row pb-4 pt-3">
                    <div class="col-md-12">
                        <ul class="list-inline float-end">
                            <li class="list-inline-item"><p><b>Ukupna cena korpe:</b></p></li>
                            <li class="list-inline-item"><p id="ukupnaCenaKorpe"><b>' . $ukupnaCenaKorpe . ',00</b></p></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 my-3 text-center">
                        <p style="font-size: 1.2em"><b>Informacije za dostavu</b></p>
                    </div>
                </div>
                    <div id="error" class="container-fluid mb-2 danger-section" style="display: none">
                        <p class="float-start"><b>Niste uneli sve potrebne podatke</b></p>
                        <i class="fas fa-times-circle fa-2x float-end"></i>
                    </div>
                    <div class="mb-2">
                        <label for="imeIPrezime" class="form-label" style="font-size:0.9em">Ime i prezime*</label>
                        <input type="text" class="form-control form-control-sm" id="imeIPrezime" required>
                    </div>
                    <div class="mb-2">
                        <label style="font-size:0.9em" class="form-label" for="naselje">Naselje*</label>
                        <select class="form-select form-select-sm" id="naselje" onchange="calculateDeliveryPrice()">
                            <option selected value="Izaberi naselje">Izaberi naselje</option>
                            <option value="Vidikovac">Vidikovac</option>
                            <option value="Labudovo Brdo">Labudovo Brdo</option>
                            <option value="Petlovo Brdo">Petlovo Brdo</option>
                            <option value="Kneževac">Kneževac</option>
                            <option value="Rakovica">Rakovica</option>
                            <option value="Cerak">Cerak</option>
                            <option value="Bele Vode">Bele Vode</option>
                            <option value="Žarkovo">Žarkovo</option>
                            <option value="Skojevsko naselje">Skojevsko naselje</option>
                            <option value="Filmski Grad">Filmski Grad</option>
                            <option value="Čukarička Padina">Čukarička Padina</option>
                            <option value="Banovo Brdo">Banovo Brdo</option>
                            <option value="Miljakovac 1">Miljakovac 1</option>
                            <option value="Miljakovac 2">Miljakovac 2</option>
                            <option value="Kanarevo Brdo">Kanarevo Brdo</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="ulicaIBroj" class="form-label" style="font-size:0.9em">Ulica i broj*</label>
                        <input type="text" class="form-control form-control-sm" id="ulicaIBroj" required>
                    </div>
                    <div class="mb-2">
                        <label for="interfon" class="form-label" style="font-size:0.9em">Interfon</label>
                        <input type="text" class="form-control form-control-sm" id="interfon">
                    </div>
                    <div class="mb-2">
                        <label for="sprat" class="form-label" style="font-size:0.9em">Sprat</label>
                        <input type="text" class="form-control form-control-sm" id="sprat">
                    </div>
                    <div class="mb-2">
                        <label for="brojStana" class="form-label" style="font-size:0.9em">Broj stana</label>
                        <input type="text" class="form-control form-control-sm" id="brojStana">
                    </div>
                    <div class="mb-2">
                        <label for="brojTelefona" class="form-label" style="font-size:0.9em">Broj telefona*</label>
                        <input type="text" class="form-control form-control-sm" id="brojTelefona" required>
                    </div>
                    <div class="mb-2">
                        <label for="napomene" class="form-label" style="font-size:0.9em">Dodatne napomene</label>
                        <textarea rows="4" class="form-control form-control-sm" id="napomene"></textarea>
                    </div>
                    <div class="mb-2">
                        <p id="cenaDostave" style="font-weight: bold"></p>
                        <p id="ukupnoSaDostavom" style="font-weight: bold"></p>
                        <p id="dodatneInformacije" style="font-weight: bold; font-size: 0.9em"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izađi</button>
                    <button id="potvrdiButton" type="submit" class="btn btn-primary" disabled="true" onclick="orderSubmit()">Potvrdi narudžbinu</button>
                </div>';
 } else {
     echo '<div class="modal-header">
     <h5 class="modal-title" id="CartModalLabel">Korpa</h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>
 <div class="modal-body">
     Nema proizvoda u korpi.
 </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izađi</button>
 </div>';
 } 
 ?>