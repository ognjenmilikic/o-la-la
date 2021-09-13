function getCartItems(mod){
    $.ajax({
        type: "post",
        url: 'php/getCartItems.php',
        data: 'mod=' + mod,
        success: function(data){
            $('#cartModalContent').hide().html(data).fadeIn();
        }
    })
}
function calculateDeliveryPrice(){
    var naselje = $('#naselje').val();
    var ukupnaCenaKorpe = parseInt($('#ukupnaCenaKorpe').text());
    var ukupnoSaDostavom = 0;
    if(naselje == 'Izaberi naselje'){
        $('#cenaDostave').fadeOut();
        $('#ukupnoSaDostavom').fadeOut();
        $('#dodatneInformacije').fadeOut();
        $('#potvrdiButton').hide().attr('disabled', true).fadeIn();
    }
    else if(ukupnaCenaKorpe < 500){
        $('#cenaDostave').hide().text('Dostava nije moguća za porudžbine manje od 500,00RSD').fadeIn();
        $('#ukupnoSaDostavom').fadeOut();
        $('#dodatneInformacije').fadeOut();
        $('#potvrdiButton').hide().attr('disabled', true).fadeIn();
    }
    else if((ukupnaCenaKorpe < 700) && (naselje == "Miljakovac 1" || naselje == "Miljakovac 2" || naselje == "Kanarevo Brdo" || naselje == "Čukarička Padina" || naselje == "Banovo Brdo")){
        $('#cenaDostave').hide().text('Dostava u vašem naselju nije moguća za porudžbine manje od 700,00RSD').fadeIn();
        $('#ukupnoSaDostavom').fadeOut();
        $('#dodatneInformacije').fadeOut();
        $('#potvrdiButton').hide().attr('disabled', true).fadeIn();
    }
    else if(ukupnaCenaKorpe >= 1000){
        $('#cenaDostave').hide().text('Cena dostave: 0,00').fadeIn();
        $('#ukupnoSaDostavom').hide().text('Ukupna cena sa dostavom: ' + ukupnaCenaKorpe.toString() + ',00').fadeIn();
        $('#dodatneInformacije').fadeOut();
        $('#potvrdiButton').hide().attr('disabled', false).fadeIn();
    }
    else{
        $('#cenaDostave').hide().text('Cena dostave: 150,00').fadeIn();
        ukupnoSaDostavom = ukupnaCenaKorpe + 150;
        $('#ukupnoSaDostavom').hide().text('Ukupna cena sa dostavom: ' + ukupnoSaDostavom.toString() + ',00').fadeIn();
        $('#dodatneInformacije').hide().text('*Za narudžbine preko 1000 dinara dostava je besplatna.').fadeIn();
        $('#potvrdiButton').hide().attr('disabled', false).fadeIn();
    }
}
function orderSubmit(){
    var imeIPrezime = $('#imeIPrezime').val();
    var ulicaIBroj = $('#ulicaIBroj').val();
    var naselje = $('#naselje').val();
    var interfon = $('#interfon').val();
    var sprat = $('#sprat').val();
    var brojStana = $('#brojStana').val();
    var brojTelefona = $('#brojTelefona').val();
    var napomene = $('#napomene').val();
    var ukupnaCenaKorpe = $('#ukupnaCenaKorpe').text();
    var cenaDostave = $('#cenaDostave').text();
    var ukupnoSaDostavom = $('#ukupnoSaDostavom').text();

    if(imeIPrezime == '' || ulicaIBroj == '' || brojTelefona == ''){
        $('#error').fadeIn().css('display', 'inline-block');
    }
    else{
        $.ajax({
            type: "post",
            url: 'php/obradaNarudzbine.php',
            data: 'imeIPrezime=' + imeIPrezime + '&ulicaIBroj=' + ulicaIBroj + '&brojTelefona=' +brojTelefona + '&napomene=' +napomene + '&ukupnaCenaKorpe=' + ukupnaCenaKorpe + '&naselje=' + naselje + '&cenaDostave=' + cenaDostave + '&ukupnoSaDostavom=' + ukupnoSaDostavom + '&interfon=' + interfon + '&sprat=' +sprat + '&brojStana=' + brojStana,
            success: function(data){
                $('#cartModalContent').hide().html(data).fadeIn();
            }
        })
    }
}