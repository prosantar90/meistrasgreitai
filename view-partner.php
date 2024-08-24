<?php 
/**
 * Template Name: View Partner
 */

get_header();
get_sidebar()?>
<section class="main_content dashboard_part large_header_bg">
   <div class="container-fluid g-0">
   <?php get_template_part("template-parts/topbar"); ?>
   <div class="main_content_iner overly_inner ">
      <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
         <div class="col-md-12 mb-3">
            <div class="page_title_left">
               <h3 class="mb-0"><?php esc_html_e("Žiūrėti partnerį", "mei"); ?></h3>
            </div>
         </div>
         <div class="card">
               <div class="card-body p-3">
                     <div class="row card-profile__info">
                        <div class="col-md-4">
                               <h5><?php esc_html_e("Pilnas vardas: ", "mei"); ?></h5>
                              <span class="text-muted"><?=esc_html($vardas) . " " . esc_html($pavarde) ?></span>
                        </div>
                        <div class="col-md-4">
                           <h5><?php esc_html_e("Įmonės pavadinimas:", "mei"); ?> </h5>
                           <span class="text-muted"><?=esc_html($imones) ?></span>
                        </div>
                        <div class="col-md-4">
                           <h5><?php esc_html_e("PVM mokėtojo kodas:", "mei"); ?></h5>
                           <span class="text-muted"><?=esc_html($pvm) ?></span>
                        </div>
                        <div class="col-md-4">
                           <h5><?php esc_html_e("El. Pašto adresas:", "mei"); ?></h5>
                           <span class="text-muted"><?=esc_html($el) ?></span>
                        </div>
                        <div class="col-md-4">
                           <h5><?php esc_html_e("Telefono numeris:", "mei"); ?> </h5>
                           <span class="text-muted"><?=esc_html($telifono) ?></span>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Darbų pobūdis:", "mei"); ?></h5>
                           <p class="text-muted"><?=esc_html($darbu) ?></p>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Vietovė kurioje teikiate statybos paslaugas:", "mei"); ?></h5>
                           <p class="text-muted"><?=esc_html($vietove) ?></p>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Galimos užsakymų priėmimo apimtys ir terminai:", "mei"); ?></h5>
                           <p class="text-muted"><?=esc_html($galimos) ?></p>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Darbo statybose patirtis:", "mei"); ?></h5>
                           <p class="text-muted"><?=esc_html($statybose) ?></p>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Teikiamų paslaugų aprašymas: ", "mei"); ?></h5>
                           <p class="text-muted"><?=esc_html($paslaug) ?></p>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Jums tinkamiausi klientai: ", "mei"); ?></h5>
                           <p class="text-muted"><?=esc_html($jums) ?></p>
                        </div>
                        <div class="col-md-8">
                           <h5><?php esc_html_e("Netinkami klientai: ", "mei"); ?></h5> 
                           <p class="text-muted"><?=esc_html($netimkami) ?></p>
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Nuotraukos ar vizualizacijos:", "mei"); ?></h5>
                           <img class="img-fluid img-thumbnail js-tilt" src="<?=$nuotrau ?>" alt="<?=$nuotrau ?>">
                        </div>
                        <div class="col-md-6">
                           <h5><?php esc_html_e("Brėžiniai ar kiti priedai:", "mei"); ?></h5>
                           <img class="img-fluid img-thumbnail js-tilt" src="<?=$brezin ?>" alt="<?=$brezin ?>">
                        </div>
                        <div class="col-md-12">
                           <h5><?php esc_html_e("Papildoma informacija:", "mei"); ?></h5>
                           <p><?=esc_html($papildoma) ?></p>
                        </div>
                     </div>
               
               </div>
            </div>
      </div>
   </div>
</section>

<?php get_footer();