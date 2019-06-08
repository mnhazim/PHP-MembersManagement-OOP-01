<?php
	include "../config.php";
	session_start();
	$obj = new controlahli();

	class controlahli {
		public function __construct() {
			$conf = new config();
			$conn = $conf->open();

			if (isset($_GET['mod'])) {
				$action = mysqli_escape_string($conn, $_GET['mod']);
				switch ($action) {
					case 'daftar':
						$this->daftar($conn);
						break;

					case 'kemaskini':
						$this->kemaskini($conn);
						break;

					case 'kemaskinikatalaluan':
						$this->kemaskinikatalaluan($conn);
						break;

					case 'logout':
						$this->logout($conn);
						break;

					default:
						return header("Location: ../");
						break;
				}
			}
		}

		function logout($conn){
			session_destroy();
			header("Location: ../");
		}

		function kemaskinikatalaluan($conn){
			$katalaluan = mysqli_escape_string($conn, $_POST['katalaluan']);
			$id = mysqli_escape_string($conn, $_POST['idahli']);

			$password = '3sc3RLrpd17';
			$method = 'aes-256-cbc';
			$password = substr(hash('sha256', $password, true), 0, 32);
			$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
			$encrypted = base64_encode(openssl_encrypt($katalaluan, $method, $password, OPENSSL_RAW_DATA, $iv));

			$rsup = mysqli_query($conn, "UPDATE ahli SET ahli_pass='$encrypted' WHERE ahli_id = '$id'");
			if ($rsup) {
				echo "<script>window.alert('kata laluan telah berjaya dikemaskini')</script>";
				echo "<script>window.location = '../ahli/index.php'</script>";
			} else {
				echo "<script>window.alert('kata laluan tidah berjaya dikemaskini')</script>";
				echo "<script>window.location = '../ahli/index.php'</script>";
			}
		}

		function kemaskini($conn){
			$id = mysqli_escape_string($conn, $_POST['idahli']);
			$nama = mysqli_escape_string($conn, $_POST['nama']);
			$ic = mysqli_escape_string($conn, $_POST['ic']);
			$email = mysqli_escape_string($conn, $_POST['email']);

			$rsup = mysqli_query($conn, "UPDATE ahli SET ahli_nama='$nama', ahli_ic='$ic', ahli_email='$email' WHERE ahli_id = '$id'") or die ('<script type="text/javascript">alert("FATAL: email ini telah tersedia.");location.replace("../ahli/")</script>');
			if ($rsup) {
				echo "<script>window.alert('data ahli telah berjaya dikemaskini')</script>";
				echo "<script>window.location = '../ahli/index.php'</script>";
			} else {
				echo "<script>window.alert('data ahli tidah berjaya dikemaskini')</script>";
				echo "<script>window.location = '../ahli/index.php'</script>";
			}
		}

		public function getahli($id){
			$conf = new config();
			$conn = $conf->open();

			$rsreq = mysqli_query($conn, "SELECT * FROM ahli WHERE ahli_id = '$id'");
			return $rsreq;
		}

		function daftar($conn){
			$nama = mysqli_escape_string($conn, $_POST['nama']);
			$ic = mysqli_escape_string($conn, $_POST['ic']);
			$email = mysqli_escape_string($conn, $_POST['email']);
			$pass = mysqli_escape_string($conn, $_POST['password']);

			$password = '3sc3RLrpd17';
			$method = 'aes-256-cbc';
			$password = substr(hash('sha256', $password, true), 0, 32);
			$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
			$encrypted = base64_encode(openssl_encrypt($pass, $method, $password, OPENSSL_RAW_DATA, $iv));

			$rsdaftar = mysqli_query($conn, "INSERT INTO ahli (ahli_nama, ahli_ic, ahli_email, ahli_pass, ahli_tarikhdaftar) VALUES ('$nama', '$ic', '$email', '$encrypted', NOW())") or die ('<script type="text/javascript">alert("FATAL: email ini telah tersedia.");location.replace("../ahli/daftar.php")</script>');
			if ($rsdaftar) {
				echo "<script>window.alert('tambahan ahli telah berjaya. Sila Log masuk terlebih dahulu')</script>";
				echo "<script>window.location = '../index.php'</script>";
			} else {
				echo "<script>window.alert('tambahan ahli tidak berjaya. sila cuba lagi')</script>";
				echo "<script>window.location = '../daftar.php'</script>";
			}
		}
		

		
	}

?>