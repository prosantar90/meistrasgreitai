<?php

add_action('wp_ajax_emp_register','employee_register');
// Function to handle file upload
// function upload_file($file_key) {
//     $file_name = '';

//     // Check if file was uploaded successfully
//     if(isset($_FILES[$file_key]) && ($_FILES[$file_key] != '')){
//         // Get base directory for uploads
//         $target_dir = get_template_directory().'/uploads/';

//         // Generate unique file name to avoid overwriting existing files
//         $target_file = $target_dir . $_FILES[$file_key]['name'];

       
//         // Construct target file path
//         // $target_file = $target_dir . $file_name;

//         // Move uploaded file to target directory
//         if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $target_file)) {
//             // File moved successfully
//             echo 'success';
//             // die();
//             // You don't need to assign anything here because $file_name is already assigned.
//         } else {
//             // File upload failed
//             // echo "Failed to move uploaded file.";
//             // Handle the error accordingly
//             wp_die();
//         }
//     } else {
//         // File upload failed or not found in $_FILES
//         // echo "File upload failed or file not found in \$_FILES.";
//         // Handle the error accordingly
//         wp_die();
//     }

//     return $file_name;
// }


function upload_file($file_key) {
    $file_name = '';

    // Check if file was uploaded successfully
    if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] === UPLOAD_ERR_OK) {
        // Get base directory for uploads
        $upload_dir = wp_upload_dir();

        // Generate unique file name to avoid overwriting existing files
        $file_name = wp_unique_filename($upload_dir['path'], basename($_FILES[$file_key]['name']));

        // Construct target file path
        $target_file = trailingslashit($upload_dir['path']) . $file_name;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $target_file)) {
            // File moved successfully
            $file_name = $file_name; // Assigning the unique file name to $file_name
        } else {
            // File upload failed
            echo "Failed to move uploaded file.";
            // Handle the error accordingly
        }
    } else {
        // File upload failed or not found in $_FILES
        echo "File upload failed or file not found in \$_FILES.";
        // Handle the error accordingly
    }

    return $file_name;
}


