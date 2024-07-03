<?php 
if( ! is_user_logged_in()){
    wp_redirect( home_url( '/login' ));
}else{
    get_header();
    get_sidebar();
    // global tech_get_userdata();
}
global $emp_user_id;
$firstName = get_user_meta( $emp_user_id, 'first_name', true);
$lastName = get_user_meta( $emp_user_id, 'last_name', true);
?>
<div class="white_body"> 
    <div class="col-md-12 rounded">
        <div class="bulder_tab_wrapper">
            <ul class="nav" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="personal_info_tab" data-bs-toggle="tab" href="#personal_info" role="tab" aria-controls="personal_info" aria-selected="true"><i class="ti-user"></i> Personal Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="professional_tab" data-bs-toggle="tab" href="#professional" role="tab" aria-controls="profile" aria-selected="false"><i class="ti-briefcase"></i> Professional Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="documents_tab" data-bs-toggle="tab" href="#Documents" role="tab" aria-controls="Documents" aria-selected="false"><i class="ti-receipt"></i> Documents</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="acc_access" data-bs-toggle="tab" href="#account_access" role="tab" aria-controls="account_access" aria-selected="false"><i class="ti-lock"></i> Account Access</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="col-md-12">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="personal_info" role="tabpanel" aria-labelledby="personal_info_tab">
             <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">First Name</div>
                    <p>Brooklyn</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Last Name</div>
                    <p>Brooklyn</p>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Last Name</div>
                    <p>Simmons</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Mobile Number</div>
                    <p><?= $lastName; ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Email Address</div>
                    <p>xyz@gmail.com</p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Date Of Birth</div>
                    <p><?= $lastName; ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Marital Status</div>
                    <p><?= $lastName; ?></p>
                </div>  
                 <div class="col-md-6 mb-3">
                    <div class="text-muted label">Gender</div>
                    <p><?= $lastName; ?></p>
                </div>  
                 <div class="col-md-6 mb-3">
                    <div class="text-muted label">Nationaliy</div>
                    <p><?= $lastName; ?></p>
                </div>  
                 <div class="col-md-6 mb-3">
                    <div class="text-muted label">Address</div>
                    <p><?= $lastName; ?></p>
                </div>  
                 <div class="col-md-6 mb-3">
                    <div for="lastName">City</div>
                    <p><?= $lastName; ?></p>
                </div> 
                <div class="col-md-6 mb-3">
                    <div class="text-muted label">Sate</div>
                    <p><?= $lastName; ?></p>
                </div> 
                 <div class="col-md-6 mb-3">
                    <div class="text-muted label">Pincode</div>
                    <p><?= $lastName; ?></p>
                </div>                

            </div> 

        </div>
        <div class="tab-pane fade" id="professional" role="tabpanel" aria-labelledby="professional_tab">
            <?php //get_template_part( 'template-parts/emp-register/proffesional-info');?>
        </div>

    </div>
</div>
</div>