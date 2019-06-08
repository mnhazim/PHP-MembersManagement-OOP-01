<?php
	include "../config.php";
	session_start();
	$obj = new control();

	class control {
		public function __construct() {
			$conf = new config();
			$conn = $conf->open();

			if (isset($_GET['mod'])) {
				$action = mysqli_escape_string($conn, $_GET['mod']);
				switch ($action) {
					case 'login':
						$this->login($conn);
						break;

					case 'tambah':
						$this->tambah($conn);
						break;

					case 'hapus':
						$this->hapus($conn);
						break;

					case 'rstpass':
						$this->rstpass($conn);
						break;

					case 'kemaskini':
						$this->kemaskini($conn);
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
			echo "<script>window.location = '../'</script>";
		}

		function kemaskini($conn){
			$id = mysqli_escape_string($conn, $_POST['idahli']);
			$nama = mysqli_escape_string($conn, $_POST['nama']);
			$ic = mysqli_escape_string($conn, $_POST['ic']);
			$email = mysqli_escape_string($conn, $_POST['email']);

			$rsup = mysqli_query($conn, "UPDATE ahli SET ahli_nama='$nama', ahli_ic='$ic', ahli_email='$email' WHERE ahli_id = '$id'") or die ('<script type="text/javascript">alert("FATAL: email ini telah tersedia.");location.replace("../admin/")</script>');
			if ($rsup) {
				echo "<script>window.alert('data ahli telah berjaya dikemaskini')</script>";
				echo "<script>window.location = '../admin/index.php'</script>";
			} else {
				echo "<script>window.alert('data ahli tidah berjaya dikemaskini')</script>";
				echo "<script>window.location = '../admin/index.php'</script>";
			}
		}

		function rstpass($conn){
			$id = mysqli_escape_string($conn, $_POST['idahli']);

			$getahli = mysqli_query($conn, "SELECT ahli_ic FROM ahli WHERE ahli_id = '$id'") or die (mysqli_error($conn));
			if ($getahli) {
				$rowgetahli = mysqli_fetch_array($getahli);
				$oldpass = $rowgetahli['ahli_ic'];

				$password = '3sc3RLrpd17';
				$method = 'aes-256-cbc';
				$password = substr(hash('sha256', $password, true), 0, 32);
				$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
				$encrypted = base64_encode(openssl_encrypt($oldpass, $method, $password, OPENSSL_RAW_DATA, $iv));

				$rsup = mysqli_query($conn, "UPDATE ahli SET ahli_pass='$encrypted' WHERE ahli_id = '$id'");
				if ($rsup) {
					echo "<script>window.alert('kata laluan telah disetkan no ic')</script>";
					echo "<script>window.location = '../admin/index.php'</script>";
				} else {
					echo "<script>window.alert('reset kata laluan tidak berjaya')</script>";
					echo "<script>window.location = '../admin/index.php'</script>";
				}
			}
		}

		public function update($id){
			$conf = new config();
			$conn = $conf->open();

			$rsreq = mysqli_query($conn, "SELECT * FROM ahli WHERE ahli_id = '$id'");
			return $rsreq;
		}

		function index(){
			$conf = new config();
			$conn = $conf->open();

			$rsreq = mysqli_query($conn, "SELECT * FROM ahli");
			return $rsreq;
		}

		function login($conn){
			$email = mysqli_escape_string($conn, $_POST['email']);
			$pass =  mysqli_escape_string($conn, $_POST['password']);

			$password = '3sc3RLrpd17';
			$method = 'aes-256-cbc';
			$password = substr(hash('sha256', $password, true), 0, 32);
			$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
			$encrypted = base64_encode(openssl_encrypt($pass, $method, $password, OPENSSL_RAW_DATA, $iv));

			$rslogin = mysqli_query($conn, "SELECT pengurus_id,pengurus_email,pengurus_pass FROM pengurus WHERE pengurus_email = '$email' AND pengurus_pass = '$encrypted'") or die (mysqli_error($conn));

			$rsloginahli = mysqli_query($conn, "SELECT ahli_id,ahli_email,ahli_pass FROM ahli WHERE ahli_email = '$email' AND ahli_pass = '$encrypted'") or die (mysqli_error($conn));

			if (mysqli_num_rows($rslogin) > 0) {
				$rsrow = mysqli_fetch_array($rslogin);
				$_SESSION['admin_id'] = $rsrow['pengurus_id'];
				echo "<script>window.location = '../admin'</script>";
			} else if (mysqli_num_rows($rsloginahli) > 0){
				$rsrowahli = mysqli_fetch_array($rsloginahli);
				$_SESSION['ahli_id'] = $rsrowahli['ahli_id'];
				echo "<script>window.location = '../ahli'</script>";
			} else {
				echo "<script>window.alert('BATAL: email atau kata laluan anda salah. Sila cuba lagi')</script>";
				echo "<script>window.location = '../'</script>";
			}
		}

		function hapus($conn){
			$idahli = mysqli_escape_string($conn, $_POST['idahli']);

			$rshapus = mysqli_query($conn, "DELETE FROM ahli WHERE ahli_id = '$idahli'");
			if ($rshapus) {
				echo "<script>window.alert('data ahli berjaya dipadam')</script>";
				echo "<script>window.location = '../admin/index.php'</script>";
			} else {
				echo "<script>window.alert('data ahli tidak berjaya dipadam')</script>";
				echo "<script>window.location = '../admin/index.php'</script>";
			}
		}

		function tambah($conn){
			$nama = mysqli_escape_string($conn, $_POST['nama']);
			$ic = mysqli_escape_string($conn, $_POST['ic']);
			$email = mysqli_escape_string($conn, $_POST['email']);
			$pass = mysqli_escape_string($conn, $_POST['ic']);

			$password = '3sc3RLrpd17';
			$method = 'aes-256-cbc';
			$password = substr(hash('sha256', $password, true), 0, 32);
			$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
			$encrypted = base64_encode(openssl_encrypt($pass, $method, $password, OPENSSL_RAW_DATA, $iv));

			$rstambah = mysqli_query($conn, "INSERT INTO ahli (ahli_nama, ahli_ic, ahli_email, ahli_pass, ahli_tarikhdaftar) VALUES ('$nama', '$ic', '$email', '$encrypted', NOW())") or die ('<script type="text/javascript">alert("FATAL: email ini telah tersedia.");location.replace("../admin/tambah.php")</script>');
			if ($rstambah) {
				echo "<script>window.alert('tambahan ahli telah berjaya')</script>";
				echo "<script>window.location = '../admin/index.php'</script>";
			} else {
				echo "<script>window.alert('tambahan ahli tidak berjaya. sila cuba lagi')</script>";
				echo "<script>window.location = '../admin/tambah.php'</script>";
			}
		}
	}

?>