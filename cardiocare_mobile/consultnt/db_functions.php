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
     * Storing new consultant
     * returns consultant details
     */
    public function storeConsultant($cNIC, $cFirstName, $cLastName, $cGender, $cAddress, $cDOB, 
	$cPhoneNumber, $cRole, $cStatus, $Hospital, $Department, $Unit, $Ward) {   
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Insert consultant into database
        $result = mysqli_query($conn, "INSERT INTO consultant (c_nic, c_first_name, c_last_name, 
	c_gender, c_address, c_dob, c_phone_number, c_role, c_status, hospital_id, department_id, 
	unit_id, ward_id) VALUES('$cNIC', '$cFirstName', '$cLastName', '$cGender', '$cAddress', '$cDOB', 
	'$cPhoneNumber', '$cRole', '$cStatus', '$Hospital', '$Department', '$Unit', '$Ward')");

        if ($result) {
			return true;
        } else {
			// For other errors
			return false;
		}            
        
    }

    /**
     * Getting all consultants
     */
    public function getAllConsultants() 
    {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM consultant");
        
        return $result;
    }

    /**
     * Update consultant details
     */
    public function updateConsultant($cNIC, $cFirstName, $cLastName, $cGender, $cAddress, $cDOB, 
	$cPhoneNumber, $cRole, $cStatus, $Hospital, $Department, $Unit, $Ward, $Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE consultant SET c_nic = '$cNIC', c_first_name =
	 '$cFirstName', c_last_name = '$cLastName', c_gender = '$cGender', c_address = '$cAddress',
	 c_dob = '$cDOB', c_phone_number = '$cPhoneNumber', c_role = '$cRole', c_status = '$cStatus',
	 hospital_id = '$Hospital', department_id = '$Department', unit_id = '$Unit', ward_id = '$Ward'  WHERE id = '$Id' ");
        return $result;
    }

    /**
     * Get consultant details
     */
    public function getConsultant($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT id, c_nic, c_first_name, c_last_name, c_gender, c_address, c_dob,
	 c_phone_number, c_role, c_status, hospital_id, department_id, unit_id, ward_id FROM consultant WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Delete consultant details
     */
    public function deleteConsultant($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "DELETE FROM consultant WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM consultant WHERE syncsts = FALSE");
        
	return $result;
    }

    /**
     * Update Sync status of rows
     */
    public function updateSyncSts($id, $sts) {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE consultant SET syncsts = $sts WHERE Id = $id");
        
	return $result;
    }
}

?>