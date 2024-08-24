<?php
add_action('init','partner_register');
function partner_register(){
    if (isset($_POST['action']) && $_POST['action'] === 'register_partner') {
        
        global $wpdb;
        $table_name = $wpdb->prefix . 'partners';
        // Sanitize and validate form data
        $user_role = 'partners';
        $vardas = sanitize_text_field($_POST['vardas']);
        $pavarde = sanitize_text_field($_POST['pavarde']);
        $imones = sanitize_text_field($_POST['imones']);
        $pvm = sanitize_text_field($_POST['pvm']);
        $el = sanitize_email($_POST['el']);
        $telifono = sanitize_text_field($_POST['telifono']);
        $darbu = sanitize_textarea_field($_POST['darbu']);
        $vietove = sanitize_text_field($_POST['vietove']);
        $darbuoto = sanitize_text_field($_POST['darbuoto']);
        $galimos = sanitize_text_field($_POST['galimos']);
        $statybose = sanitize_text_field($_POST['statybose']);
        $paslaug = sanitize_textarea_field($_POST['paslaug']);
        $jums = sanitize_textarea_field($_POST['jums']);
        $netimkami = sanitize_textarea_field($_POST['netimkami']);
        $papildoma = sanitize_textarea_field($_POST['papildoma']);
        $password = '';
        // Validate required fields
        $required_fields = [
            'vardas' => $vardas,
            'pavarde' => $pavarde,
            'imones' => $imones,
            'el' => $el,
            'telifono' => $telifono,
        ];

        $missing_fields = [];
        foreach ($required_fields as $field_name => $field_value) {
            if (empty($field_value)) {
                $missing_fields[] = $field_name;
            }
        }

        if (!empty($missing_fields)) {
            wp_die('The following fields are required: ' . implode(', ', $missing_fields));
        }

        // Validate email format and check if email already exists
        if (!is_email($el)) {
            wp_die('Invalid email format.');
        }

        if (email_exists($el)) {
            wp_die('This email is already registered.');
        }

        // Handle file uploads
        $upload_dir = wp_upload_dir();
        $nuotrau_url = '';
        $brezin_url = '';

        if (!empty($_FILES['nuotrau']['name'])) {
            $nuotrau_url = handle_file_upload($_FILES['nuotrau'], $upload_dir['path']);
        }
        if (!empty($_FILES['brezin']['name'])) {
            $brezin_url = handle_file_upload($_FILES['brezin'], $upload_dir['path']);
        }

        $user_id = wp_create_user($vardas,$password, $el);

        $data = array(
            'user_id' => $user_id,
            'vardas' => $vardas,
            'pavarde' => $pavarde,
            'imones' => $imones,
            'pvm' => $pvm,
            'el' => $el,
            'telifono' => $telifono,
            'darbu' => $darbu,
            'vietove' => $vietove,
            'darbuoto' => $darbuoto,
            'galimos' => $galimos,
            'statybose' => $statybose,
            'paslaug' => $paslaug,
            'jums' => $jums,
            'netimkami' => $netimkami,
            'papildoma' => $papildoma,
            'nuotrau' => $nuotrau_url,
            'brezin' => $brezin_url
        );



        // Insert data into the custom table
        if(! is_wp_error($user_id)){
            update_user_meta($user_id,'first_name',$vardas );
            update_user_meta($user_id,'last_name',$pavarde);
            wp_update_user(array('ID' => $user_id, 'role' => $user_role));

            $run= $wpdb->insert(
                $table_name,
                $data
            );
            if($run){
                echo 'ok';
                wp_die();
            }
            
        }
}

/**
 * Get Partnar details using ajax */ 
if (isset($_GET['part_id'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'partners';
    $id = checkInput($_GET['part_id']);
    
    // Prepare and execute the query using $wpdb
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE ID = %d", $id);
    $row = $wpdb->get_row($query, ARRAY_A);
    
    if ($row) {
        echo json_encode($row);
        exit();
    } else {
        echo 'Something went wrong';
    }
}

if(isset($_POST['part_del_id'])){
    global $wpdb;
    $table_name = $wpdb->prefix . 'partners';
    $user_id = $_POST['part_del_id'];

    // Retrieve current image URLs from the database
    $current_partner = $wpdb->get_row($wpdb->prepare("SELECT nuotrau, brezin FROM {$table_name} WHERE user_id = %d", $user_id));
    if ($current_partner) {
        // Delete the images from the uploads folder
        $upload_dir = wp_upload_dir();
        
        if (!empty($current_partner->nuotrau)) {
            $old_nuotrau_path = str_replace($upload_dir['url'], $upload_dir['path'], $current_partner->nuotrau);
            if (file_exists($old_nuotrau_path)) {
                unlink($old_nuotrau_path);
            }
        }

        if (!empty($current_partner->brezin)) {
            $old_brezin_path = str_replace($upload_dir['url'], $upload_dir['path'], $current_partner->brezin);
            if (file_exists($old_brezin_path)) {
                unlink($old_brezin_path);
            }
        }

        // Delete the partner data from the database
        $deleted = $wpdb->delete($table_name, array('user_id' => $user_id));

        if ($deleted) {
            // Optionally, delete the user as well
            $user_delete= wp_delete_user($user_id);
            if ($user_delete) {
                echo 'ok';
                die();
            }else{
                echo 'Kažkas nutiko';
                die();
            }
        } else {
            echo 'Nepavyko ištrinti partnerio duomenų.';
            die();
        }
    } else {
        echo 'Partneris nerastas.';
        die();
    }
      
}


/**
 * View Part Trough id Ajax
 */

 if (isset($_GET['part_view'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'partners';
    $id = checkInput($_GET['part_view']);
    
    // Prepare and execute the query using $wpdb
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE ID = %d", $id);
    $row = $wpdb->get_row($query, ARRAY_A);
     if ($row) {
        $vardas = $row['vardas'];
    }
 }


}
function handle_file_upload($file, $upload_dir) {
    $uploadedfile = $file;
    $upload_overrides = ['test_form' => false];
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

    if ($movefile && !isset($movefile['error'])) {
        return $movefile['url'];
    } else {
        // Handle the error
        return false;
    }
}

function meis_errors(){
    static $wp_error;
    return isset($wp_error) ? $wp_error : ($wp_error =new WP_Error(null, null, null));

}



$vardas    = '';
$pavarde   = '';
$imones    = '';
$pvm 	   = '';
$el        = '';
$telifono  = '';
$darbu     = '';
$vietove   = '';
$darbuoto  = '';
$galimos   = '';
$statybose = '';
$paslaug   = '';
$jums      = '';
$netimkami = '';
$papildoma = '';
$nuotrau   = '';
$brezin    = '';
$pupdate =  false;

 if (isset($_GET['part_view'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'partners';
    $id = checkInput($_GET['part_view']);
    
    // Prepare and execute the query using $wpdb
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE ID = %d", $id);
    $row = $wpdb->get_row($query, ARRAY_A);
    $ID = $row['ID'];
    $user_id = $row['user_id'];
    $vardas = $row['vardas'];
    $pavarde = $row['pavarde'];
    $imones = $row['imones'];
    $pvm = $row['pvm'];
    $el = $row['el'];
    $telifono = $row['telifono'];
    $darbu = $row['darbu'];
    $vietove = $row['vietove'];
    $darbuoto = $row['darbuoto'];
    $galimos = $row['galimos'];
    $statybose = $row['statybose'];
    $paslaug = $row['paslaug'];
    $jums = $row['jums'];
    $netimkami = $row['netimkami'];
    $papildoma = $row['papildoma'];
    $nuotrau = $row['nuotrau'];
    $nuotrau1= basename($nuotrau);

    $brezin = $row['brezin'];
    $brezin1 = basename($brezin);

    $pupdate= true;
 }

 /**
  * Update Query using ajax
  */
   if (isset($_POST['action']) && $_POST['action'] === 'update_partner') {
         global $wpdb;
        $table_name = $wpdb->prefix . 'partners';
        $ID = checkInput($_POST['ID']);
        $user_id= checkInput($_POST['user_id']);
        // Sanitize and validate form data (reusing your code)
        $vardas = sanitize_text_field($_POST['vardas']);
        $pavarde = sanitize_text_field($_POST['pavarde']);
        $imones = sanitize_text_field($_POST['imones']);
        $pvm = sanitize_text_field($_POST['pvm']);
        $el = sanitize_email($_POST['el']);
        $telifono = sanitize_text_field($_POST['telifono']);
        $darbu = sanitize_textarea_field($_POST['darbu']);
        $vietove = sanitize_text_field($_POST['vietove']);
        $darbuoto = sanitize_text_field($_POST['darbuoto']);
        $galimos = sanitize_text_field($_POST['galimos']);
        $statybose = sanitize_text_field($_POST['statybose']);
        $paslaug = sanitize_textarea_field($_POST['paslaug']);
        $jums = sanitize_textarea_field($_POST['jums']);
        $netimkami = sanitize_textarea_field($_POST['netimkami']);
        $papildoma = sanitize_textarea_field($_POST['papildoma']);

        // Handle file uploads (if any)
        $upload_dir = wp_upload_dir();
        $nuotrau_url = '';
        $brezin_url = '';

        // Retrieve current image URLs from the database
        $current_partner = $wpdb->get_row($wpdb->prepare("SELECT nuotrau, brezin FROM {$table_name} WHERE user_id = %d", $user_id));

        if (!empty($_FILES['nuotrau']['name'])) {
            $nuotrau_url = handle_file_upload($_FILES['nuotrau'], $upload_dir['path']);
            if ($nuotrau_url && !empty($current_partner->nuotrau)) {
                // Delete the old image
                $old_nuotrau_path = str_replace($upload_dir['url'], $upload_dir['path'], $current_partner->nuotrau);
                if (file_exists($old_nuotrau_path)) {
                    unlink($old_nuotrau_path);
                }
            }
        }
        if (!empty($_FILES['brezin']['name'])) {
            $brezin_url = handle_file_upload($_FILES['brezin'], $upload_dir['path']);
            if ($brezin_url && !empty($current_partner->brezin)) {
                // Delete the old image
                $old_brezin_path = str_replace($upload_dir['url'], $upload_dir['path'], $current_partner->brezin);
                if (file_exists($old_brezin_path)) {
                    unlink($old_brezin_path);
                }
            }
        }


        // Prepare data array
        $data = array(
            'vardas' => $vardas,
            'pavarde' => $pavarde,
            'imones' => $imones,
            'pvm' => $pvm,
            'el' => $el,
            'telifono' => $telifono,
            'darbu' => $darbu,
            'vietove' => $vietove,
            'darbuoto' => $darbuoto,
            'galimos' => $galimos,
            'statybose' => $statybose,
            'paslaug' => $paslaug,
            'jums' => $jums,
            'netimkami' => $netimkami,
            'papildoma' => $papildoma,
        );

        // Include the URLs only if they exist (file uploads)
        if ($nuotrau_url) {
            $data['nuotrau'] = $nuotrau_url;
        }
        if ($brezin_url) {
            $data['brezin'] = $brezin_url;
        }

        // Specify where to update (based on user ID)
        $where = array('user_id' => $user_id);

        // Perform the update query
        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            // Update was successful, now update user meta
            update_user_meta($user_id, 'first_name', $vardas);
            update_user_meta($user_id, 'last_name', $pavarde);
            
            echo 'ok';
            die();
        } else {
            // Handle error
            echo 'Update failed';
            wp_die();
        }
   }