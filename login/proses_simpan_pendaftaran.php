<?php
	session_start();
	
	include "koneksi/koneksi.php";

	//check if $_SESSION is exist
	if (isset($_SESSION)) {
		foreach ($_SESSION as $key => $val) {
			${$key} = $val;
		}
		// $gajikr = $gaji;

		// if ($gajikr < "3000000") {
		//     $gajikriteria = "1";
		// }
		// elseif ($gajikr >= "3000000" && $gajikr < "4000000") {
		//     $gajikriteria = "2";
		// }
		// elseif ($gajikr >= "4000000" && $gajikr < "5000000") {
		//     $gajikriteria = "3";
		// }
		// elseif ($gajikr >= "5000000" && $gajikr < "6000000") {
		//     $gajikriteria = "4";
		// }
		// elseif ($gajikr > "6000000") {
		//     $gajikriteria = "5";
		// }

		// $jarakr = $jarak;

		// if ($jarakr < "15") {
		//     $jarakriteria = "1";
		// }
		// elseif ($jarakr >= "15" && $jarakr < "11") {
		//     $jarakriteria = "2";
		// }
		// elseif ($jarakr >= "11" && $jarakr < "7") {
		//     $jarakriteria = "3";
		// }
		// elseif ($jarakr >= "7" && $jarakr < "4") {
		//     $jarakriteria = "4";
		// }
		// elseif ($jarakr > "4") {
		//     $jarakriteria = "5";
		// }
		$sql	= "INSERT INTO pendaftaran VALUES(null,'$nama', '$nisn', '$tempat_lahir'
					, '$tanggal_lahir' ,'$jenis_kelamin', '$alamat', '$jarak', '$gaji')";

		$exec 	= mysqli_query($conn,$sql);

		if ($exec) {

			$id 		= $conn->insert_id;
			//echo $id;
			$query 		= "INSERT INTO akun VALUES(null, '$email', '$password', '',1, $id)";

			$exec_akun 	=  mysqli_query($conn, $query);

			$date_regis	= date("Y-m-d");

			$query2		= "INSERT INTO detail_pendaftaran (id_user,tanggal_daftar,status_pendaftaran)
							VALUES($id, '$date_regis', 0)";

			$exec_detil	= mysqli_query($conn, $query2);

			if ($exec_akun && $exec_detil) {
				session_destroy();
				echo'<script> window.location="success_register.php"; </script> ';
			}else{
				echo mysqli_error($conn);
				echo 'gagal';
			}

		}else{
			echo mysqli_error($conn);
		}
	}
?>