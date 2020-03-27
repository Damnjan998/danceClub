window.onload = function () {
    document.getElementById("btnRegister").addEventListener("click", register);
}

function register(e) {
    e.preventDefault();

    var nameRegistracija = document.getElementById("tbName");
    var prezimeRegistracija = document.getElementById("tbLastName")
    var mailRegistracija = document.getElementById("tbEmail");
    var lozinkaRegistracija = document.getElementById("tbPassword");
    var confirmLozinkaRegistracija = document.getElementById("tbConfirmPassword");
    var token = document.getElementsByName("_token")[0];

    var validan = validacijaRegistracije(nameRegistracija, prezimeRegistracija, mailRegistracija, lozinkaRegistracija, confirmLozinkaRegistracija);

    if (validan) {
        $.ajax({
            url: "/doRegister",
            type: "POST",
            data: {
                send: "send",
                _token: token.value,
                firstName: nameRegistracija.value,
                lastName: prezimeRegistracija.value,
                email: mailRegistracija.value,
                password: lozinkaRegistracija.value,
                confirmPassword: confirmLozinkaRegistracija.value,
            },
            success: function (data) {
                alert(data);
                window.location = "/login";
            },
            error: function (data) {
                alert(data.responseText)
            }
        })
    } else {
        e.preventDefault();
    }

}

function validacijaRegistracije(nameRegistracija, prezimeRegistracija, mailRegistracija, lozinkaRegistracija, confirmLozinkaRegistracija) {

    var reName = /^[A-Z][a-z]{1,11}$/;
    var reEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    var rePrezime = /^[A-Z][a-z]{1,11}$/;
    var rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/;
    var validan = true;

    if (!reName.test(nameRegistracija.value)) {
        nameRegistracija.style.borderBottom = "3px solid red"
        document.getElementById("greskaName").style.visibility = "visible";
        validan = false;
    } else {
        nameRegistracija.style.borderBottom = "3px solid green"
    }

    if (!rePrezime.test(prezimeRegistracija.value)) {
        prezimeRegistracija.style.borderBottom = "3px solid red"
        document.getElementById("greskaPrezime").style.visibility = "visible";
        validan = false;
    } else {
        prezimeRegistracija.style.borderBottom = "3px solid green"
    }

    if (!reEmail.test(mailRegistracija.value)) {
        mailRegistracija.style.borderBottom = "3px solid red"
        document.getElementById("greskaMail").style.visibility = "visible";
        validan = false;
    } else {
        mailRegistracija.style.borderBottom = "3px solid green"
    }

    if (!rePassword.test(lozinkaRegistracija.value)) {
        lozinkaRegistracija.style.borderBottom = "3px solid red"
        document.getElementById("greskaSifra").style.visibility = "visible";
        validan = false;
    } else {
        lozinkaRegistracija.style.borderBottom = "3px solid green"
    }

    if (lozinkaRegistracija.value != confirmLozinkaRegistracija.value) {
        confirmLozinkaRegistracija.style.borderBottom = "3px solid red"
        document.getElementById("greskaSifra").style.visibility = "visible";
        validan = false;
    } else {
        confirmLozinkaRegistracija.style.borderBottom = "3px solid green"
    }

    return validan;
}
