window.addEventListener('load', function() {
    document.getElementById('form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkForm()) this.submit();
    });
});

var $ = function(id) {
    return document.getElementById(id);
};

var checkForm = function() {
    $('city_error').innerHTML = '';
    $('street_error').innerHTML = '';
    $('hsn_error').innerHTML = '';
    $('phone_error').innerHTML = '';
    $('email_error').innerHTML = '';

    var isValid = true;

    if ($('city').value == '') {
        $('city_error').innerHTML = 'Töltse ki a város mezőt!';
        $('city').style.borderColor="red";
        isValid = false;
    }

    if ($('street').value == '') {
        $('street_error').innerHTML = 'Töltse ki az utca mezőt!';
        $('street').style.borderColor="red";
        isValid = false;
    }

    if ($('house_number').value == '') {
        $('hsn_error').innerHTML = 'Töltse ki a házszám mezőt!';
        $('house_number').style.borderColor="red";
        isValid = false;
    }

    if ($('phone').value == '') {
        $('phone_error').innerHTML = 'Töltse ki a telefon mezőt!';
        $('phone').style.borderColor="red";
        isValid = false;
    }
    if($('phone').value.trim().length>10){
        $('phone_error').innerHTML = 'A telefon mező nem tartalmazhat 10 számnál többet!';
        $('phone').style.borderColor="red";
        isValid = false;
    }

    var rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!rex.test($('email').value)) {
        $('email_error').innerHTML = 'Nem megfelelő formátum!';
        isValid = false;
    }
    if ($('email').value == '') {
        $('email_error').innerHTML = 'Töltse ki az email mezőt!';
        $('email').style.borderColor="red";
        isValid = false;
    }

    return isValid;
};