window.onload = function () {
    document.getElementById("btnLogin").addEventListener("click", login);
}

function login(e) {
    e.preventDefault();

    var emailLogin = document.getElementById("tbEmail");
    var passwordLogin = document.getElementById("tbPassword");
    var token = document.getElementsByName("_token")[0];

    var validan = validacijaLogin(emailLogin, passwordLogin);

    if (validan) {
        $.ajax({
            url: "/doLogin",
            type: "POST",
            data: {
                send: "send",
                _token: token.value,
                email: emailLogin.value,
                pass: passwordLogin.value
            },
            success: function (data) {
                alert(data);
                window.location = "/";
            },
            error: function (data) {
                alert(data.responseText)
            }
        })
    } else {
        e.preventDefault();
    }
}

function validacijaLogin(emailLogin, passwordLogin) {

    var reEmailLogin = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    var rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/;
    var validan = true;

    if (!reEmailLogin.test(emailLogin.value)) {
        emailLogin.style.borderBottom = "3px solid red"
        validan = false;
    } else {
        emailLogin.style.borderBottom = "3px solid green"
    }
    if (!rePassword.test(passwordLogin.value)) {
        passwordLogin.style.borderBottom = "3px solid red"
        validan = false;
    } else {
        passwordLogin.style.borderBottom = "3px solid green"
    }

    return validan;
}
