<?php
include("../../Includes/config.php");

if(isset($_POST['location'])) {
    $location = $_POST['location'];

    $query = "SELECT * FROM `hospital` WHERE `Location` = '$location'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li style='color: red;'>{$row["name"]}</li>";
echo "<li style='color: red;'>{$row["place"]}</li>";
echo "<li style='color: red;'>{$row["Location"]}</li>";

        }
        echo "</ul>";
    } else {
        echo "No hospitals found in this location";
    }
}
?>
