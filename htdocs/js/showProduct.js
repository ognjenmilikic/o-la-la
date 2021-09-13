function showProduct(id){
    $.ajax({
        type: "post",
        url: 'php/getProductDetails.php',
        data: 'id=' + id,
        success: function(data){
            $('#modalContent').html(data);
        }
    })
}
function changePizzaSize(id){
    if($('#velicina20').is(':checked')) { 
        $.ajax({
            type: "post",
            url: 'php/malaPizzaCheckedChangeDodaci.php',
            success: function(data){
                $('#dodaci').hide().html(data).fadeIn();
            }
        })
        $.ajax({
            type: "post",
            url: 'php/malaPizzaCheckedChangeJedinicnaCena.php',
            data: 'id=' + id,
            success: function(data){
                $('#jedinicnaCena').attr("value", data);
            }
        })
    }
    if($('#velicina32').is(':checked')) { 
        $.ajax({
            type: "post",
            url: 'php/srednjaPizzaCheckedChangeDodaci.php',
            success: function(data){
                $('#dodaci').hide().html(data).fadeIn();
            }
        })
        $.ajax({
            type: "post",
            url: 'php/srednjaPizzaCheckedChangeJedinicnaCena.php',
            data: 'id=' + id,
            success: function(data){
                $('#jedinicnaCena').attr("value", data);
            }
        }) 
    }
    if($('#velicina40').is(':checked')) { 
        $.ajax({
            type: "post",
            url: 'php/velikaPizzaCheckedChangeDodaci.php',
            success: function(data){
                $('#dodaci').hide().html(data).fadeIn();
            }
        })
        $.ajax({
            type: "post",
            url: 'php/velikaPizzaCheckedChangeJedinicnaCena.php',
            data: 'id=' + id,
            success: function(data){
                $('#jedinicnaCena').attr("value", data);
            }
        })
    }
}
function calculateTotalPriceOnRadioChange(jedinicnaCena){
    var jedinicnaCenaInt = parseInt(jedinicnaCena);
    let kolicinaInt = parseInt($('#kolicina').val());
    let cenaDodataka = 0;
    let cenaDodatakaInt = parseInt(cenaDodataka);
    let ukupnaCena;
    var ukupnaCenaInt = parseInt(ukupnaCena);
    var dodaci = new Array();
    $("input:checkbox[name=dodaci]:checked").each(function(){
        dodaci.push($(this).val());
    });
    for(let i = 0; i<dodaci.length; i++){
        cenaDodatakaInt+=parseInt(dodaci[i]);
    }
    ukupnaCenaInt = jedinicnaCenaInt * kolicinaInt + cenaDodatakaInt * kolicinaInt;
    ukupnaCena = ukupnaCenaInt.toString();
    $('#ukupnaCena').hide().text(ukupnaCena + ',00').fadeIn();
}
function calculateTotalPrice(){
    let jedinicnaCena = $('#jedinicnaCena').attr("value");
    var jedinicnaCenaInt = parseInt(jedinicnaCena);
    let kolicina = $('#kolicina').val();
    var kolicinaInt = parseInt(kolicina);
    let cenaDodataka = 0;
    let cenaDodatakaInt = parseInt(cenaDodataka);
    let ukupnaCena;
    var ukupnaCenaInt = parseInt(ukupnaCena);
    var cenaDodatka;
    var dodaci = new Array();
    $("input:checkbox[name=dodaci]:checked").each(function(){
        dodaci.push($(this).val());
    });
    for(let i = 0; i<dodaci.length; i++){
        cenaDodatka = parseInt(dodaci[i]);
        cenaDodatakaInt+=cenaDodatka;
    }
    ukupnaCenaInt = jedinicnaCenaInt * kolicinaInt + cenaDodatakaInt * kolicinaInt;
    ukupnaCena = ukupnaCenaInt.toString();
    $('#ukupnaCena').hide().text(ukupnaCena + ',00').fadeIn(); 
}
function addToCart(){
    var id = $('#id').val();
    var nazivProizvoda = $('#nazivProizvoda').text();
    var vrstaProizvoda = $('#vrstaProizvoda').text();
    var sastojci = $('#sastojci').text();
    var jedinicnaCena = $('#jedinicnaCena').val();
    var dodaci = new Array();
    $("input:checkbox[name=dodaci]:checked").each(function(){
        dodaci+=($(this).attr('id') + ' ');
    });
    var ukupnaCena = $('#ukupnaCena').text();
    var kolicina = $('#kolicina').val();
    var velicina;
    $("input:radio[name=velicina]:checked").each(function(){
        velicina=($(this).attr('value'));
    });
    $.ajax({
        type: "post",
        url: 'php/addToCart.php',
        data: 'nazivProizvoda=' + nazivProizvoda + '&vrstaProizvoda=' + vrstaProizvoda + '&sastojci=' + sastojci + '&dodaci=' + dodaci + '&ukupnaCena=' + ukupnaCena + '&kolicina=' + kolicina + '&velicina=' + velicina,
        success: function(data){
            $('#modalContent').hide().html(data).fadeIn();
        }
    })
}