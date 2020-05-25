window.addEventListener('load', function() {
    document.getElementById('reg_form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (checkForm()) this.submit();
    });
});

var $ = function(id) {
    return document.getElementById(id);
}

var checkForm = function() {
    $('username_error').innerHTML = '';
    $('email_error').innerHTML = '';
    $('password_error').innerHTML = '';


    var isValid = true;

    if ($('username').value == '') {
        $('username_error').innerHTML = 'The name field is required';
        $('username').style.borderColor="red";
        isValid = false;
    }

    // https://www.w3resource.com/javascript/form/email-validation.php
    var rex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!rex.test($('email').value)) {
        $('email_error').innerHTML = 'incorrect format';
        $('email').style.borderColor="red";
        isValid = false;
    }
    if ($('email').value == '') {
        $('email_error').innerHTML = 'The email field is required';
        $('email').style.borderColor="red";
        isValid = false;
    }


    if($('password').value.trim().length<4||$('password').value.trim().length>15){
        $('password_error').innerHTML = 'password must be between 4 and 15';
        $('password').style.borderColor="red";
        isValid = false;
    }

    if ($('password').value == '') {
        $('password_error').innerHTML = 'The password field is required';
        $('password').style.borderColor="red";
        isValid = false;
    }


    return isValid;
};