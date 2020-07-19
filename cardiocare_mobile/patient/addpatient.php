<?php
	include_once './db_functions.php';
	//Create Object for DB_Functions clas
	$db = new DB_Functions(); 
	//Get JSON posted by Android Application
	$json = $_POST["usersJSON"];
	//Remove Slashes
	if (get_magic_quotes_gpc()){
	$json = stripslashes($json);
	}
	//Decode JSON into an Array
	$data = json_decode($json);
	//Util arrays to create response JSON
	$a=array();
	$b=array();
	//Loop through an Array and insert data read from JSON into MySQL DB
	for($i=0; $i<count($data) ; $i++)
	{
		//Store patient into MySQL DB
		$res = $db->storePatient(
			$data[$i]->pNIC, 
			$data[$i]->pFirstName, 
			$data[$i]->pLastName, 
			$data[$i]->pGender, 
			$data[$i]->pAddress, 
			$data[$i]->pDOB , 
			$data[$i]->pPhoneNumber, 
			$data[$i]->pEmergencyDetails, 
			$data[$i]->pMedicalHistroy, 
			$data[$i]->pAllergicHistroy, 
			$data[$i]->pSurgicalHistroy, 
			$data[$i]->pDrugHistroy,
			$data[$i]->pSocialHistroy, 
			$data[$i]->pExaminationDetails, 
			$data[$i]->pCurrentLocation, 
			$data[$i]->pStatus, 
			$data[$i]->pVisitingNumber, 
			$data[$i]->PatientType,  
			$data[$i]->pWeight,
			$data[$i]->pHeight);
		//Based on inserttion, create JSON response
		if($res){
			$b["id"] = $data[$i]->patientId;
			$b["status"] = 'yes';
			array_push($a,$b);
		}else{
			$b["id"] = $data[$i]->patientId;
			$b["status"] = 'no';
			array_push($a,$b);
		}
	}
	//Post JSON response back to Android Application
	echo json_encode($a);
?>