<?php
    session_start();
    $to = "dostava@o-la-la.rs";
    $from = "dostava@o-la-la.rs";
    $subject = "Nova narudzbina " . $_POST['imeIPrezime'];
    $headers = "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers.= "From: " . $from;
    $msg = "<html>";
    $msg.= "<head>";
    $msg.= "<title>Mail</title>";
    $msg.= "<meta charset=\"utf-8\"";
    $msg.= "</head>";
    $msg.= '<body style="font-family: arial">';
    $msg.= "<div style='background-color: #edfff6; padding: 20px; color: #092215'>";
    $msg.= "<h3 style='text-align: center'>Nova narudžbina</h3>";
    $msg.= '<p style="text-align: center; margin-bottom: 5px">Ime i prezime: ' . $_POST['imeIPrezime'] . '</p>';
    $msg.= '<p style="text-align: center; margin-bottom: 5px; margin-top: 0;">Naselje: ' . $_POST['naselje'] . '</p>';
    $msg.= '<p style="text-align: center; margin-bottom: 5px; margin-top: 0;">Ulica i broj: ' . $_POST['ulicaIBroj'] . '</p>';
    if(!empty($_POST['interfon'])){
      $msg.= '<p style="text-align: center; margin-bottom: 5px; margin-top: 0;">Interfon: ' . $_POST['interfon'] . '</p>';
    }
    if(!empty($_POST['sprat'])){
      $msg.= '<p style="text-align: center; margin-bottom: 5px; margin-top: 0;">Sprat: ' . $_POST['sprat'] . '</p>';
    }
    if(!empty($_POST['brojStana'])){
      $msg.= '<p style="text-align: center; margin-bottom: 5px; margin-top: 0;">Broj stana: ' . $_POST['brojStana'] . '</p>';
    }
    $msg.= '<p style="text-align: center; margin-top: 0;">Broj telefona: ' . $_POST['brojTelefona'] . '</p>';
    $msg.= '<h3 style="text-align: center">Detalji narudžbine</h3>';
    $msg.= '<table style="border-collapse: collapse; margin:auto;">';
    $keys = array_keys($_SESSION['cart']);
    foreach($keys as $key){
        $msg.= '<tr style="border-bottom: 1px solid #092215;">';
        $msg.= '<td style="padding: 10px">' . $_SESSION['cart'][$key]['kolicina'] . 'X</td>';
        $msg.= '<td style="padding: 10px">';
        $msg.= '<p style="margin:0"><b>' . $_SESSION['cart'][$key]['nazivProizvoda'] . '</b>';
        if($_SESSION['cart'][$key]['velicina']!='undefined'){
          $msg.= ' ' . $_SESSION['cart'][$key]['velicina'];
        }
        $msg.= '</p>';
        $msg.= '<p style="font-size: 0.7em; margin: 0">' . $_SESSION['cart'][$key]['vrstaProizvoda'] . '</p>';
        if(!empty($_SESSION['cart'][$key]['dodaci'])){
          $msg.= '<p style="font-size: 0.8em; margin:0;">Dodaci: ' . $_SESSION['cart'][$key]['dodaci'] . '</p>';
        }
        $msg.= '</td>';
        $msg.= '<td style="padding: 10px">' . $_SESSION['cart'][$key]['ukupnaCena'] . '</td>';
        $msg.= '</tr>';
    }
    $msg.= '</table>';
    $msg.= '<p style="text-align: center; margin-top: 10px; margin-bottom: 5px">Ukupna cena narudžbine: '. $_POST['ukupnaCenaKorpe'] . '</p>';
    $msg.= '<p style="text-align: center; margin-top: 0px; margin-bottom: 5px">' . $_POST['cenaDostave'] . '</p>';
    $msg.= '<p style="text-align: center; margin-top: 0px; margin-bottom: 5px">' . $_POST['ukupnoSaDostavom'] . '</p>';
    if(!empty($_POST['napomene'])){
    $msg.= '<p style="text-align: center; margin-top: 0px; margin-bottom: 5px">Dodatne napomene: ' . $_POST['napomene'] . '</p>';
    }
    $msg.= '<h3 style="text-align: center;"><b>Vreme narudžbine: ' . date('H:i') . '</b></h3>';
    $hour = date('H') + 1;
    $minute = date('i');
    $ocekivanoVremeDostave = $hour . ":" . $minute;
    $msg.= '<h3 style="text-align: center;"><b>Očekivano vreme dostave: ' . $ocekivanoVremeDostave . '</b></h3>';
    $msg.= "</div>";
    $msg.= "</body>";
    $msg.= "</html>";
    if(mail($to, $subject, $msg, $headers)){
        echo '<div class="modal-header">
    <h5 class="modal-title">Uspeh!</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
    <div class="text-center"><p>Vaša narudžbina je primljena. Dostavu možete očekivati za oko 60 minuta.</p></div>
    <div class="text-center"><i class="p-3 fas fa-check-square fa-10x"></i></div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izađi</button>
  </div>';
  session_unset();
    }
    else{
        echo '<div class="modal-header danger-section" style="border-radius: 0;">
    <h5 class="modal-title">Greška!</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body danger-section" style="border-radius: 0;">
    <div class="text-center"><p>Nažalost došlo je do greške i vaša porudžbina nije prošla. Molimo Vas pokušajte kasnije.</p></div>
    <div class="text-center"><i class="fas fa-times-circle fa-10x"></i></div>
  </div>
  <div class="modal-footer danger-section" style="border-radius: 0;">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izađi</button>
  </div>';
    }
?>
