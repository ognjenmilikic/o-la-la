<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="O la la je restoran brze hrane sa preko petnaest godina dugom tradicijom, dođite i uverite se zašto smo omiljeni među komšijama.">
    <meta name="keywords" content="o la la, olala, o la la vidikovac, o la la picerija, o la la palacinkarnica">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stil.css">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <title>Vidikovac - O la la</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BPEWY0K0D5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BPEWY0K0D5');
</script>
</head>

<body onload="chooseImage()">
    <div class="container-fluid section-1-wrapper">
        <div class="row">
            <div class="col-md-12 px-0">
                <a href="index.php"><img id="coverImage" width="100%" height="100%" src="images/logoVidikovac.webp" class="img-fluid mx-auto d-block"></a>
            </div>
        </div>
    </div>
    <div class="container-fluid section-2-wrapper">
        <div class="row">
            <div class="col-md-12 text-center py-5">
                <p class="h1">JELOVNIK</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 pb-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                DORUČAK
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    include 'php/databaseConnection.php';
                                    $upitDorucak = "select * from jelovnikvidikovac where VrstaProizvoda = 'DORUCAK'";
                                    $rez = $mysqli->query($upitDorucak);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                PICE
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row menu-item py-3">
                                    <div class="col-md-12">
                                    <p class="float-start"><b>VELIČINA</b></p>
                                    <p class="float-end"><b>20cm; 32cm</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitPizze = "select * from jelovnikvidikovac where VrstaProizvoda = 'PIZZE'";
                                    $rez = $mysqli->query($upitPizze);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start"><b>' . $red['NazivProizvoda'] . '</b></p>
                                                <p class="float-end"><b>' . $red['CenaMala'] . ',00; ' . $red['CenaSrednja'] . ',00</b></p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size:0.8em">' . $red['Sastojci'] . '</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="row menu-item py-3">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <p style="font-size:1.2em"><b>POSNE PICE</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitPosnePizze = "select * from jelovnikvidikovac where VrstaProizvoda = 'POSNE PIZZE'";
                                    $rez = $mysqli->query($upitPosnePizze);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start"><b>' . $red['NazivProizvoda'] . '</b></p>
                                                <p class="float-end"><b>' . $red['CenaMala'] . ',00; ' . $red['CenaSrednja'] . ',00</b></p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size:0.8em">' . $red['Sastojci'] . '</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="row menu-item py-3">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <p style="font-size:1.2em"><b>DODACI ZA PICU</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitDodaciZaPizze = "select * from jelovnikvidikovac where VrstaProizvoda = 'DODACI ZA PICU'";
                                    $rez = $mysqli->query($upitDodaciZaPizze);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end">' . $red['CenaMala'] . ',00; ' . $red['CenaSrednja'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                SLATKE PALAČINKE
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php
                                    $upitPalacinke = "select * from jelovnikvidikovac where VrstaProizvoda = 'SLATKE PALACINKE'";
                                    $rez = $mysqli->query($upitPalacinke);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="row menu-item py-3">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <p style="font-size:1.2em"><b>DODACI ZA SLATKU PALAČINKU</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitDodaciZaPalacinke = "select * from jelovnikvidikovac where VrstaProizvoda = 'DODACI ZA SLATKU PALACINKU'";
                                    $rez = $mysqli->query($upitDodaciZaPalacinke);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                SLANE PALAČINKE
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitSlanePalacinke = "select * from jelovnikvidikovac where VrstaProizvoda = 'SLANE PALACINKE'";
                                    $rez = $mysqli->query($upitSlanePalacinke);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="row menu-item py-3">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <p style="font-size:1.2em"><b>DODACI ZA SLANU PALAČINKU</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitDodaciZaSlanePalacinke = "select * from jelovnikvidikovac where VrstaProizvoda = 'DODACI ZA SLANU PALACINKU'";
                                    $rez = $mysqli->query($upitDodaciZaSlanePalacinke);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                PIROŠKE
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitPiroske = "select * from jelovnikvidikovac where VrstaProizvoda = 'PIROSKE'";
                                    $rez = $mysqli->query($upitPiroske);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                SENDVIČI
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitSendvici = "select * from jelovnikvidikovac where VrstaProizvoda = 'SENDVICI'";
                                    $rez = $mysqli->query($upitSendvici);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="row menu-item py-3">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <p style="font-size:1.2em"><b>POSNI SENDVIČI</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitPosniSendvici = "select * from jelovnikvidikovac where VrstaProizvoda = 'POSNI SENDVICI'";
                                    $rez = $mysqli->query($upitPosniSendvici);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                                <div class="row menu-item py-3">
                                    <div class="col-md-12 d-flex justify-content-center align-items-center">
                                        <p style="font-size:1.2em"><b>FREŠ SENDVIČI</b></p>
                                    </div>
                                </div>
                                <?php
                                    $upitFresSendvici = "select * from jelovnikvidikovac where VrstaProizvoda = 'FRES SENDVICI'";
                                    $rez = $mysqli->query($upitFresSendvici);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                PILETINA
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitPiletina = "select * from jelovnikvidikovac where VrstaProizvoda = 'PILETINA'";
                                    $rez = $mysqli->query($upitPiletina);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start"><b>' . $red['NazivProizvoda'] . '</b></p>
                                                <p class="float-end"><b>' . $red['Cena'] . ',00</b></p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size:0.8em">' . $red['Sastojci'] . '</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                SALATE
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitSalate = "select * from jelovnikvidikovac where VrstaProizvoda = 'SALATA'";
                                    $rez = $mysqli->query($upitSalate);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start"><b>' . $red['NazivProizvoda'] . '</b></p>
                                                <p class="float-end"><b>' . $red['Cena'] . ',00</b></p>
                                            </div>
                                            <div class="col-md-12">
                                                <p style="font-size:0.8em">' . $red['Sastojci'] . '</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                PIĆE
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitPice = "select * from jelovnikvidikovac where VrstaProizvoda = 'PICE'";
                                    $rez = $mysqli->query($upitPice);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                KAFE
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php
                                    $upitKafe = "select * from jelovnikvidikovac where VrstaProizvoda = 'KAFA'";
                                    $rez = $mysqli->query($upitKafe);
                                    while(($red = $rez->fetch_assoc())){
                                        echo '
                                        <div class="row menu-item py-3">
                                            <div class="col-md-12">
                                                <p class="float-start" style="font-size:0.9em">' . $red['NazivProizvoda'] . '</p>
                                                <p class="float-end" style="font-size:0.9em">' . $red['Cena'] . ',00</p>
                                            </div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid section-1-wrapper">
        <div class="row">
            <div class="col-md-12 px-0">
                <img class="img-fluid mx-auto d-block" src="images/prelaz-2.webp" width="100%" height="100%">
            </div>
        </div>
    </div>
    <?php include 'php/vidikovacInfo.php' ?>
    <img class="img-fluid mx-auto d-block" src="images/prelaz-3.webp" width="100%" height="100%">
    <?php include 'php/vratiSeNaPocetnu.php' ?>
    <?php include 'php/footer.php' ?>
    <?php $mysqli->close(); ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        function chooseImage() {
            if (screen.width > 768) {
                document.getElementById("coverImage").setAttribute("src", "images/logoVidikovacVeliki.webp");
            }
        }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>