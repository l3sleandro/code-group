
document.addEventListener('DOMContentLoaded', function () {
    var inputPhone = document.getElementById('inputPhone');
    if (inputPhone) {
        IMask(inputPhone, {
            mask: '(00) 00000-0000',
            lazy: true
        });
    }

    var inputDate = document.getElementById('inputDate');
    if (inputDate) {
        IMask(inputDate, {
            mask: '00/00/0000',
            lazy: true
        });
    }

});