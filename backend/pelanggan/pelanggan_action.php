<?php
/* Universal Ecommerce
 * 
 * 
 * last edit: 15 okt 2013
 */
 
include ('../../inc/config.php');
include('../../inc/function.php');
//data dari pelanggan
if(isset($_POST)){
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$password = md5($_POST['password']);
$telp=$_POST['telp'];
$kodepos=$_POST['kodepos'];
$kelamin=$_POST['kelamin'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];
$kota=$_POST['kota'];

if($aksi == 'tambah') {
	$sql = "INSERT INTO pelanggan(nama,alamat,kelamin,
	kodepos,email,telp,password,tanggal_daftar,kota)
		VALUES('$nama',
		'$alamat','$kelamin','$kodepos','$email','$telp','$password',curdate(),'$kota')";
}else if($aksi== 'edit') {
	
		$sql = "update pelanggan set nama='$nama',
	kodepos='$kodepos',email='$email',alamat='$ikategori',telp='$telp',password='$password'
	where idpelanggan='$id'";

}

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=pelanggan&pg=pelanggan_view&status=0');
} else {
	header('location:../index.php?mod=pelanggan&pg=pelanggan_view&status=1');
}
}
?>
