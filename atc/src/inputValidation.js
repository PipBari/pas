function isNumber(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;

    if (charCode == 8 || charCode == 46) {
        return true;
    }

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }

    return true;
}
