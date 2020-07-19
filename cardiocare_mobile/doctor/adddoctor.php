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
		//Store Doctor into MySQL DB
		$res = $db->storeDoctor(
			$data[$i]->dNIC, 
			$data[$i]->dFirstName, 
			$data[$i]->dLastName, 
			$data[$i]->dGender, 
			$data[$i]->dAddress, 
			$data[$i]->dDOB , 
			$data[$i]->dPhoneNumber, 
			$data[$i]->dRole, 
			$data[$i]->dStatus, 
			$data[$i]->Hospital, 
			$data[$i]->Department, 
			$data[$i]->Unit, 
			$data[$i]->Ward);
		//Based on inserttion, create JSON response
		if($res){
			$b["id"] = $data[$i]->doctorId;
			$b["status"] = 'yes';
			array_push($a,$b);
		}else{
			$b["id"] = $data[$i]->doctorId;
			$b["status"] = 'no';
			array_push($a,$b);
		}
	}
	//Post JSON response back to Android Application
	echo json_encode($a);
?>