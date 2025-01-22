<?php 
session_start();
include('koneksi.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM akun WHERE email = '$email'";
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {
	//set session
	$_SESSION["nama"] = $row ["nama_lengkap"];
	 $_SESSION["login"] = "true";
	$_SESSION["email"] = $row ["email"];
	if($row['role'] == "admin"){
		$_SESSION ["username"] = $row["username"];
		$_SESSION["role"] = $row ["role"];
		header("location: dashbord.php");
	 }elseif($row["role"] == "user"){
		$_SESSION ["username"] = $row ["username"];
		$_SESSION["role"] = $row ["role"];
		header("location: index.php");
	 }
	
	if(isset($_POST['remember'])){
		setcookie("keyvalue",$row['id'], time() + (1 * 24 * 60 * 60));
		setcookie('gdng',hash('xxh32', $row['username']));

	}
	 

} else {
		$info = "pasword atau email salah";
		echo $info;
		
}


mysqli_close($koneksi);
?>