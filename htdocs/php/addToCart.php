<?php session_start();
    if(isset($_SESSION['cart'])){
        $num = count(array_keys($_SESSION['cart']));
        $newKey = $num + 1;
        $_SESSION['cart'][$newKey]['nazivProizvoda'] = $_POST['nazivProizvoda'];
        $_SESSION['cart'][$newKey]['vrstaProizvoda'] = $_POST['vrstaProizvoda'];
        $_SESSION['cart'][$newKey]['sastojci'] = $_POST['sastojci'];
        $_SESSION['cart'][$newKey]['kolicina'] = $_POST['kolicina'];
        $_SESSION['cart'][$newKey]['velicina'] = $_POST['velicina'];
        $_SESSION['cart'][$newKey]['dodaci'] = $_POST['dodaci'];
        $_SESSION['cart'][$newKey]['ukupnaCena'] = $_POST['ukupnaCena'];
    }
    else{
        $_SESSION['cart'][1]['nazivProizvoda'] = $_POST['nazivProizvoda'];
        $_SESSION['cart'][1]['vrstaProizvoda'] = $_POST['vrstaProizvoda'];
        $_SESSION['cart'][1]['sastojci'] = $_POST['sastojci'];
        $_SESSION['cart'][1]['kolicina'] = $_POST['kolicina'];
        $_SESSION['cart'][1]['velicina'] = $_POST['velicina'];
        $_SESSION['cart'][1]['dodaci'] = $_POST['dodaci'];
        $_SESSION['cart'][1]['ukupnaCena'] = $_POST['ukupnaCena'];
    }
    echo '<div class="modal-header">
    <h5 class="modal-title">Uspeh!</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
    <div class="text-center"><p>Uspešno ste dodali proizvod u korpu.</p></div>
    <div class="text-center"><i class="p-3 fas fa-check-square fa-10x"></i></div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Izađi</button>
  </div>';
?>