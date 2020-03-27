window.onload = function () {
    $(document).on("click",".del", function () {
        userId = this.dataset.id;
        deleteUser();
    })
}

function deleteUser() {
    var token = document.getElementsByName("_token")[0];
    $.ajax({
        url: "/admin/deleteUser/" + userId,
        method: "delete",
        dataType: "json",
        data: {
            _token: token.value
        },
        success: function (data) {
            alert(data);
            location.reload();
        },
        error: function (data) {
            alert(data.responseText);
        }
    })
}
