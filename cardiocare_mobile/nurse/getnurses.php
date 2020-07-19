<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $nurses = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($nurses != false){
		while ($row = mysqli_fetch_array($nurses)) {		
			$b["nurseId"] = $row["id"];
			$b["nNIC"] = $row["n_nic"];
			$b["nFirstName"] = $row["n_first_name"];
			$b["nLastName"] = $row["n_last_name"];
			$b["nGender"] = $row["n_gender"];
			$b["nAddress"] = $row["n_address"];
			$b["nDOB"] = $row["n_dob"];
			$b["nPhoneNumber"] = $row["n_phone_number"];
			$b["nRole"] = $row["n_role"];
			$b["nStatus"] = $row["n_status"];
			$b["Hospital"] = $row["hospital_id"];
			$b["Department"] = $row["department_id"];
			$b["Unit"] = $row["unit_id"];
			$b["Ward"] = $row["ward_id"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>