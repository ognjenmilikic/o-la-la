<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="O la la je restoran brze hrane sa preko 15 godina dugom tradicijom koji se nalazi na dve lokacije u Beogradu, na Vidikovcu i Labudovom Brdu, uđite i pogledajte našu široku ponudu.">
    <meta name="keywords" content="o la la, olala, o la la vidikovac, o la la labudovo brdo, o la la picerija, o la la palacinkarnica">
    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stil.css">
	<link rel="icon" type="image/png" href="images/favicon.png"/>
    <title>Naslovna - O la la</title>
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
                <a href="index.php"><img class="img-fluid mx-auto d-block" id="coverImage" src="images/logo.webp" width="100%" height="100%" alt="coverImage"></a>
            </div>
        </div>
    </div>
    <div class="container-fluid section-2-wrapper py-5">
        <div class="row">
            <div class="col-md-4 text-center py-3">
                <a href="vidikovac.php" role="button" class="btn naruci-button p-5">NARUČI ZA PONETI U <i>O LA LA</i> VIDIKOVAC</a>
            </div>
            <div class="col-md-4 text-center py-3">
                <a href="labudovobrdo.php"><button class="btn naruci-button p-5">NARUČI ZA PONETI U <i>O LA LA</i> LABUDOVO BRDO</button></a>
            </div>
            <div class="col-md-4 text-center py-3">
                <a href="dostava.php"><button class="btn naruci-button p-5">NARUČI ZA DOSTAVU ONLINE</button></a>
            </div>
        </div>
    </div>
    <div class="container-fluid section-1-wrapper">
        <div class="row">
            <div class="col-md-12 px-0">
                <img class="img-fluid mx-auto d-block" src="images/prelaz-2.webp" width="100%" height="100%" alt="prelaz2">
            </div>
        </div>
    </div>
    <?php include 'php/vidikovacInfo.php' ?>
    <div class="container-fluid section-1-wrapper">
        <div class="row">
            <div class="col-md-12 px-0">
                <img class="img-fluid mx-auto d-block" src="images/prelaz-3.webp" width="100%" height="100%" alt="prelaz3">
            </div>
        </div>
    </div>
    <?php include 'php/labudovoInfo.php' ?>
    <?php include 'php/footer.php' ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function chooseImage(){
            if(screen.width > 768){
                document.getElementById("coverImage").setAttribute("src", "images/logoVeliki.webp");
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