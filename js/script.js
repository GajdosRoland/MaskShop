window.addEventListener('load', function() {
    document.getElementById('reg_form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkForm()) this.submit();
    });
});

var $ = function(id) {
    return document.getElementById(id);
};

var checkForm = function() {
    $('username_error').innerHTML = '';
    $('email_error').innerHTML = '';
    $('password_error').innerHTML = '';


    var isValid = true;

    if ($('username').value == '') {
        $('username_error').innerHTML = 'Töltse ki a felhasználó mezőt!';
        $('username').style.borderColor="red";
        isValid = false;
    }

    // https://www.w3resource.com/javascript/form/email-validation.php
    var rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!rex.test($('email').value)) {
        $('email_error').innerHTML = 'Nem megfelelő formátum!';
        $('email').style.borderColor="red";
        isValid = false;
    }
    if ($('email').value == '') {
        $('email_error').innerHTML = 'Töltse ki az email mezőt!';
        $('email').style.borderColor="red";
        isValid = false;
    }


    if($('password').value.trim().length<4||$('password').value.trim().length>15){
        $('password_error').innerHTML = 'A jelszó 4 és 15 közötti karakterhosszúságúnak kell lennie!';
        $('password').style.borderColor="red";
        isValid = false;
    }

    if ($('password').value == '') {
        $('password_error').innerHTML = 'Töltse ki a jelszó mezőt!';
        $('password').style.borderColor="red";
        isValid = false;
    }


    return isValid;
};