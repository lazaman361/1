// MYURL, the same from config.php
var MYURL = 'http://localhost/php/';

// Add action attribute to form.
$('#registration_form').attr('action', MYURL + 'registration/register');

// Add href attribute to link.
$('#login_link').attr('href', MYURL + 'login');


// AJAX check and regular expressions on registration username input.
// Comment out the AJAX part if you don't want AJAX check.
$('#registrationUsername').keyup(function () {

    var pattern = /^[a-zA-Z0-9]+$/;
    var match = pattern.test(this.value); // or $(this).val()
    if (match){
        // $(this).next().html('');
        $.ajax({
            type: "POST",
            url: MYURL + "registration/ajaxCheck",
            data: {username: this.value}
        }).done(function (msg) {
            $('#registrationUsername').next().html(msg); // $(this) is now reffering to AJAX.
        });
    }else{
        $(this).next().html('Only alphanumeric characters are allowed!');
    }

});