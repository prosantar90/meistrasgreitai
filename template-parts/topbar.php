<?php
global $current_user;
$user_ID = $current_user->ID;
$userData= get_userdata( $user_ID );
$firstName = get_user_meta( $user_ID, 'first_name', true);
$lastName = get_user_meta( $user_ID, 'last_name', true);
$user_roles = $userData->roles;
?>
<div class="container-fluid g-0">
	<div class="row">
		<div class="col-lg-12 p-0 ">
			<div class="header_iner d-flex justify-content-between align-items-center">
				<div class="line_icon open_miniSide d-none d-lg-block">
					<h4 class="f_s_15 f_w_500 mb-0">Hello <?= $firstName;?> 👋🏻</h4>
					<p>
						<?php 
						/** Greetings */ 
						greetings_code();
						?>
					</p>
				</div>
				<div class="header_right d-flex justify-content-between align-items-center">
					<div class="header_notification_warp d-flex align-items-center">
						<li>
							<a class="CHATBOX_open nav-link-notify" href="#"> <img src="<?= get_template_directory_uri();?>/assets/img/icon/msg.svg" alt> </a>
						</li>
						<li>
							<a class="bell_notification_clicker nav-link-notify" href="#"> <img src="<?= get_template_directory_uri();?>/assets/img/icon/bell.svg" alt>
							</a>

							<div class="Menu_NOtification_Wrap">
								<div class="notification_Header">
									<h4>Notifications</h4>
								</div>
								<div class="Notification_body">

									<div class="single_notify d-flex align-items-center">
										<div class="notify_thumb">
											<a href="#"><img src="<?= get_template_directory_uri();?>/assets/img/staf/2.png" alt></a>
										</div>
										<div class="notify_content">
											<a href="#"><h5>Cool Marketing </h5></a>
											<p>Lorem ipsum dolor sit amet</p>
										</div>
									</div>

									<div class="single_notify d-flex align-items-center">
										<div class="notify_thumb">
											<a href="#"><img src="<?= get_template_directory_uri();?>/assets/img/staf/4.png" alt></a>
										</div>
										<div class="notify_content">
											<a href="#"><h5>Awesome packages</h5></a>
											<p>Lorem ipsum dolor sit amet</p>
										</div>
									</div>

									<div class="single_notify d-flex align-items-center">
										<div class="notify_thumb">
											<a href="#"><img src="<?= get_template_directory_uri();?>/assets/img/staf/3.png" alt></a>
										</div>
										<div class="notify_content">
											<a href="#"><h5>what a packages</h5></a>
											<p>Lorem ipsum dolor sit amet</p>
										</div>
									</div>

									<div class="single_notify d-flex align-items-center">
										<div class="notify_thumb">
											<a href="#"><img src="<?= get_template_directory_uri();?>/assets/img/staf/2.png" alt></a>
										</div>
										<div class="notify_content">
											<a href="#"><h5>Cool Marketing </h5></a>
											<p>Lorem ipsum dolor sit amet</p>
										</div>
									</div>

									<div class="single_notify d-flex align-items-center">
										<div class="notify_thumb">
											<a href="#"><img src="<?= get_template_directory_uri();?>/assets/img/staf/4.png" alt></a>
										</div>
										<div class="notify_content">
											<a href="#"><h5>Awesome packages</h5></a>
											<p>Lorem ipsum dolor sit amet</p>
										</div>
									</div>

									<div class="single_notify d-flex align-items-center">
										<div class="notify_thumb">
											<a href="#"><img src="<?= get_template_directory_uri();?>/assets/img/staf/3.png" alt></a>
										</div>
										<div class="notify_content">
											<a href="#"><h5>what a packages</h5></a>
											<p>Lorem ipsum dolor sit amet</p>
										</div>
									</div>
								</div>
								<div class="nofity_footer">
									<div class="submit_button text-center pt_20">
										<a href="#" class="btn_1 green">See More</a>
									</div>
								</div>
							</div>

						</li>
					</div>
					<div class="profile_info d-flex align-items-center">
						<div class="profile_thumb mr_20">
							<img src="<?= get_template_directory_uri();?>/assets/img/transfer/4.png" alt="#">
						</div>
						<div class="author_name">
							<h4 class="f_s_15 f_w_500 mb-0"><?= $firstName .' '.$lastName;?></h4>
							<p class="f_s_12 f_w_400"><?php echo technodemo_current_user_role_name();?></p>
						</div>
						<div class="profile_info_iner">
							<div class="profile_author_name">
								<p><?php echo technodemo_current_user_role_name();?></p>
								<h5><?= $firstName .' '.$lastName;?></h5>
							</div>
							<div class="profile_info_details">
								<a href="#">My Profile </a>
								<a href="#">Settings</a>
								<a href="<?php echo wp_logout_url(); ?>">Log Out </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>