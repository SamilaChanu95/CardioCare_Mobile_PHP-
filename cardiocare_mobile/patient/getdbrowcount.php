<?php
/**
 * Creates Unsynced MySQL DB rows count as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $patients = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($patients != false){
        $no_of_patients = mysqli_num_rows($patients);		
		$b["count"] = $no_of_patients;
		echo json_encode($b);
	}
    else{
        $no_of_patients = 0;
		$b["count"] = $no_of_patients;
		echo json_encode($b);
	}
?>