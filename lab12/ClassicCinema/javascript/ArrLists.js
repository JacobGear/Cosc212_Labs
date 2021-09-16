let Carousel = (function () {
    let pub = {};
    let categoryList = [];
    let categoryIndex = 0;

    function nextCategory() {
        $("#arrImg").fadeIn(2000).fadeOut(2000);
        let element = document.getElementById("arrImg");
        element.innerHTML = categoryList[categoryIndex].makeHTML();
        categoryIndex += 1;
        if (categoryIndex >= categoryList.length) {
            categoryIndex = 0;
        }
    }

    function MovieCategory(title, image, page) {
        this.title = title;
        this.image = image;
        this.page = page;
        this.makeHTML = function () {
            return "<a href='" + this.page + "'><figure>" +
                "<img src='" + this.image + "'>" +
                "<figcaption>" + this.title + "</figcaption>" +
                "</figure></a>";
        };
    }

    pub.setup = function () {
        categoryList.push(new MovieCategory("Classic",
            "images/Metropolis.jpg", "classic.php"));
        categoryList.push(new MovieCategory("Science Fiction", "images/Plan_9_from_Outer_Space.jpg",
            "scifi.php"));
        categoryList.push(new MovieCategory("Alfred Hitchcock",
            "images/Vertigo.jpg", "hitchcock.php"));
        nextCategory();
        setInterval(nextCategory, 4000);
    }

    return pub;

}());

if (document.getElementById) {
    window.onload = Carousel.setup;
}

