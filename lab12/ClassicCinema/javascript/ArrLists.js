let Carousel = (function () {
    let pub = {};
    let categoryList = [];
    let categoryIndex = 0;

    function nextCategory() {
        $("#arrImg").html(categoryList[categoryIndex].makeHTML())//.fadeIn(2000).fadeOut(2000);
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

    function moveLR(move, fSize){
        let t = 1000;
        let right = 400;
        let left = 0.5;
        let x = parseInt($("#arrImg").css("paddingLeft"), 10);
        let to = x/right

        let movedX = x+move;

        if (movedX <= left) {
            let p = Math.abs(x / movedX);
            movedX = left;
            t = p * t;
        }
        if (movedX >= right) {
            let p = Math.abs((right - x) / movedX);
            movedX = right;
            t = p * t;
        }
        if (movedX <= left) {
            move = Math.abs(move);
        }
        if (movedX >= right) {
            move = -Math.abs(move);
        }
        if(fSize >= 25){
            fSize-=10;
        } else if(fSize <= 25){
            fSize+=10;
        }

        $("#arrImg").animate(
            {
                paddingLeft: movedX + "px",
                fontSize: fSize,
                opacity: to,
                letterSpacing: to
            },
            t, "linear", function () {
                moveLR(move, fSize);
            });

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
        moveLR(100, 10);
    }

    return pub;

}());

if (document.getElementById) {
    window.onload = Carousel.setup;
}

