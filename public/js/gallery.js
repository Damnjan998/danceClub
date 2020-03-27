$(document).ready(function () {
    loadGallery();
    var page = 0;
    var gallery;
    var sort = 0
    document.getElementById("selectProductSort").addEventListener("change", getGallery);

    function getGallery() {
        ddlSort = document.getElementById("selectProductSort");
        sort = ddlSort.options[ddlSort.selectedIndex].value;

        $.ajax({
            url: "/sort?sortBy=" + sort + "&page=" + page,
            type: "GET",
            dataType: "json",
            success: function (data) {
                gallery = data;
                displayGallery();
                getPagination();
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }

    function displayGallery() {
        var ispis = "";
        for (let g of gallery) {
            ispis += writeGallery(g);
        }
        ispis += "<div class=\"clear\"></div>";
        document.getElementsByClassName("gallery-top")[0].innerHTML = ispis;
    }

    function writeGallery(g) {
        return `<div class="gallery-grid">
                            <h3 class="namePost">${g.name}</h3>
                            <div class="bottom-img">
                                <img class="velicinaSlike" src="${g.image_src}" alt="${g.image_alt}"/>
                            </div>
                        </div>`
    }

    function loadGallery() {
        $.ajax({
            url: "/sort",
            method: "GET",
            dataType: "json",
            success: function (data) {
                gallery = data;
                displayGallery();
                getPagination();
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }

    function getPagination() {
        $.ajax({
            url: "/paginationGallery",
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
        let brojPoStrani = 6;
        let ukupno = Math.ceil(paginacija / brojPoStrani);

        var ispis = "";
        for (let i = 1; i <= ukupno; i++) {
            ispis += "<li><a class='pag' data-id='" + i + "'>" + i + "</a></li>";
        }
        document.getElementById("stilPaginacija").innerHTML = ispis;
    }

    $(document).on("click",".pag", function () {
        page = this.dataset.id - 1;
        getGalleryPaginate()
    })

    function getGalleryPaginate() {
        $.ajax({
            url: "/sort?sortBy=" + sort + "&page=" + page,
            method: "GET",
            dataType: "json",
            success: function (data) {
                gallery = data;
                console.log(gallery);
                displayGallery();
                getPagination();
            },
            error: function (data) {
                alert(data.responseText);
            }
        })
    }
});
