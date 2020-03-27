window.onload = function () {
    document.getElementById("btnUpdate").addEventListener("click", update);
}

function update(e) {
    e.preventDefault();

    var nameUpdate = document.getElementById("tbName");
    var lastNameUpdate = document.getElementById("tbLastName");
    var mailUpdate = document.getElementById("tbEmail");
    var passUpdate = document.getElementById("tbPass");
    var idUser = document.getElementsByName("idUser")[0];
    var token = document.getElementsByName("_token")[0];

    var validan = validacijaUpdate(nameUpdate, lastNameUpdate, mailUpdate, passUpdate);

    if (validan) {
        $.ajax({
            url: "/admin/doUpdate",
            type: "POST",
            data: {
                send: "send",
                _token: token.value,
                idUser: idUser.value,
                firstName: nameUpdate.value,
                lastName: lastNameUpdate.value,
                email: mailUpdate.value,
                password: passUpdate.value,
            },
            success: function (data) {
                alert(data);
                window.location = "/admin/tablesUsersAdmin";
            },
            error: function (data) {
                alert(data.responseText)
            }
        })
    } else {
        e.preventDefault();
    }
}

function validacijaUpdate(nameUpdate, lastNameUpdate, mailUpdate, passUpdate) {

    var reName = /^[A-Z][a-z]{1,11}$/;
    var reEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    var rePrezime = /^[A-Z][a-z]{1,11}$/;
    var rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/;
    var validan = true;

    if (!reName.test(nameUpdate.value)) {
        nameUpdate.style.borderBottom = "3px solid red";
        validan = false;
    } else {
        nameUpdate.style.borderBottom = "3px solid green";
    }

    if (!reEmail.test(mailUpdate.value)) {
        mailUpdate.style.borderBottom = "3px solid red";
        validan = false;
    } else {
        mailUpdate.style.borderBottom = "3px solid green";
    }

    if (!rePrezime.test(lastNameUpdate.value)) {
        lastNameUpdate.style.borderBottom = "3px solid red";
        validan = false;
    } else {
        lastNameUpdate.style.borderBottom = "3px solid green";
    }

    if (!rePassword.test(passUpdate.value)) {
        passUpdate.style.borderBottom = "3px solid red";
        validan = false;
    } else {
        passUpdate.style.borderBottom = "3px solid green";
    }

    return validan;
}
