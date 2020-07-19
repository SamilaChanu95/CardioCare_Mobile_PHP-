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
     * Storing new technician
     * returns technician details
     */
    public function storeTechnician($tNIC, $tFirstName, $tLastName, $tGender, $tAddress, $tDOB, 
	$tPhoneNumber, $tRole, $tStatus, $Hospital, $Department, $Unit, $Ward) {   
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Insert technician into database
        $result = mysqli_query($conn, "INSERT INTO technician (t_nic, t_first_name, t_last_name, 
	t_gender, t_address, t_dob, t_phone_number, t_role, t_status, hospital_id, department_id, 
	unit_id, ward_id) VALUES('$tNIC', '$tFirstName', '$tLastName', '$tGender', '$tAddress', '$tDOB', 
	'$tPhoneNumber', '$tRole', '$tStatus', '$Hospital', '$Department', '$Unit', '$Ward')");

        if ($result) {
			return true;
        } else {
			// For other errors
			return false;
		}            
        
    }

    /**
     * Getting all technicians
     */
    public function getAllTechnicians() 
    {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM technician");
        
        return $result;
    }

    /**
     * Update technician details
     */
    public function updateTechnician($tNIC, $tFirstName, $tLastName, $tGender, $tAddress, $tDOB, 
	$tPhoneNumber, $tRole, $tStatus, $Hospital, $Department, $Unit, $Ward, $Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE technician SET t_nic = '$tNIC', t_first_name =
	 '$tFirstName', t_last_name = '$tLastName', t_gender = '$tGender', t_address = '$tAddress',
	 t_dob = '$tDOB', t_phone_number = '$tPhoneNumber', t_role = '$tRole', t_status = '$tStatus',
	 hospital_id = '$Hospital', department_id = '$Department', unit_id = '$Unit', ward_id = '$Ward'  WHERE id = '$Id' ");
        return $result;
    }

    /**
     * Get technician details
     */
    public function getTechnician($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT id, t_nic, t_first_name, t_last_name, t_gender, t_address, t_dob,
	 t_phone_number, t_role, t_status, hospital_id, department_id, unit_id, ward_id FROM technician WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Delete technician details
     */
    public function deleteTechnician($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "DELETE FROM technician WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM technician WHERE syncsts = FALSE");
        
	return $result;
    }

    /**
     * Update Sync status of rows
     */
    public function updateSyncSts($id, $sts) {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE technician SET syncsts = $sts WHERE Id = $id");
        
	return $result;
    }
}

?>