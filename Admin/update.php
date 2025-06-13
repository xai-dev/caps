<?php
if(isset($_GET['myid'])) {
    include 'conn.php';
    $id = $_GET['myid'];
    $sql = "DELETE FROM booked WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        echo "<script>alert('The order is done successfully');</script>";
        echo "<script>window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>