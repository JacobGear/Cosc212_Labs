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
        //let parent = this.parentNode.parentNode;
        let parent = $(this).parent().parent();
        //let price = parent.getElementsByClassName("price")[0].innerHTML;
        let price = $(parent).find(".price").html();
        //let title = parent.getElementsByTagName("h3")[0].innerHTML;
        let title = $(parent).children("h3").html();

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
        //let cartList = document.getElementById("cartList");
        let cartList = $("#cartList");
        let listString = "";

        if(cart === null){
            //cartList.innerHTML = "<p> No items in cart </p>";
            cartList.html("<p> No items in cart </p>");
        } else {
            for(let item of cart){
                //cartList.innerHTML += "<li>" + item.title + " " + "$" + item.price;
                listString += "<li>" + item.title + " " + "$" + item.price;
                cartList.html(listString);
            }
            //cartList.innerHTML += "</li>";
            listString += "</li>";
            cartList.html(listString);
        }

        //let totalHTML = document.getElementById("total");
        let totalHTML = $("#total");
        let total = 0.0;
        for(let item of cart){
            let p = parseFloat(item.price);
            total += p;
        }
        //totalHTML.innerHTML = "$" + total.toString();
        totalHTML.html("$" + total.toString());

        //let clear = document.getElementById("clearCart");
        $("#clearCart").click(clearCart)
    }

    pub.showCheckout = function (){
        //let id = document.getElementById("checkoutForm");
        let cart = getCart();
        if (cart === null){
            $("#checkoutForm").removeAttr("style").hide();
        }
    }

    pub.setup = function(){
        //let btnElement = document.getElementsByClassName("buy");
        $(".buy").click(addToCart);

    }

    return pub;
}());

/*
if (window.addEventListener) {
    window.addEventListener("load", Cart.setup);
    window.addEventListener("load", Cart.showCart);
    window.addEventListener("load", Cart.showCheckout);
} else if (window.attachEvent) {
    window.attachEvent("onload", Cart.setup);
} else {
    window.alert("Could not attach ’cart.setup’ to the ’window.onload’ event");
}*/
$(document).ready(Cart.setup);
$(document).ready(Cart.showCart);
$(document).ready(Cart.showCheckout);


