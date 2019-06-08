<?php

if (!isset($_SESSION['ahli_id'])) {
	session_destroy();
	echo "<script>window.alert('Sila Log Masuk terlebih dahulu')</script>";
	echo "<script>window.location = '../'</script>";
}

$ahliid = $_SESSION['ahli_id'];
$getuser = "SELECT ahli_nama FROM ahli WHERE ahli_id = '$ahliid'";
$result = mysqli_query($conn, $getuser) or die (mysqli_error($conn));
$rowahlisecure = mysqli_fetch_array($result);

?>