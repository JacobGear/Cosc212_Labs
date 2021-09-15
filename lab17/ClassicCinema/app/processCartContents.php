<?php
$arr = json_decode(file_get_contents("php://input"));
echo "<table>";
echo "<th> Title: </th>";
foreach ($arr as $value){
    echo "<td>" . $value->title . "</td>";
}
echo "</table>";


