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
     * Storing new doctor
     * returns doctor details
     */
    public function storeDoctor($dNIC, $dFirstName, $dLastName, $dGender, $dAddress, $dDOB, 
	$dPhoneNumber, $dRole, $dStatus, $Hospital, $Department, $Unit, $Ward) {   
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Insert doctor into database
        $result = mysqli_query($conn, "INSERT INTO doctor (d_nic, d_first_name, d_last_name, 
	d_gender, d_address, d_dob, d_phone_number, d_role, d_status, hospital_id, department_id, 
	unit_id, ward_id) VALUES('$dNIC', '$dFirstName', '$dLastName', '$dGender', '$dAddress', '$dDOB', 
	'$dPhoneNumber', '$dRole', '$dStatus', '$Hospital', '$Department', '$Unit', '$Ward')");

        if ($result) {
			return true;
        } else {
			// For other errors
			return false;
		}            
        
    }

    /**
     * Getting all Doctors
     */
    public function getAllDoctors() 
    {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM doctor");
        
        return $result;
    }

    /**
     * Update Doctor details
     */
    public function updateDoctor($dNIC, $dFirstName, $dLastName, $dGender, $dAddress, $dDOB, 
	$dPhoneNumber, $dRole, $dStatus, $Hospital, $Department, $Unit, $Ward, $Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE doctor SET d_nic = '$dNIC', d_first_name =
	 '$dFirstName', d_last_name = '$dLastName', d_gender = '$dGender', d_address = '$dAddress',
	 d_dob = '$dDOB', d_phone_number = '$dPhoneNumber', d_role = '$dRole', d_status = '$dStatus',
	 hospital_id = '$Hospital', department_id = '$Department', unit_id = '$Unit', ward_id = '$Ward'  WHERE id = '$Id' ");
        return $result;
    }

    /**
     * Get Doctor details
     */
    public function getDoctor($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT id, d_nic, d_first_name, d_last_name, d_gender, d_address, d_dob,
	 d_phone_number, d_role, d_status, hospital_id, department_id, unit_id, ward_id FROM doctor WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Delete Doctor details
     */
    public function deleteDoctor($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "DELETE FROM doctor WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM doctor WHERE syncsts = FALSE");
        
	return $result;
    }

    /**
     * Update Sync status of rows
     */
    public function updateSyncSts($id, $sts) {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE doctor SET syncsts = $sts WHERE Id = $id");
        
	return $result;
    }
}

?>