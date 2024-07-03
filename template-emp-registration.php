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
					<h3 class="mb-0">Dashboard</h3>
					<p>Dashboard /Add New Partners</p>
				</div>
			</div>  
		</div>
		<div class="card">
			<div class="card-header">
				<h1>Užpildykite partnerio registracijos anketą</h1>
				<h3>Kontaktai</h3>
			</div>
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data" id="part_frm">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="vardas"><?= _e('Vardas:','mei');?></label>
								<input type="text" name="vardas" id="vardas" placeholder="Įveskite atsakingo asmens vardą" class="form-control" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Pavardė:">Pavardė:</label>
								<input type="text" name="pavarde" id="pavarde" placeholder="Įveskite atsakingo asmens pavardę" class="form-control" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="imones:">Įmonės pavadinimas: <span style="color: rgb(157,157,158);">(Nebūtina)</span></label>
								<input type="text" name="imones" id="imones" placeholder="Įveskite įmonės pavadinimą" class="form-control" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="pvm:">PVM mokėtojo kodas: <span style="color: rgb(157,157,158);">(Nebūtina)</span></label>
								<input type="text" name="pvm" id="pvm" placeholder="Įveskite tik jei esate PVM mokėtojas" class="form-control" required>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="el.">El. Pašto adresas:</label>
								<input type="text" name="el" id="el" placeholder="Įveskite el. pašto adresą" class="form-control" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="telefono">Telefono numeris:</label>
								<input type="text" name="telifono" id="telifono" placeholder="Įveskite telefono numerį" class="form-control" >
							</div>
						</div>
						<div class="col-md-12">
							<p>Statybos paslaugų informacija</p>							
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="telefono">Darbų pobūdis:</label>
								<textarea name="darbu" id="darbu" placeholder="Nurodykite savo teikiamų paslaugų pobudį, (pvz. Fasado apdaila, Gipskartonio montavimas, Stogo dengimas) ar produktus, kokius siūlote."></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="vietove">Vietovė kurioje teikiate statybos paslaugas:</label>
								<input type="text" name="vietove" id="vietove" placeholder="Nurodykite miestą (-us) arba apskritį (-is) kurioje dirbate" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="darbuoto">Darbuotojų arba komandos skaičius:</label>
								<input type="text" name="darbuoto" id="darbuoto" placeholder="Nurodykite apytikslį darbuotojų kiekį" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="galimos">Galimos užsakymų priėmimo apimtys ir terminai:</label>
								<input type="text" name="galimos" id="galimos" placeholder="Nurodykite apytikslias darbų atlikimo apimtis ir galimą pradžios datą" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="statybose">Darbo statybose patirtis:</label>
								<input type="text" name="statybose" id="statybose" placeholder="Metais nurodykite apytikslę darbuotojų patirtį statybose." class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="paslaugų">Teikiamų paslaugų aprašymas:</label>
								<textarea name="paslaug" placeholder="Išsamiai aprašykite norimus atlikti darbus, įskaitant jų kiekius, medžiagas, norimas gauti kainas ar kitą svarbią informaciją, pagal kurią reitinguosime Jus sistemoje." id="paslaugų"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="jums">Jums tinkamiausi klientai:</label>
								<textarea name="jums" placeholder="Aprašykite kokiems klientams paslaugų Jūs neteikiate arba kokie darbai Jums nepatinka, kokių darbų kokybės negarantuojate ar neteikiate tam pirmenybės" id="jums"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="netimkami">Netinkami klientai: <span style="color: rgb(157,157,158);">(Su įvardintomis paslaugomis susiję)</span></label>
								<textarea name="netimkami" placeholder="Aprašykite kokiems klientams paslaugų Jūs neteikiate arba kokie darbai Jums nepatinka, kokių darbų kokybės negarantuojate ar neteikiate tam pirmenybės." id="netimkami"></textarea>
							</div>
						</div>
						<div class="col-md-12 mb-3">
						<p>Pateikite savo praeitų projektų vizualizacijas ar nuotraukas: </p>
														
						</div>
						<div class="col-md-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="nuotrau" name="nuotrau">
								<label class="custom-file-label" for="nuotrau">Nuotraukos ar vizualizacijos</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="brezin" name="brezin">
								<label class="custom-file-label" for="brezin">Brėžiniai ar kiti priedai</label>
							</div>
						</div>
						<div class="col-md-12 mt-3 ">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" value="">Sutinku, kad nuotraukos būtų naudojamos Meistrasgreitai.lt svetainėje, siekiant populiarinti teikiamą paslaugą.
								</label>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<span style="font-size: 12px;">Ribojame failų įkėlimą. Jei tai labai dideli ar kitų formatų priedai, gali prireikti pasinaudoti išorine failų perdavimo paslauga, pvz., <a href="https://wetransfer.com/" target="_blank" rel="noopener noreferrer">WeTransfer.com</a>, kuri siūlo vienkartines nemokamas failų persiuntimo galimybes.</span>
						</div>

						<div class="col-md-12 mt-3">
							<div class="form-group">
								<label for="papildoma">Papildoma informacija: <span style="color: rgb(157,157,158);">(Nebūtina)</span></label>
								<textarea name="papildoma" placeholder="Papildoma informacija apie teikiamas paslaugas. Bet kokia papildoma informacija, kurią pateiksite, padės mums geriau suprasti Jūsų lūkesčius, todėl nesivaržykite išdėstyti visų detalių, kurias manote, kad reikėtų mums žinoti" id="papildoma"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" value="">Sutinku, kad mano pateikta informacija būtų naudojama Meistras Greitai parnerystės programos registracijai bei statybos paslaugų užsakymams apdoroti, informacijai apie statybos projektus siųsti.
								</label>
							</div>
						</div>
						<div class="col-md-12 text-center mt-2">
							<input type="submit" value="Registruotis" name="register_partner" class="text-center" id="register_partner">
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
</div>
</section>
<script>
	var $ = jQuery;
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<?php get_footer();