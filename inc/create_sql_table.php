<?php
// Function to check and create custom tables in the WordPress database
function check_custom_table_exists() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    // Define table creation SQL statements
    $tables = array(
        'partners' => "CREATE TABLE {$wpdb->prefix}partners (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            user_id int(11) NOT NULL,
            vardas varchar(255) NOT NULL,
            pavarde varchar(255) NOT NULL,
            imones varchar(255) DEFAULT '' NOT NULL,
            pvm varchar(255) DEFAULT '' NOT NULL,
            el varchar(255) NOT NULL,
            telifono varchar(255) DEFAULT '' NOT NULL,
            darbu text NOT NULL,
            vietove varchar(255) DEFAULT '' NOT NULL,
            darbuoto varchar(255) DEFAULT '' NOT NULL,
            galimos varchar(255) DEFAULT '' NOT NULL,
            statybose varchar(255) DEFAULT '' NOT NULL,
            paslaug text NOT NULL,
            jums text NOT NULL,
            netimkami text NOT NULL,
            papildoma text NOT NULL,
            nuotrau varchar(255) DEFAULT '' NOT NULL,
            brezin varchar(255) DEFAULT '' NOT NULL,
            partner_status int(11) NOT NULL
            PRIMARY KEY (ID)
        ) $charset_collate;",
        
        'order_assignments' => "CREATE TABLE {$wpdb->prefix}order_assignments (
            ID int(11) NOT NULL AUTO_INCREMENT,
            order_id int(11) NOT NULL,
            partner_id int(11) NOT NULL,
            created timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            status enum('assigned','accepted','declined','') NOT NULL DEFAULT 'assigned',
            end_assign datetime NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;"
    );
    
    // Include WordPress upgrade script
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    // Loop through each table and execute the SQL statement
    foreach ($tables as $table_name => $sql) {
        // Drop the table if it exists
        // $drop_sql = "DROP TABLE IF EXISTS {$wpdb->prefix}$table_name;";
        // $wpdb->query($drop_sql);
        
        // Create the table
        dbDelta($sql);
    }
}

// Hook the function to run after the theme has been set up
add_action('after_switch_theme', 'check_custom_table_exists');