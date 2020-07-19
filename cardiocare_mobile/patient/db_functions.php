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
     * Storing new patient
     * returns patient details
     */
    public function storePatient($pNIC, $pFirstName, $pLastName, $pGender, $pAddress, $pDOB, $pPhoneNumber, $pEmergencyDetails, $pMedicalHistroy, $pAllergicHistroy, $pSurgicalHistroy, $pDrugHistroy, $pSocialHistroy, $pExaminationDetails, $pCurrentLocation, $pStatus, $pVisitingNumber, $PatientType, $pWeight, $pHeight) {   
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Insert patient into database
        $result = mysqli_query($conn, "INSERT INTO patient (p_nic, p_first_name, p_last_name, p_gender, p_address, p_dob, p_phone_number, p_emergency_contact_details, p_medical_histroy, p_allergic_histroy, p_surgical_histroy, p_drug_histroy, p_social_histroy, p_examination_details, p_current_location, p_status, p_visiting_number, patient_type_id, p_weight, p_height) VALUES('$pNIC', '$pFirstName', '$pLastName', '$pGender', '$pAddress', '$pDOB', '$pPhoneNumber', '$pEmergencyDetails', '$pMedicalHistroy', '$pAllergicHistroy', '$pSurgicalHistroy', '$pDrugHistroy', '$pSocialHistroy', '$pExaminationDetails', '$pCurrentLocation', '$pStatus', '$pVisitingNumber', '$PatientType', '$pWeight', '$pHeight')");

        if ($result) {
			return true;
        } else {
			// For other errors
			return false;
		}            
        
    }

    /**
     * Getting all patients
     */
    public function getAllPatients() 
    {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM patient");
        
        return $result;
    }

    /**
     * Update patient details
     */
    public function updatePatient($pNIC, $pFirstName, $pLastName, $pGender, $pAddress, $pDOB, $pPhoneNumber, $pEmergencyDetails, $pMedicalHistroy, $pAllergicHistroy, $pSurgicalHistroy, $pDrugHistroy, $pSocialHistroy, $pExaminationDetails, $pCurrentLocation, $pStatus, $pVisitingNumber, $PatientType, $pWeight, $pHeight, $Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE patient SET p_nic = '$pNIC', p_first_name =
	 '$pFirstName', p_last_name = '$pLastName', p_gender = '$pGender', p_address = '$pAddress',
	 p_dob = '$pDOB', p_phone_number = '$pPhoneNumber', p_emergency_contact_details = '$pEmergencyDetails', p_allergic_histroy = '$pAllergicHistroy', p_surgical_histroy = '$pSurgicalHistroy', p_drug_histroy = '$pDrugHistroy', p_social_histroy = '$pSocialHistroy', p_examination_details = '$pExaminationDetails', p_current_location = '$pCurrentLocation', p_status = '$pStatus', p_visiting_number = '$pVisitingNumber', patient_type_id = '$PatientType', p_weight = '$pWeight', p_height = '$pHeight'  WHERE id = '$Id' ");
        return $result;
    }

    /**
     * Get patient details
     */
    public function getPatient($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT id, p_nic, p_first_name, p_last_name, p_gender, p_address, p_dob, p_phone_number, p_emergency_contact_details, p_medical_histroy, p_allergic_histroy, p_surgical_histroy, p_drug_histroy, p_social_histroy, p_examination_details, p_current_location, p_status, p_visiting_number, patient_type_id, p_weight, p_height FROM patient WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Delete patient details
     */
    public function deletePatient($Id) {
        require_once 'config.php';

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "DELETE FROM patient WHERE id = '$Id' ");
        
        return $result;
    }

    /**
     * Get Yet to Sync row Count
     */
    public function getUnSyncRowCount() {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "SELECT * FROM patient WHERE syncsts = FALSE");
        
	return $result;
    }

    /**
     * Update Sync status of rows
     */
    public function updateSyncSts($id, $sts) {
	require_once 'config.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $result = mysqli_query($conn, "UPDATE patient SET syncsts = $sts WHERE Id = $id");
        
	return $result;
    }
}

?>