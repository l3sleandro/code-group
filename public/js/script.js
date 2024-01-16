
document.addEventListener('DOMContentLoaded', function () {
    var phoneInput = document.getElementById('inputPhone');
    if (phoneInput) {
        var phoneMask = IMask(phoneInput, {
            mask: '(00) 00000-0000',
            lazy: true
        });
    }
});