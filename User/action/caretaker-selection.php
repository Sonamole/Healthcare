<?php

include("../../Includes/config.php");
include("../../Includes/session.php");

$user_id=$Uid;

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $query="UPDATE `login` SET `caretaker_id`='$id' WHERE `id`='$Uid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "ID stored successfully";
    } else {
        echo "Error storing ID";
    }
} else {
    echo "ID parameter not found";
}
?>