function employee_register(){
	if (isset($_POST['action']) && $_POST['action'] === 'emp_register') {
		global $wpdb;	
		
	$table_prefix = $wpdb->prefix;
	$empImage = upload_file('empimg');
	// $appoinment_letter = upload_file('eappoinment_letter');
	// die();
	// $salary_slip = upload_file('esalary_slip');
	// $reliving = upload_file('ereliving');
	// $experience_latter = upload_file('eexperience_latter');
	
	$empFirstName = sanitize_text_field($_POST['efirstName']);
	$empLastName = sanitize_text_field($_POST['elastName']);
	$empMobile = sanitize_text_field($_POST['emobile']);
	$empEmail = sanitize_text_field($_POST['eemail']);
	$empPass  =$_POST['password'];
	$empPass  ='';
	$empRole = $_POST['role'];
	$empDob = sanitize_text_field($_POST['edob']);
	$empMaritalStatus = sanitize_text_field($_POST['emarital_status']);
	$empGendar = sanitize_text_field($_POST['egendar']);
	$empNationality = sanitize_text_field($_POST['enationality']);
	$empAddress = sanitize_text_field($_POST['eaddress']);
	$empCity = sanitize_text_field($_POST['ecity']);
	$empState = sanitize_text_field($_POST['eState']);
	$empPin = sanitize_text_field($_POST['epin']);
	$empId = sanitize_text_field($_POST['emp_id']);
	$empUserName = sanitize_text_field($_POST['eusername']);
	$emptye		=sanitize_text_field( $_POST['etype'] );
	$empdepart	=sanitize_text_field( $_POST['edepart'] );
	$empDesignation = sanitize_text_field($_POST['edesignation']);
	$empworkingdays = $_POST['eday'];
    $empWdays = implode( ',',$empworkingdays);
    $empdays = sanitize_text_field( $empWdays );
	$empJoin = sanitize_text_field($_POST['ejoin']);
	$empLocation = sanitize_text_field($_POST['elocation']);
	$empAccessEmail = sanitize_text_field($_POST['eaccessEmail']);
	$empSlackId = sanitize_text_field($_POST['eslackId']);
	$empSkypeId = sanitize_text_field($_POST['eskypeId']);
	$empGithub = sanitize_text_field($_POST['egitHub']);
	$empStatus = sanitize_text_field( ($_POST['emp_status']) );
	$user_id = wp_create_user($empUserName, $password, $empEmail);
	$data = array(
		'user_id' => $user_id,
		'emp_mobile' => $empMobile,
		'emp_dob' => $empDob,
		'emp_marital_status' => $empMaritalStatus,
		'emp_gender' => $empGendar,
		'emp_national' => $empNationality,
		'emp_address' => $empAddress,
		'emp_city' => $empCity,
		'emp_state' => $empState,
		'emp_pin' => $empPin,
		'emp_Id' => $empId,
		'emp_username' => $empUserName ,
		'emp_type' 		=> $emptye,
		'emp_department' 	=> $empdepart,
		'emp_designation' => $empDesignation,
		'emp_working_days' =>   $empdays,
		'emp_joining_date' => $empJoin,
		'emp_location' => $empLocation,
		'emp_appointment' => $appoinment_letter,
		'emp_salaryslip' => $salary_slip,
		'emp_reliving' => $reliving,
		'emp_experience' => $experience_latter,
		'emp_slack' => $empSlackId, 
		'emp_skype' => $empSkypeId,
		'emp_github' => $empGithub,
		'emp_status' => $empStatus,
	);


	 if (!is_wp_error($user_id)) {
        update_user_meta($user_id, 'first_name', $empFirstName);
        update_user_meta($user_id, 'last_name', $empLastName);
        wp_update_user(array('ID' => $user_id, 'role' => $empRole));
        update_user_meta($user_id, 'wp_user_avatar', $empImage);

       $test = $wpdb->insert(
		$table_prefix.'employee',
		$data
		);
       	if($test == 0){
       		echo 'ok';
			wp_die();
       	}
        // echo json_encode(array('success' => true));
		
		} else {
			// echo  $user_id->get_error_message();
			 $user_id->get_error_message();
			wp_die();
		}

	}	
}

/*
* Get Employee
*/


if(isset($_GET['emp_pro'])){
global $wpdb;
$table_name= $wpdb->prefix .  'employee';
$emp_ID=  $_GET['emp_pro'];

$query = $wpdb->prepare("SELECT * FROM $table_name 
	WHERE ID = %d", $emp_ID);
$row = $wpdb->get_row($query, ARRAY_A);

$emp_ID = $row['ID'];
$emp_user_id = $row['user_id'];
$emp_mobile = $row['emp_mobile'];
$emp_dob = $row['emp_dob'];
// $emp_mail = $row[''];
$emp_marital_status = $row['emp_marital_status'];
$emp_gender = $row['emp_gender'];
$emp_national = $row['emp_national'];
$emp_address = $row['emp_address'];
$emp_city = $row['emp_city'];
$emp_state = $row['emp_state'];
$emp_pin = $row['emp_pin'];
$emp_Id = $row['emp_Id'];
$emp_username = $row['emp_username'];
$emp_type = $row['emp_type'];
$emp_department = $row['emp_department'];
$emp_designation = $row['emp_designation'];
$emp_working_days = $row['emp_working_days'];
$emp_joining_date = $row['emp_joining_date'];
$emp_location = $row['emp_location'];
$emp_appointment = $row['emp_appointment'];
$emp_salaryslip = $row['emp_salaryslip'];
$emp_reliving = $row['emp_reliving'];
$emp_experience = $row['emp_experience'];
$emp_slack = $row['emp_slack'];
$emp_skype = $row['emp_skype'];
$emp_github = $row['emp_github'];
$emp_status = $row['emp_status'];

}

