<?php
/**
 * Template Name: Employees List
 */
if( ! is_user_logged_in()){
	wp_redirect( home_url( '/login' ));
}else{
    get_header();
    get_sidebar();
}
?>
<section class="main_content dashboard_part large_header_bg">
    <?php get_template_part('template-parts/topbar');?>
    <div class="main_content_iner overly_inner ">
       <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
        <div class="col-md-12">
            <div class="page_title_left">
                <h3 class="mb-0">Dashboard</h3>
                <p>Dashboard /Partnerio List</p>
            </div>
        </div>  
    </div>
    <div class="white_card">
        <div class="col-md-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="col-md-3 d-flex justify-content-start">
                 <a  href="<?= home_url( '/registration' );?>" id="add_emp" type="button" class="btn btn-primary">
                    <i class="ti-plus"></i>
                    Add New Partners
                </a>
            </div>
                <div class="col-md-4">
                    <div class="page_title_left">
                        <!-- <div class="form-group">
                            <input type="text" name="emp_s" id="" class="form-control">
                        </div> -->
                    </div>
                </div>
                
        </div>
    </div>
    <div class="col-md-12">
        <table class="table  b-0" id="partners">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>El. Pašto adresas:</th>
                    <th>Telefono numeris:</th>
                    <th>Nuotraukos</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $prepared_query ="SELECT * FROM {$wpdb->prefix}partners";
                $results = $wpdb->get_results($prepared_query);
                if(!empty($results) ){
                foreach($results as $row){
                    // $emp_id = $row->user_id;
                    // $firstName = get_user_meta( $emp_id, 'first_name', true);
                    // $lastName = get_user_meta( $emp_id, 'last_name', true);

                    ?>                
                <tr>
                    <td>
                        <span><?= $row->vardas;?></span>
                    </td>
                    <td><?= $row->ID;?></td>
                    <td><?= $row->el;?></td>
                    <td><?= $row->telifono?></td>
                    <td>
                        <img style="width: 60px;" src="<?= $row->nuotrau;?>" alt="<?= $row->nuotrau;?>">
                    </td>
                    <td><span class="badge badge-bg">Parmanent</span> </td>
                    <td>
                        <a href="<?= home_url( '/emp-profile')?>?emp_pro=<?= $row->ID;?>" class="icon"><i class="ti-eye"></i></a>
                        <a href="#" class="icon"><i class="ti-pencil"></i></a>
                        <a href="#" class="icon"><i class="ti-trash"></i></a>

                    </td>
                </tr>
                <?php }
            }else{?>
                    <td>No Record Found</td>
            <?php }?>
            </tbody>
        </table>
    </div>


</div>
</div>

</section>
<?php get_footer();