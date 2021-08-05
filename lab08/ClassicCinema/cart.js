let Cart = (function(){
    let pub = {};

    function getCart(){
        let cart = window.sessionStorage.getItem("cart");
        if(cart != null){
            return JSON.parse(cart);
        } else {
            return null;
        }
    }

    function updateCookies(item){
        let cart = window.sessionStorage.getItem("cart");
        let cartObj = [];
        if(cart != null){
            cartObj = JSON.parse(cart);
            cartObj.push(item);
        } else {
            cartObj.push(item);
        }
        let cartStr = JSON.stringify(cartObj);
        window.sessionStorage.setItem("cart", cartStr);
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

    function clearCart(){
        window.sessionStorage.removeItem("cart");
        document.location.reload(true);
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

        let clear = document.getElementById("clearCart");
        clear.onclick = clearCart;
    }

    pub.showCheckout = function (){
        let id = document.getElementById("checkoutForm");
        let cart = getCart();
        if (cart === null){
            id.style.display = "none";
        }
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
    window.addEventListener("load", Cart.showCheckout);
} else if (window.attachEvent) {
    window.attachEvent("onload", Cart.setup);
} else {
    window.alert("Could not attach ’cart.setup’ to the ’window.onload’ event");
}