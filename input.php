

<?php
include"koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "insert INTO user SET
								username = '$username',
								password = '$password'
								";

mysqli_query($koneksi, $query);
header('location:login.php');

?>

