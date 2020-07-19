<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $consultants = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($consultants != false){
		while ($row = mysqli_fetch_array($consultants)) {		
			$b["consultantId"] = $row["id"];
			$b["cNIC"] = $row["c_nic"];
			$b["cFirstName"] = $row["c_first_name"];
			$b["cLastName"] = $row["c_last_name"];
			$b["cGender"] = $row["c_gender"];
			$b["cAddress"] = $row["c_address"];
			$b["cDOB"] = $row["c_dob"];
			$b["cPhoneNumber"] = $row["c_phone_number"];
			$b["cRole"] = $row["c_role"];
			$b["cStatus"] = $row["c_status"];
			$b["Hospital"] = $row["hospital_id"];
			$b["Department"] = $row["department_id"];
			$b["Unit"] = $row["unit_id"];
			$b["Ward"] = $row["ward_id"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>