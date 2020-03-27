window.onload = function () {
    document.getElementById("btnSend").addEventListener("click", sendMessage);
}

    function sendMessage(e) {
        e.preventDefault();
        var poljeTitle = document.getElementById("tbTitle");
        var poljeSubject = document.getElementById("tbSubject");
        var poljeIme = document.getElementById("tbNameContact")
        var token = document.getElementsByName("_token")[0];

        var validan = validateContact(poljeTitle, poljeSubject, poljeIme);

        if(validan) {
            $.ajax({
                url: "/insertContactMessage",
                type: "POST",
                data: {
                    send: "send",
                    _token: token.value,
                    title: poljeTitle.value,
                    subject: poljeSubject.value,
                    name: poljeIme.value
                },
                success: function (data) {
                    alert(data);
                    window.location = "/";
                },
                error: function (data) {
                    alert(data.responseText);
                }
            })
        } else {
            e.preventDefault();
        }
    }

    function validateContact(poljeTitle, poljeSubject, poljeIme) {

        var rePoljeTitle = /\w*[a-zA-Z]\w*/;

        var validan = true;

        if (!rePoljeTitle.test(poljeIme.value)) {
            poljeIme.style.borderBottom = "3px solid red"
            document.getElementById("greskaSubject").style.visibility = "visible";
            validan = false;
        } else {
            poljeIme.style.borderBottom = "3px solid green";
        }

        if (!rePoljeTitle.test(poljeTitle.value)) {
            poljeTitle.style.borderBottom = "3px solid red"
            document.getElementById("greskaSubject").style.visibility = "visible";
            validan = false;
        } else {
            poljeTitle.style.borderBottom = "3px solid green";
        }

        if (poljeSubject.value === "" || poljeSubject.value == null) {
            poljeSubject.style.borderBottom = "3px solid red"
            document.getElementById("greskaMessage").style.visibility = "visible";
            validan = false;
        } else {
            poljeSubject.style.borderBottom = "3px solid green"
        }

        return validan;
}
