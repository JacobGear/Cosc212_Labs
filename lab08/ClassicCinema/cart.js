/*global Cookie*/
let Cart = (function(){
    let pub = {};

    function getCart(){
        let cart = Cookie.get("cart");
        if(cart != null){
            return JSON.parse(cart);
        } else {
            return null;
        }
    }

    function updateCookies(item){
        let cart = Cookie.get("cart");
        let cartObj = [];
        if(cart != null){
            cartObj = JSON.parse(cart);
            cartObj.push(item);
        } else {
            cartObj.push(item);
        }
        let cartStr = JSON.stringify(cartObj);
        Cookie.set("cart", cartStr, 1);
    }

    function addToCart(){
        let parent = this.parentNode.parentNode; //why double parent?
        let price = parent.getElementsByClassName("price")[0].innerHTML;
        let title = parent.getElementsByTagName("h3")[0].innerHTML;
        let item = {};
        item.price = price;
        item.title = title;
        updateCookies(item);
    }

    pub.showCart = function () {
        let cart = getCart();
        let cartList = document.getElementById("cartList");

        if(cart == null){
            cartList.innerHTML = "<p> No items in cart </p>";
        } else {
            for(let item of cart){
                cartList.innerHTML += "<li>" + item.title + " " + "$" + item.price;
            }
            cartList.innerHTML += "</li>";
        }

        let totalHTML = document.getElementById("total");
        let total = 0.0;
        for(let item of cart){
            let p = parseFloat(item.price);
            total += p;
        }
        totalHTML.innerHTML = "$" + total.toString();

    }

    pub.setup = function(){
        let btnElement = document.getElementsByClassName("buy");
        for(let btn of btnElement){
            btn.onclick = addToCart;
        }
    }

    return pub;
}());

if (window.addEventListener) {
    window.addEventListener("load", Cart.setup);
    window.addEventListener("load", Cart.showCart);
} else if (window.attachEvent) {
    window.attachEvent("onload", Cart.setup);
} else {
    window.alert("Could not attach ’cart.setup’ to the ’window.onload’ event");
}