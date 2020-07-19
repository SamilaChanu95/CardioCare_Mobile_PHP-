<?php
/**
 * Creates Unsynced MySQL DB rows count as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $doctors = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($doctors != false){
        $no_of_doctors = mysqli_num_rows($doctors);		
		$b["count"] = $no_of_doctors;
		echo json_encode($b);
	}
    else{
        $no_of_doctors = 0;
		$b["count"] = $no_of_doctors;
		echo json_encode($b);
	}
?>