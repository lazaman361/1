// Add action attribute to form.
$('#login_form').attr('action', MYURL + 'login/run');

// Redirect to registration when clicked.
$('#reg_button').click(function () {
    window.location = MYURL + 'registration';
});


// Regular expressions on login username input.
$('#loginUsername').on('keyup', function () {

    var pattern = /^[a-zA-Z0-9]+$/;
    var match = pattern.test(this.value); //#(this).val()
    if (match){
        $(this).next().html('');
    }else{
        $(this).next().html('Only alphanumeric characters are allowed!');
    }

});