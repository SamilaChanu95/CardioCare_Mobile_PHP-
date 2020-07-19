<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        
    }

    // destructor
    function __destruct() {

    }

    /**
     * Storing new icu report
     * returns icu report details
     */
    public function storeICUReport($AdmitDate, $Room, $Code, $Diagnosis, $Neuro, $Cardiac, $Respiratory, $Ventilator, $GI, $GU, $Skin, $Drains, $Labs, $Meds, $Hemodynamics, $ToDo, $CoreMeasures, $Patient) {   
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Insert icu into database
        $result = mysqli_query($conn, "INSERT INTO icu (admit_date, room, code, diagnosis, neuro, cardiac, respiratory, ventilator, gi, gu, skin, drains, labs, meds, hemodynamics, to_do, core_measures, patient_id) VALUES('$AdmitDate', '$Room', '$Code', '$Diagnosis', '$Neuro', '$Cardiac', '$Respiratory', '$Ventilator', '$GI', '$GU', '$Skin', '$Drains', '$Labs', '$Meds', '$Hemodynamics', '$ToDo', '$CoreMeasures', '$Patient')");

        if ($result) {
			return true;
        } else {
			// For other errors
			return false;
		}            
        
    }

    /**
     * Getting all icu reports
     */
    public function getICUReports() 
    {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM icu");
        
        return $result;
    }

    /**
     * Update icu details
     */
    public function updateNurse($AdmitDate, $Room, $Code, $Diagnosis, $Neuro, $Cardiac, $Respiratory, $Ventilator, $GI, $GU, $Skin, $Drains, $Labs, $Meds, $Hemodynamics, $ToDo, $CoreMeasures, $Patient, $Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE icu SET admit_date = '$AdmitDate', room =
	 '$Room', code = '$Code', diagnosis = '$Diagnosis', neuro = '$Neuro',
	 cardiac = '$Cardiac', respiratory = '$Respiratory', ventilator = '$Ventilator', gi = '$GI',
	 gu = '$GU', skin = '$Skin', drains = '$Drains', labs = '$Labs', meds = '$Meds', hemodynamics = '$Hemodynamics', to_do = '$ToDo', core_measures = '$CoreMeasures', patient_id = '$Patient'  WHERE id = '$Id' ");
        return $result;
    }

    /**
     * Get icu report details
     */
    public function getICUReport($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT id, admit_date, room, code, diagnosis, neuro, cardiac, respiratory, ventilator, gi, gu, skin, drains, labs, meds, hemodynamics, to_do, core_measures, patient_id FROM icu WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Delete icu report details
     */
    public function deleteNurse($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "DELETE FROM icu WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM icu WHERE syncsts = FALSE");
        
	return $result;
    }

    /**
     * Update Sync status of rows
     */
    public function updateSyncSts($id, $sts) {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE icu SET syncsts = $sts WHERE Id = $id");
        
	return $result;
    }
}

?>