<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $patients = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($patients != false){
		while ($row = mysqli_fetch_array($patients)) {		
			$b["patientId"] = $row["id"];
			$b["pNIC"] = $row["p_nic"];
			$b["pFirstName"] = $row["p_first_name"];
			$b["pLastName"] = $row["p_last_name"];
			$b["pGender"] = $row["p_gender"];
			$b["pAddress"] = $row["p_address"];
			$b["pDOB"] = $row["p_dob"];
			$b["pPhoneNumber"] = $row["p_phone_number"];
			$b["pEmergencyDetails"] = $row["p_emergency_contact_details"];
			$b["pMedicalHistroy"] = $row["p_medical_histroy"];
			$b["pAllergicHistroy"] = $row["p_allergic_histroy"];
			$b["pSurgicalHistroy"] = $row["p_surgical_histroy"];
			$b["pDrugHistroy"] = $row["p_drug_histroy"];
			$b["pSocialHistroy"] = $row["p_social_histroy"];
			$b["pExaminationDetails"] = $row["p_examination_details"];
			$b["pCurrentLocation"] = $row["p_current_location"];
			$b["pStatus"] = $row["p_status"];
			$b["pVisitingNumber"] = $row["p_visiting_number"];
			$b["PatientType"] = $row["patient_type_id"];
			$b["pWeight"] = $row["p_weight"];
			$b["pHeight"] = $row["p_height"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>