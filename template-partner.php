<?php
/**
 * Template Name: Partnerių sąrašas
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
                <h3 class="mb-0"><?= esc_html_e('Prietaisų skydelis','mei');?></h3>
                <p><?= esc_html_e('Prietaisų skydelis /Partnerio List','mei');?></p>
            </div>
        </div>  
    </div>
    <div class="white_card">
        <div class="col-md-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <div class="col-md-3 d-flex justify-content-start">
                 <a  href="<?= home_url( '/registration' );?>" id="add_emp" type="button" class="btn btn-primary">
                    <i class="ti-plus"></i>
                  <?= esc_html_e('Pridėti naujų partnerių','mei');?>
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
                    <th><?= esc_html_e('Vardas','mei');?></th>
                    <th><?= esc_html_e('ID','mei');?></th>
                    <th><?= esc_html_e('El. Pašto adresas:','mei');?></th>
                    <th><?= esc_html_e('Telefono numeris:','mei');?></th>
                    <th><?= esc_html_e('Nuotraukos','mei');?></th>
                    <th><?= esc_html_e('Status','mei');?></th>
                    <th><?= esc_html_e('Action','mei');?></th>
                </tr>
            </thead>
            <?php 
                $prepared_query ="SELECT * FROM {$wpdb->prefix}partners";
                $results = $wpdb->get_results($prepared_query);
                if(!empty($results) ){?>
            <tbody>
                <?php
                foreach($results as $row){
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
                        <a class="icon badge" id="part_details" data-id="<?= $row->ID;?>" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view_partner"><i class="ti-eye"></i></a>
                        <a class="icon badge" href="<?= home_url( '/view-partner/')?>?part_view=<?= intval($row->ID);?>"><i class="ti-share"></i></a>
                        <a class="icon badge" href="<?= home_url( '/registration/')?>?part_view=<?= intval($row->ID);?>"><i class="ti-pencil"></i></a>
                        <a class="icon badge" id="delete-part" href="javascript:void(0)" data-id=<?= intval($row->user_id);?> ><i class="ti-trash"></i></a>

                    </td>
                </tr>
                <?php }?>
            </tbody>
            <?php }else{?>
                    <td><?php esc_html_e('No Record Found','mei');?></td>
            <?php }?>
        </table>
    </div>
</div>
</div>
</section>

<!-- Popup For view partner -->
 <div class="modal fade" id="view_partner" tabindex="-1" role="dialog" aria-labelledby="view_partnerTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="view_partnerTitle"><?= esc_html_e('Partnerio informacija','mei');?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <p><?php esc_html_e('Pilnas vardas:','mei')?> <span id="name"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p><?php esc_html_e('Id:','mei')?> <span id="ID"></span></p>
                    </div>
                     <div class="col-md-4">
                        <p><?php esc_html_e('El:','mei')?> <span id="el"></span></p>
                    </div>
                    <div class="col-md-4">
                        <p><?php esc_html_e('Telefono numeris:','mei')?> <span id="teli"></span></p>
                    </div>

                      <div class="col-md-4">
                        <p><?php esc_html_e('Įmonės pavadinimas:','mei')?> <span id="imo"></span></p>
                    </div>
                     <div class="col-md-4">
                        <p><?php esc_html_e('PVM mokėtojo kodas:','mei')?> <span id="pvm"></span></p>
                    </div>
                     <div class="col-md-6">
                        <p><?php esc_html_e("Nuotraukos ar vizualizacijos:", "mei"); ?></p>
                        <img class="img-thumbnail" src="" id="nuotrau" alt="">
                    </div>
                    <div class="col-md-6">
                        <p>
                            <?php esc_html_e('Brėžiniai ar kiti priedai:: ','mei');?>
                            <img class="img-thumbnail" id="brezin" src="">
                        </p>
                    </div>
                   
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer();