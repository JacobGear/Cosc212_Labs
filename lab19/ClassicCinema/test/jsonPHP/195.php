<?php
$input_filename = "map-data.json";
$output_filename = "map-data-updated.json";
$json_input = file_get_contents($input_filename);
$json = json_decode($json_input,true);
$json["features"][1]["properties"]["description"] = "HCI Lab";
$json["features"][2]["type"] = "Feature";
$json["features"][2]["properties"]["description"] = "Owheo building";
$json["features"][2]["geometry"]["type"] = "Point";
$json["features"][2]["geometry"]["coordinates"] = [170.518204, -45.866727];
$json["features"][2]["id"] = 3;
$json_output = json_encode($json,JSON_PRETTY_PRINT)."\n";
file_put_contents($output_filename,$json_output);
echo "<pre>"; echo print_r($json_output); echo "</pre>";

// Task 19.5
echo "<table>";
echo "<tr>
    <th>Description</th>
    <th>Longitude</th>
    <th>Latitude</th>
  </tr>";
$featureLength = sizeof($json["features"]);
for($i=0; $i<$featureLength; $i++) {
    $description = $json["features"][$i]["properties"]["description"];
    $longitude = $json["features"][$i]["geometry"]["coordinates"][0];
    $latitude = $json["features"][$i]["geometry"]["coordinates"][1];
    echo "<tr>";
    echo "<td>$description</td>";
    echo "<td>$longitude</td>";
    echo "<td>$latitude</td>";
    echo "</tr>";
}
echo "</table>";

