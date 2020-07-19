<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $technicians = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($technicians != false){
		while ($row = mysqli_fetch_array($technicians)) {		
			$b["technicianId"] = $row["id"];
			$b["tNIC"] = $row["t_nic"];
			$b["tFirstName"] = $row["t_first_name"];
			$b["tLastName"] = $row["t_last_name"];
			$b["tGender"] = $row["t_gender"];
			$b["tAddress"] = $row["t_address"];
			$b["tDOB"] = $row["t_dob"];
			$b["tPhoneNumber"] = $row["t_phone_number"];
			$b["tRole"] = $row["t_role"];
			$b["tStatus"] = $row["t_status"];
			$b["Hospital"] = $row["hospital_id"];
			$b["Department"] = $row["department_id"];
			$b["Unit"] = $row["unit_id"];
			$b["Ward"] = $row["ward_id"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>