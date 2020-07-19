<?php
/**
 * Creates Unsynced MySQL DB rows count as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $technicians = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($technicians != false){
        $no_of_technicians = mysqli_num_rows($technicians);		
		$b["count"] = $no_of_technicians;
		echo json_encode($b);
	}
    else{
        $no_of_technicians = 0;
		$b["count"] = $no_of_technicians;
		echo json_encode($b);
	}
?>