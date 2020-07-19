<?php
/**
 * Creates Unsynced MySQL DB rows count as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $icureports = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($icureports != false){
        $no_of_icureports = mysqli_num_rows($icureports);		
		$b["count"] = $no_of_icureports;
		echo json_encode($b);
	}
    else{
        $no_of_icureports = 0;
		$b["count"] = $no_of_icureports;
		echo json_encode($b);
	}
?>