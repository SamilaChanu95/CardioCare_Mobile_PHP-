<?php
/**
 * Creates Unsynced MySQL DB rows count as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $consultants = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($consultants != false){
        $no_of_consultants = mysqli_num_rows($consultants);		
		$b["count"] = $no_of_consultants;
		echo json_encode($b);
	}
    else{
        $no_of_consultants = 0;
		$b["count"] = $no_of_consultants;
		echo json_encode($b);
	}
?>