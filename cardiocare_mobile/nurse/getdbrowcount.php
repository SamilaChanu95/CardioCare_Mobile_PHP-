<?php
/**
 * Creates Unsynced MySQL DB rows count as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $nurses = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($nurses != false){
        $no_of_nurses = mysqli_num_rows($nurses);		
		$b["count"] = $no_of_nurses;
		echo json_encode($b);
	}
    else{
        $no_of_nurses = 0;
		$b["count"] = $no_of_nurses;
		echo json_encode($b);
	}
?>