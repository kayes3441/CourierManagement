'use strict'

$(".show-hide-password").on("click",function (){
    let passwordField = $("#password");

    if (passwordField.attr('type') === 'password') {
        passwordField.attr('type', 'text');
        $('.show-hide-text').text('Hide Password');
    } else {
        passwordField.attr('type', 'password');
        $('.show-hide-text').text('Show Password');
    }
});

$('.copy-credentials').on('click', function (){
    const email = 'admin@admin.com'
    const password = '12345678'
    $('input[name=email]').val(email);
    $('input[name=password]').val(password);
});
