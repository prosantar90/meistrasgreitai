<?php
/**
 * Template Name: Employee Registration
 */
get_header();
get_sidebar();

?>
<section class="main_content dashboard_part large_header_bg">
	<?php get_template_part('template-parts/topbar');?>
	<div class="main_content_iner overly_inner ">
		<div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
			<div class="col-md-12">
				<div class="page_title_left">
					<h3 class="mb-0"><?php esc_html_e('Prietaisų skydelis','mei')?></h3>
					<p><?php esc_html_e('Prietaisų skydelis / Pridėti naujų partnerių','mei')?></p>
				</div>
			</div>  
		</div>
		<div class="card">
			<div class="card-header">
				<h1><?php esc_html_e('Užpildykite partnerio registracijos anketą','mei')?></h1>
				<h3><?php esc_html_e('Kontaktai','mei');?></h3>
			</div>
			<div class="card-body">
				<?php 
				if ($pupdate === true) {?>
				<form action="" method="POST" enctype="multipart/form-data" id="part_frm">
					<input type="hidden" name="ID" value="<?= $ID?>"> 
					<input type="hidden" name="user_id" value="<?= $user_id;?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="vardas"><?= _e('Vardas:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="vardas" id="vardas" placeholder="Įveskite atsakingo asmens vardą" class="form-control" value="<?= $vardas;?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Pavardė:"><?= _e('Pavardė:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="pavarde" id="pavarde" placeholder="Įveskite atsakingo asmens pavardę" class="form-control" value="<?= $pavarde;?>" >
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="imones:"><?= _e('Įmonės pavadinimas:','mei')?> <span style="color: rgb(157,157,158);"><?= _e('(Nebūtina)','mei')?></span></label>
								<input type="text" name="imones" id="imones" placeholder="Įveskite įmonės pavadinimą" class="form-control" value="<?= $imones;?>">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="pvm:"><?= _e('PVM mokėtojo kodas:','mei');?> <span style="color: rgb(157,157,158);"><?= _e('(Nebūtina)','mei');?></span></label>
								<input type="text" name="pvm" id="pvm" placeholder="Įveskite tik jei esate PVM mokėtojas" class="form-control" value="<?= $pvm;?>">
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="el."><?= _e('El. Pašto adresas:','mei');?> <i class="ti-star"></i></label>
								<input type="email" name="el" id="el" placeholder="Įveskite el. pašto adresą" class="form-control" value="<?= $el;?>">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="telefono"><?= _e('Telefono numeris:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="telifono" id="telifono" placeholder="Įveskite telefono numerį" class="form-control" value="<?= $telifono;?>">
							</div>
						</div>
						<div class="col-md-12">
							<p><?= _e('Statybos paslaugų informacija','mei')?></p>							
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="telefono"><?= _e('Darbų pobūdis:','mei')?> <i class="ti-star"></i> </label>
								<textarea name="darbu" id="darbu" placeholder="Nurodykite savo teikiamų paslaugų pobudį, (pvz. Fasado apdaila, Gipskartonio montavimas, Stogo dengimas) ar produktus, kokius siūlote."><?= $darbu;?></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="vietove"><?= _e('Vietovė kurioje teikiate statybos paslaugas:','mei')?> <i class="ti-star"></i></label>
								<input type="text" name="vietove" id="vietove" placeholder="Nurodykite miestą (-us) arba apskritį (-is) kurioje dirbate" class="form-control" value="<?= $vietove;?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="darbuoto"><?= _e('Darbuotojų arba komandos skaičius:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="darbuoto" id="darbuoto" placeholder="Nurodykite apytikslį darbuotojų kiekį" class="form-control" value="<?= $darbuoto;?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="galimos"><?= _e('Galimos užsakymų priėmimo apimtys ir terminai:','mei')?> <i class="ti-star"></i></label>
								<input type="text" name="galimos" id="galimos" placeholder="Nurodykite apytikslias darbų atlikimo apimtis ir galimą pradžios datą" class="form-control" value="<?= $galimos; ?>">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="statybose"><?= _e('Darbo statybose patirtis:','mei')?> <i class="ti-star"></i></label>
								<input type="text" name="statybose" id="statybose" placeholder="Metais nurodykite apytikslę darbuotojų patirtį statybose." class="form-control" value="<?= $statybose;?>">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="paslaugų"><?= _e('Teikiamų paslaugų aprašymas:','mei')?> <i class="ti-star"></i></label>
								<textarea name="paslaug" placeholder="Išsamiai aprašykite norimus atlikti darbus, įskaitant jų kiekius, medžiagas, norimas gauti kainas ar kitą svarbią informaciją, pagal kurią reitinguosime Jus sistemoje." id="paslaugų"><?= $paslaug;?></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="jums"><?= _e('Jums tinkamiausi klientai:','mei')?> <i class="ti-star"></i></label>
								<textarea name="jums" placeholder="Aprašykite kokiems klientams paslaugų Jūs neteikiate arba kokie darbai Jums nepatinka, kokių darbų kokybės negarantuojate ar neteikiate tam pirmenybės" id="jums"> <?= $jums;?></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="netimkami"><?= _e('Netinkami klientai:','mei')?> <span style="color: rgb(157,157,158);"><?= _e('(Su įvardintomis paslaugomis susiję)','mei')?></span></label>
								<textarea name="netimkami" placeholder="Aprašykite kokiems klientams paslaugų Jūs neteikiate arba kokie darbai Jums nepatinka, kokių darbų kokybės negarantuojate ar neteikiate tam pirmenybės." id="netimkami"><?= $netimkami;?></textarea>
							</div>
						</div>
						<div class="col-md-12 mb-3">
						<p><?= _e('Pateikite savo praeitų projektų vizualizacijas ar nuotraukas:','mei')?> </p>
														
						</div>
						<div class="col-md-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="nuotrau" name="nuotrau">
								<label class="custom-file-label" for="nuotrau"><?= !empty($nuotrau1) ? $nuotrau1 : _e('Nuotraukos ar vizualizacijos','mei')?></label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="brezin" name="brezin">
								<label class="custom-file-label" for="brezin">
    							<?= !empty($brezin1) ? $brezin1 : _e('Brėžiniai ar kiti priedai', 'mei') ?></label>
							</div>
						</div>
						<div class="col-md-12 mt-3 ">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" ><?= _e('Sutinku, kad nuotraukos būtų naudojamos Meistrasgreitai.lt svetainėje, siekiant populiarinti teikiamą paslaugą.','mei')?>
								</label>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<span style="font-size: 12px;"><?= _e('Ribojame failų įkėlimą. Jei tai labai dideli ar kitų formatų priedai, gali prireikti pasinaudoti išorine failų perdavimo paslauga, pvz.,','mei');?> <a href="https://wetransfer.com/" target="_blank" rel="noopener noreferrer"><?= _e('WeTransfer.com','mei')?></a>,<?= _e(' kuri siūlo vienkartines nemokamas failų persiuntimo galimybes.','mei');?></span>
						</div>

						<div class="col-md-12 mt-3">
							<div class="form-group">
								<label for="papildoma"><?= _e('Papildoma informacija:','mei');?> <span style="color: rgb(157,157,158);"><?= _e('(Nebūtina)','mei')?></span></label>
								<textarea name="papildoma" placeholder="Papildoma informacija apie teikiamas paslaugas. Bet kokia papildoma informacija, kurią pateiksite, padės mums geriau suprasti Jūsų lūkesčius, todėl nesivaržykite išdėstyti visų detalių, kurias manote, kad reikėtų mums žinoti" id="papildoma"><?= $papildoma;?></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" > <?= _e('Sutinku, kad mano pateikta informacija būtų naudojama Meistras Greitai parnerystės programos registracijai bei statybos paslaugų užsakymams apdoroti, informacijai apie statybos projektus siųsti.','mei')?>
								</label>
							</div>
						</div>
						<div class="col-md-12 text-center mt-2">
							<input type="submit" value="Atnaujinti" name="update_partner" class="text-center" id="update_partner">
						</div>
					</div>
				</form>
					
				<?php }else{
					echo do_shortcode('[parter-registration]');
				}
				?>
			</div>
		</div>

	</div>
</div>
</div>
</section>
<?php 
if (is_page('registration')) {
?>
<script>
	var $ = jQuery;
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php }?>

<?php get_footer();