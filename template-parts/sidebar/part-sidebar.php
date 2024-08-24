<nav class="sidebar">
		<div class="logo d-flex justify-content-between">
			<a class="large_logo" href="index.html"><img src="<?= get_stylesheet_directory_uri();?>/assets/img/logo_white.png" alt></a>
			<a class="small_logo" href="index.html"><img src="<?= get_stylesheet_directory_uri();?>/assets/img/mini_logo.png" alt></a>
			<div class="sidebar_close_icon d-lg-none">
				<i class="ti-close"></i>
			</div>
		</div>
		<ul id="sidebar_menu">
			<li class>
				<a class="has-arrow" href="#" aria-expanded="false">
					<div class="nav_icon_small">
					<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/1.svg" alt>
					</div>
					<div class="nav_title">
						<span>Dashboard</span>
					</div>
				</a>
				<ul>
					<li><a href="<?= home_url('general-overview');?>">General Overview</a></li>
					<li><a href="<?= home_url( 'latest-projects');?>">Latest Projects</a></li>
					<li><a href="<?= home_url( 'key-news');?>">Key News</a></li>
					<li><a href="<?= home_url( 'key-news');?>">
						<?php get_template_part( 'template-parts/partners/part-sidebar' ); ?>
					</a></li>
				</ul>
			</li>

			<li class>
				<a class="has-arrow" href="#" aria-expanded="false">
					<div class="nav_icon_small">
					<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/leave.svg" alt>
					</div>
					<div class="nav_title">
						<span>Projects</span>
					</div>
				</a>
				<ul>
					<li><a href="<?= home_url( 'assigned-projects');?>">Assigned Projects</a></li>
					<li><a href="<?= home_url( 'completed-works');?>">Completed Works</a></li>
					<li><a href="<?= home_url( 'pending-works');?>">Pendings Works</a></li>
				</ul>
			</li>

			<li class>
				<a class="has-arrow" href="#" aria-expanded="false">
					<div class="nav_icon_small">
					<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/leave.svg" alt>
					</div>
					<div class="nav_title">
						<span>Contracts</span>
					</div>
				</a>
				<ul>
					<li><a href="<?= home_url( 'contract-awaiting-approval');?>">Contracts Awaiting Approval</a></li>
				</ul>
			</li>

			<li class>
				<a class="has-arrow" href="#" aria-expanded="false">
					<div class="nav_icon_small">
					<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/leave.svg" alt>
					</div>
					<div class="nav_title">
						<span>Invoices and Payments</span>
					</div>
				</a>
				<ul>
					<li><a href="#">Issued Invoices</a></li>
					<li><a href="#">Payment History</a></li>
					<li><a href="#">Balances and Debts</a></li>
				</ul>
			</li>

			<li class>
				<a class="has-arrow" href="#" aria-expanded="false">
					<div class="nav_icon_small">
					<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/leave.svg" alt>
					</div>
					<div class="nav_title">
						<span>Communication</span>
					</div>
				</a>
				<ul>
					<li><a href="#">Internal Messages</a></li>
					<li><a href="#">Client Messages</a></li>
				</ul>
			</li>

			<li class>
				<a class="has-arrow" href="#" aria-expanded="false">
					<div class="nav_icon_small">
					<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/leave.svg" alt>
					</div>
					<div class="nav_title">
						<span>Documents</span>
					</div>
				</a>
				<ul>
					<li><a href="#">Project Reports</a></li>
					<li><a href="#">Technical Drawings</a></li>
					<li><a href="#">Other Important Documents</a></li>
				</ul>
			</li>
			
			<li class>
				<a href="<?= home_url('settings');?>" aria-expanded="false">
					<div class="nav_icon_small">
						<img src="<?= get_stylesheet_directory_uri();?>/assets/img/menu-icon/gear.svg" alt>
					</div>
					<div class="nav_title">
						<span>Settings</span>
					</div>
				</a>
			</li>
		</ul>
	</nav>