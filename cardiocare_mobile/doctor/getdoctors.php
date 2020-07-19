<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $doctors = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($doctors != false){
		while ($row = mysqli_fetch_array($doctors)) {		
			$b["doctorId"] = $row["id"];
			$b["dNIC"] = $row["d_nic"];
			$b["dFirstName"] = $row["d_first_name"];
			$b["dLastName"] = $row["d_last_name"];
			$b["dGender"] = $row["d_gender"];
			$b["dAddress"] = $row["d_address"];
			$b["dDOB"] = $row["d_dob"];
			$b["dPhoneNumber"] = $row["d_phone_number"];
			$b["dRole"] = $row["d_role"];
			$b["dStatus"] = $row["d_status"];
			$b["Hospital"] = $row["hospital_id"];
			$b["Department"] = $row["department_id"];
			$b["Unit"] = $row["unit_id"];
			$b["Ward"] = $row["ward_id"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>