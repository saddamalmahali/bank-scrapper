#!/usr/local/bin/php
<?php
	date_default_timezone_set('Asia/Jakarta');

// userid & PIN mandiri
	define('USERID','blablaba04');
	define('PASSWD','012345');
	define('ACCNUM','0123456789012');

// penetapan tanggal from-to mutasi
	$from_date = date("Y-m-01");
	$to_date = date("Y-m-d");

// load Class
	include('mandiri.class.php');
	$mandiri = new bankMandiri;
	$mandiri->userid = USERID;
	$mandiri->password = PASSWD;
	$mandiri->rekening = ACCNUM;

	$soawal = 0;
	$soakhir = 0;

// ################ START ACTION ################# \\
echo "<pre>";
if($mandiri->login()){
	$result = $mandiri->mutasi($from_date,$to_date);
	$mandiri->logout();

	$soawal = $result['soawal'];
	$mutasi = $result['mutasi'];
	$soakhir= $result['soakhir'];

	if(count($mutasi)) print_r($result);
	else echo "Hasil Check Mutasi Zero/Error";
} else {				// ERROR LOGIN
	echo "Error Login Internet Banking / Wait 10mnt";
}
echo "</pre>";
?>
