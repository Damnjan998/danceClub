window.onload = function () {
    $(document).on("click",".delMessage", function () {
        messageId = this.dataset.id;
        deleteMessage();
    })
}

function deleteMessage() {
    var token = document.getElementsByName("_token")[0];
    $.ajax({
        url: "/admin/deleteMessage/" + messageId,
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
