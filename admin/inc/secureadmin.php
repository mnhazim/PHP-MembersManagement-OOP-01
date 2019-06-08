<?php

if (!isset($_SESSION['admin_id'])) {
	session_destroy();
	echo "<script>window.alert('Sila Log Masuk terlebih dahulu')</script>";
	echo "<script>window.location = '../'</script>";
}

$pengurusid = $_SESSION['admin_id'];
$getpengurus = "SELECT pengurus_nama FROM pengurus WHERE pengurus_id = '$pengurusid'";
$result = mysqli_query($conn, $getpengurus) or die (mysqli_error($conn));
$rowpengurussecure = mysqli_fetch_array($result);

?>