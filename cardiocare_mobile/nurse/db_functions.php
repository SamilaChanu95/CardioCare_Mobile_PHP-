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
     * Storing new nurse
     * returns nurse details
     */
    public function storeNurse($nNIC, $nFirstName, $nLastName, $nGender, $nAddress, $nDOB, 
	$nPhoneNumber, $nRole, $nStatus, $Hospital, $Department, $Unit, $Ward) {   
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Insert nurse into database
        $result = mysqli_query($conn, "INSERT INTO nurse (n_nic, n_first_name, n_last_name, 
	n_gender, n_address, n_dob, n_phone_number, n_role, n_status, hospital_id, department_id, 
	unit_id, ward_id) VALUES('$nNIC', '$nFirstName', '$nLastName', '$nGender', '$nAddress', '$nDOB', 
	'$nPhoneNumber', '$nRole', '$nStatus', '$Hospital', '$Department', '$Unit', '$Ward')");

        if ($result) {
			return true;
        } else {
			// For other errors
			return false;
		}            
        
    }

    /**
     * Getting all nurses
     */
    public function getAllNurses() 
    {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM nurse");
        
        return $result;
    }

    /**
     * Update nurse details
     */
    public function updateNurse($nNIC, $nFirstName, $nLastName, $nGender, $nAddress, $nDOB, 
	$nPhoneNumber, $nRole, $nStatus, $Hospital, $Department, $Unit, $Ward, $Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE nurse SET n_nic = '$nNIC', n_first_name =
	 '$nFirstName', n_last_name = '$nLastName', n_gender = '$nGender', n_address = '$nAddress',
	 n_dob = '$nDOB', n_phone_number = '$nPhoneNumber', n_role = '$nRole', n_status = '$nStatus',
	 hospital_id = '$Hospital', department_id = '$Department', unit_id = '$Unit', ward_id = '$Ward'  WHERE id = '$Id' ");
        return $result;
    }

    /**
     * Get nurse details
     */
    public function getNurse($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT id, n_nic, n_first_name, n_last_name, n_gender, n_address, n_dob,
	 n_phone_number, n_role, n_status, hospital_id, department_id, unit_id, ward_id FROM nurse WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Delete nurse details
     */
    public function deleteNurse($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "DELETE FROM nurse WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM nurse WHERE syncsts = FALSE");
        
	return $result;
    }

    /**
     * Update Sync status of rows
     */
    public function updateSyncSts($id, $sts) {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE nurse SET syncsts = $sts WHERE Id = $id");
        
	return $result;
    }
}

?>