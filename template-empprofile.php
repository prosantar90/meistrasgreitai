<?php
/**
 * Template Name: Employee Profile
 */
if( ! is_user_logged_in()){
    wp_redirect( home_url( '/login' ));
}else{
    get_header();
    get_sidebar();
    // global tech_get_userdata();
}
 require_once 'functions.php';
$firstName = get_user_meta( $emp_user_id, 'first_name', true);
$lastName = get_user_meta( $emp_user_id, 'last_name', true);
// $emp_mail =
?>
<section class="main_content dashboard_part large_header_bg">
    <?php get_template_part('template-parts/topbar');?>
    <div class="main_content_iner overly_inner ">
       <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
        <div class="col-md-12">
            <div class="page_title_left">
                <h3 class="mb-0"><?= $firstName .' '. $lastName;?></h3>
                <p>All Employee / <?= $firstName .' '. $lastName;?></p>
            </div>
        </div>  
    </div>
    <div class="white_card">
        <div class="col-md-12">
            <div class="white_card_header d-flex flex-wrap align-items-center justify-content-between">
                <div class="col-md-2">
                    <div class="page_title_left">
                        <img class="rounded" src="<?= get_template_directory_uri(); ?>/assets/img/profilebox/7.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3><?= $firstName .' '. $lastName?></h2>
                        <p><i class="ti-briefcase"></i> <?= $emp_department?> </p>
                        <p><i class="ti-email"></i> test@gmail.com</p>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end align-items-bottom">
                        <a href="#" class="btn btn-primary"><i class="ti-pencil-alt"></i>  Edit Profile</a>
                    </div>
                </div>
                <div class="white_body d-flex"> 
                    <div class="col-md-3 rounded">
                            <div class="nav nav-tabs nav-pills flex-column" id="nav-tab" role="tablist">
                                <button class="nav-link text-left active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true"><i class="ti-user"></i> Profile</button>
                                <button class="nav-link text-left" id="nav-attendance-tab" data-bs-toggle="tab" data-bs-target="#nav-attendance" type="button" role="tab" aria-controls="nav-attendance" aria-selected="false"><i class="ti-check-box"></i> Attendance</button>
                                <button class="nav-link text-left" id="nav-projects-tab" data-bs-toggle="tab" data-bs-target="#nav-projects" type="button" role="tab" aria-controls="nav-projects" aria-selected="false"><i class="ti-book"></i> Project</button>
                                 <button class="nav-link text-left" id="nav-leave-tab" data-bs-toggle="tab" data-bs-target="#nav-leave" type="button" role="tab" aria-controls="nav-leave" aria-selected="false"><i class="ti-comment"></i> Leave</button>
                            </div>
                    </div>
                    <div class="col-md-9">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <?php include_once 'template-parts/emp-profile/profile.php' ?>
                      </div>
                      <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab">
                          <?php get_template_part( 'template-parts/emp-profile/attendance');?>
                      </div>
                      <div class="tab-pane fade" id="nav-projects" role="tabpanel" aria-labelledby="nav-projects-tab">
                           <?php get_template_part( 'template-parts/emp-profile/projects');?>
                      </div>
                        <div class="tab-pane fade" id="nav-leave" role="tabpanel" aria-labelledby="nav-leave-tab">
                           <?php get_template_part( 'template-parts/emp-profile/leave');?>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">

    </div>
</div>
</div>
<?php get_footer();