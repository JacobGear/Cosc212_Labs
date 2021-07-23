var imageList, imageIndex;

/* Questions about lab:
*   - Name is not under the picture anymore
*   - Missing alt attribute
* */

function nextImage() {
    if(imageIndex >= 3){
        imageIndex = 0;
    }
    let arrImg = document.getElementById("arrImg");
    arrImg.innerHTML = imageList[imageIndex].makeHTML();
    imageIndex += 1;
}

function setup() {
    imageList = [];
    imageList.push(new MovieCategory("Classic Films", "images/Metropolis.jpg", "classic.html"));
    imageList.push(new MovieCategory("Science Fiction & Horror","images/Plan_9_from_Outer_Space.jpg",
        "scifi.html"));
    imageList.push(new MovieCategory("Alfred Hitchcock","images/Vertigo.jpg", "hitchcock.html"));
    imageIndex = 0; // counter
    nextImage();
    setInterval(nextImage, 3000);
}

function MovieCategory(title, image, page) {
    this.title = title;
    this.image = image;
    this.page = page;
    this.makeHTML = function() {
        return "<a href= " + this.page + ">"
            + "<img src= " + this.image + ">"
            + this.title + "</a>";
    }
}

if (document.getElementById) {
    window.onload = setup;
}
