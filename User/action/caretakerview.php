<?php
include("../../Includes/config.php");

$selectedOption = $_POST['selection'];
$data = array();


if ($selectedOption == 'all') {
    $sql = "SELECT * FROM `caretaker`";
} elseif ($selectedOption == 'homenurse') {
    $sql = "SELECT * FROM `caretaker` WHERE type = 'homenurse'";
} elseif ($selectedOption == 'babysitter') {
    $sql = "SELECT * FROM `caretaker` WHERE type = 'babysitter'";
}


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data and store in the $data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data[] = array('message' => 'No results found');
}


$conn->close();


echo json_encode($data);
?>
