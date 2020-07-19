<?php
/**
 * Creates Unsynced rows data as JSON
 */
    include_once 'db_functions.php';
    $db = new DB_Functions();
    $icureports = $db->getUnSyncRowCount();
	$a = array();
	$b = array();
    if ($icureports != false){
		while ($row = mysqli_fetch_array($icureports)) {		
			$b["icureportId"] = $row["id"];
			$b["AdmitDate"] = $row["admit_date"];
			$b["Room"] = $row["room"];
			$b["Code"] = $row["code"];
			$b["Diagnosis"] = $row["diagnosis"];
			$b["Neuro"] = $row["neuro"];
			$b["Cardiac"] = $row["cardiac"];
			$b["Respiratory"] = $row["respiratory"];
			$b["Ventilator"] = $row["ventilator"];
			$b["GI"] = $row["gi"];
			$b["GU"] = $row["gu"];
			$b["Skin"] = $row["skin"];
			$b["Drains"] = $row["drains"];
			$b["Labs"] = $row["labs"];
			$b["Meds"] = $row["meds"];
			$b["Hemodynamics"] = $row["hemodynamics"];
			$b["ToDo"] = $row["to_do"];
			$b["CoreMeasures"] = $row["core_measures"];
			$b["Patient"] = $row["patient_id"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}
?>