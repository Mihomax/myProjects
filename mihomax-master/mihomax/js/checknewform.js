function validate() {
    if (document.form.emailaddress.value == 0) {
        alert("Enter username");
    }

    else if (document.form.password.value == 0) {
        alert("enter Password");
    }
    else if (document.registration.repassword.value == 0) {
        alert("enter ConfirmPassword");
    }
    else {

        alert("Sucessfull Login");
    }
}