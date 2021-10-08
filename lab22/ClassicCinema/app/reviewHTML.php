<?php
function addReviewForm($xmlFileName) {
    if (isset($_SESSION['authenticatedUser'])) {
        echo "<form action='app/addReview.php' method='POST'>";
        echo "<input type='hidden' name='xmlFileName' value='$xmlFileName'>";
        // Rest of the form goes in here
        echo "<label for='makeReview'>Add review:</label>";
        echo '<select name="makeReview">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </select>';
        echo '<input type="submit" value="submit review">';
        echo "</form><br>";
    }
}