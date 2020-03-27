window.onload = function () {
    $(document).on("click",".delPost", function () {
        postId = this.dataset.id;
        deletePost();
    })

    $(document).on("click",".delBlog", function () {
        blogId = this.dataset.id;
        deleteBlog();
    })

    $(document).on("click",".delCat", function () {
        catId = this.dataset.id;
        deleteCategory();
    })
}

function deletePost() {
    var token = document.getElementsByName("_token")[0];
    $.ajax({
        url: "/admin/deletePost/" + postId,
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

function deleteBlog() {
    var token = document.getElementsByName("_token")[0];
    $.ajax({
        url: "/admin/deleteBlog/" + blogId,
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

function deleteCategory() {
    var token = document.getElementsByName("_token")[0];
    $.ajax({
        url: "/admin/deleteCategory/" + catId,
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
