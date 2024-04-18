<?php
include("../../Includes/config.php");


// Print a message in the console
echo "<script>console.log('Reached dietician-assign.php');</script>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dieticianId = $_POST["selectedValue"];
    $rowId = $_POST["rowId"];

     
    $updateQuery = "UPDATE medical_report SET dietician_id = $dieticianId WHERE id = $rowId";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Dietician assigned successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
