$(document).ready(function () {
    loadBlog();
    var blog;
    var pagNumber = 0;
    var katId = 0;

    function displayBlog() {
        var ispis = "";
        for (let b of blog) {
            ispis += writeBlog(b);
        }
        document.getElementById("blogLevo").innerHTML = ispis;
    }

    function writeBlog(b) {
        return `<div class="blog-img">
                        <h2 class="blogTitle">${b.name}</h2>
                        <img src="${b.image_src}" alt="${b.image_alt}"/>
                        <p class="blogDesc">${b.description}</p>
                    </div>`
    }

    function getPagination(katId, poljePretraga) {
        poljePretraga = document.getElementById("poljePretraga").value;
        $.ajax({
            url: "/paginationBlog?katId=" + katId + "&poljePretraga=" + poljePretraga,
            method: "GET",
            dataType: "json",
            success: function (data) {
                displayPagination(data);
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }

    function displayPagination(broj) {
        let paginacija = broj;
        let brojPoStrani = 3;
        let ukupno = Math.ceil(paginacija / brojPoStrani);

        var ispis = "";
        for (let i = 1; i <= ukupno; i++) {
            ispis += "<li><a class='blogPag' data-id='" + i + "'>" + i + "</a></li>";
        }
        document.getElementById("stilPaginacijaBlog").innerHTML = ispis;
    }

    document.getElementById("poljePretraga").addEventListener("keyup", getBlogs);
    $(document).on("click",".cat", function () {
        katId = this.dataset.id;
        getBlogs()
    })

    function getBlogs() {
        poljePretraga = document.getElementById("poljePretraga").value;
        $.ajax({
            url: "/blogToShow?katId=" + katId + "&poljePretraga=" + poljePretraga,
            method: "GET",
            dataType: "json",
            success: function (data) {
                blog = data;
                displayBlog();
                getPagination(katId, poljePretraga);
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }

    function loadBlog() {
        poljePretraga = document.getElementById("poljePretraga").value;
        $.ajax({
            url: "/blogToShow",
            method: "GET",
            dataType: "json",
            success: function (data) {
                blog = data;
                displayBlog();
                getPagination(katId, "");
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }

    $(document).on("click",".blogPag", function () {
        pagNumber = this.dataset.id - 1;
        console.log(pagNumber);
        getBlogsPaginate()
    })

    function getBlogsPaginate() {
        poljePretraga = document.getElementById("poljePretraga").value;
        $.ajax({
            url: "/blogToShow?katId=" + katId + "&page=" + pagNumber + "&poljePretraga=" + poljePretraga,
            method: "GET",
            dataType: "json",
            success: function (data) {
                blog = data;
                displayBlog();
                getPagination();
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }
})


