<!DOCTYPE html>

<html lang="en">


    <?php
    $scriptList = array('javascript/jquery-3.6.0-un.js', 'javascript/showHide.js',
        'javascript/ArrLists.js');

$currentPage = basename($_SERVER['PHP_SELF']);
include("app/header.php");
?>



        <main>
            <p>
                Welcome to Classic Cinema, your online store for classic film.
            </p>

            <div id="arrImg"></div>

        </main>

<?php require ("app/footer.php"); ?>

    </body>
</html>