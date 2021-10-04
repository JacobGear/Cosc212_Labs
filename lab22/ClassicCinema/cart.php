<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <?php
    $scriptList = array('javascript/jquery-3.6.0-un.js', 'javascript/cart.js', 'javascript/sampleValidator.js');
        include("app/includeScripts.php");
    ?>

</head>


<body>

<?php
$currentPage = basename($_SERVER['PHP_SELF']);
include("app/header.php");
?>


<main>
    <h2>Cart:</h2>

    <ul id="cartList"></ul>

    <h2>Total:</h2>
    <p id="total"></p>
    <input type="button" value="Clear Cart" id="clearCart">

    <br><br>
    <form id="checkoutForm" action="app/validateCheckout.php" method="post" novalidate>
        <fieldset>
            <!-- First section of form is delivery address etc. -->
            <legend>Delivery Details:</legend>
            <p>
                <label for="deliveryName">Deliver to:</label>
                <input type="text" name="deliveryName" id="deliveryName" required=""
                    <?php
                    if (isset($_SESSION['deliveryName'])) {
                        $name = $_SESSION['deliveryName'];
                        echo "value='$name'";
                    }
                    ?>
                >
            </p>
            <p>
                <label for="deliveryEmail">Email:</label>
                <input type="email" name="deliveryEmail" id="deliveryEmail"
                    <?php
                    if (isset($_SESSION['deliveryEmail'])) {
                        $name = $_SESSION['deliveryEmail'];
                        echo "value='$name'";
                    }
                    ?>
                >
            </p>
            <p>
                <label for="deliveryAddress1">Address:</label>
                <input type="text" name="deliveryAddress1" id="deliveryAddress1" required=""
                    <?php
                    if (isset($_SESSION['deliveryAddress1'])) {
                        $name = $_SESSION['deliveryAddress1'];
                        echo "value='$name'";
                    }
                    ?>
                >
            </p>
            <p>
                <label for="deliveryAddress2"></label>
                <input type="text" name="deliveryAddress2" id="deliveryAddress2">
            </p>
            <p>
                <label for="deliveryCity">City:</label>
                <input type="text" name="deliveryCity" id="deliveryCity" required=""
                    <?php
                    if (isset($_SESSION['deliveryCity'])) {
                        $name = $_SESSION['deliveryCity'];
                        echo "value='$name'";
                    }
                    ?>
                >
            </p>
            <p>
                <label for="deliveryPostcode">Postcode:</label>
                <input type="text" name="deliveryPostcode" id="deliveryPostcode" maxlength="4" required="" class="short"
                    <?php
                    if (isset($_SESSION['deliveryPostcode'])) {
                        $name = $_SESSION['deliveryPostcode'];
                        echo "value='$name'";
                    }
                    ?>
                >
            </p>
        </fieldset>

        <!-- Next section has credit card details -->
        <fieldset>
            <legend>Payment Details:</legend>
            <p>
                <label for="cardType">Card type:</label>
                <select name="cardType" id="cardType">
                    <option value="amex">American Express</option>
                    <option value="mcard">Master Card</option>
                    <option value="visa">Visa</option>
                </select>
            </p>
            <p>
                <label for="cardNumber">Card number:</label>
                <input type="text" name="cardNumber" id="cardNumber" maxlength="16" required="">
            </p>
            <p>
                <label for="cardMonth">Expiry date:</label>
                <select name="cardMonth" id="cardMonth">
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select> / <select name="cardYear" id="cardYear">
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
            </p>
            <p>
                <label for="cardValidation">CVC:</label>
                <input type="text" class="short" maxlength="4" name="cardValidation" id="cardValidation" required="">
            </p>
        </fieldset>
        <input type="submit">
    </form>

    <div>
        <ul id="errorMessage"></ul>
    </div>
</main>


<?php require ("app/footer.php"); ?>

</body>
</html>