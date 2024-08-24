<?php 
add_shortcode('parter-registration','parter_registration_function');
function parter_registration_function(){?>
				<form action="" method="POST" enctype="multipart/form-data" id="part_frm">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="vardas"><?= _e('Vardas:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="vardas" id="vardas" placeholder="Įveskite atsakingo asmens vardą" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="Pavardė:"><?= _e('Pavardė:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="pavarde" id="pavarde" placeholder="Įveskite atsakingo asmens pavardę" class="form-control" >
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="imones:"><?= _e('Įmonės pavadinimas:','mei');?><span style="color: rgb(157,157,158);"><?= _e('(Nebūtina)','mei');?></span></label>
								<input type="text" name="imones" id="imones" placeholder="Įveskite įmonės pavadinimą" class="form-control" >
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="pvm:"><?= _e('PVM mokėtojo kodas:','mei');?> <span style="color: rgb(157,157,158);"><?= _e('(Nebūtina)','mei')?></span></label>
								<input type="text" name="pvm" id="pvm" placeholder="Įveskite tik jei esate PVM mokėtojas" class="form-control" >
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="el."><?= _e('El. Pašto adresas:','mei')?> <i class="ti-star"></i></label>
								<input type="email" name="el" id="el" placeholder="Įveskite el. pašto adresą" class="form-control" >
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="telefono"><?= _e('Telefono numeris:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="telifono" id="telifono" placeholder="Įveskite telefono numerį" class="form-control" >
							</div>
						</div>
						<div class="col-md-12">
							<p><?= _e('Statybos paslaugų informacija','mei');?></p>							
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="telefono"><?= _e('Darbų pobūdis:','mei');?> <i class="ti-star"></i> </label>
								<textarea name="darbu" id="darbu" placeholder="Nurodykite savo teikiamų paslaugų pobudį, (pvz. Fasado apdaila, Gipskartonio montavimas, Stogo dengimas) ar produktus, kokius siūlote."></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="vietove"><?= _e('Vietovė kurioje teikiate statybos paslaugas:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="vietove" id="vietove" placeholder="Nurodykite miestą (-us) arba apskritį (-is) kurioje dirbate" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="darbuoto"><?= _e('Darbuotojų arba komandos skaičius:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="darbuoto" id="darbuoto" placeholder="Nurodykite apytikslį darbuotojų kiekį" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="galimos"><?= _e('Galimos užsakymų priėmimo apimtys ir terminai:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="galimos" id="galimos" placeholder="Nurodykite apytikslias darbų atlikimo apimtis ir galimą pradžios datą" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="statybose"><?= _e('Darbo statybose patirtis:','mei');?> <i class="ti-star"></i></label>
								<input type="text" name="statybose" id="statybose" placeholder="Metais nurodykite apytikslę darbuotojų patirtį statybose." class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="paslaugų"><?= _e('Teikiamų paslaugų aprašymas:','mei');?> <i class="ti-star"></i></label>
								<textarea name="paslaug" placeholder="Išsamiai aprašykite norimus atlikti darbus, įskaitant jų kiekius, medžiagas, norimas gauti kainas ar kitą svarbią informaciją, pagal kurią reitinguosime Jus sistemoje." id="paslaugų"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="jums"><?= _e('Jums tinkamiausi klientai:','mei');?> <i class="ti-star"></i></label>
								<textarea name="jums" placeholder="Aprašykite kokiems klientams paslaugų Jūs neteikiate arba kokie darbai Jums nepatinka, kokių darbų kokybės negarantuojate ar neteikiate tam pirmenybės" id="jums"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label for="netimkami"><?= _e('Netinkami klientai:','mei');?><span style="color: rgb(157,157,158);"><?= _e('(Su įvardintomis paslaugomis susiję)','mei');?></span></label>
								<textarea name="netimkami" placeholder="Aprašykite kokiems klientams paslaugų Jūs neteikiate arba kokie darbai Jums nepatinka, kokių darbų kokybės negarantuojate ar neteikiate tam pirmenybės." id="netimkami"></textarea>
							</div>
						</div>
						<div class="col-md-12 mb-3">
						<p><?= _e('Pateikite savo praeitų projektų vizualizacijas ar nuotraukas:','mei');?> </p>
														
						</div>
						<div class="col-md-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="nuotrau" name="nuotrau">
								<label class="custom-file-label" for="nuotrau"><?= _e('Nuotraukos ar vizualizacijos','mei')?></label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="brezin" name="brezin">
								<label class="custom-file-label" for="brezin"><?= _e('Brėžiniai ar kiti priedai','mei');?></label>
							</div>
						</div>
						<div class="col-md-12 mt-3 ">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" ><?= _e('Sutinku, kad nuotraukos būtų naudojamos Meistrasgreitai.lt svetainėje, siekiant populiarinti teikiamą paslaugą.','mei');?>
								</label>
							</div>
						</div>
						<div class="col-md-12 mt-3">
							<span style="font-size: 12px;"><?= _e('Ribojame failų įkėlimą. Jei tai labai dideli ar kitų formatų priedai, gali prireikti pasinaudoti išorine failų perdavimo paslauga, pvz.,','mei');?> <a href="https://wetransfer.com/" target="_blank" rel="noopener noreferrer"><?= _e('WeTransfer.com','mei');?></a>, <?= _e('kuri siūlo vienkartines nemokamas failų persiuntimo galimybes.','mei')?></span>
						</div>

						<div class="col-md-12 mt-3">
							<div class="form-group">
								<label for="papildoma"><?= _e('Papildoma informacija:','mei')?> <span style="color: rgb(157,157,158);"><?= _e('(Nebūtina)','mei')?></span></label>
								<textarea name="papildoma" placeholder="Papildoma informacija apie teikiamas paslaugas. Bet kokia papildoma informacija, kurią pateiksite, padės mums geriau suprasti Jūsų lūkesčius, todėl nesivaržykite išdėstyti visų detalių, kurias manote, kad reikėtų mums žinoti" id="papildoma"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" > <?= _e('Sutinku, kad mano pateikta informacija būtų naudojama Meistras Greitai parnerystės programos registracijai bei statybos paslaugų užsakymams apdoroti, informacijai apie statybos projektus siųsti.','mei');?>
								</label>
							</div>
						</div>
						<div class="col-md-12 text-center mt-2">
							<input type="submit" value="Registruotis" name="register_partner" class="text-center" id="register_partner">
						</div>
					</div>
				</form>
				<?php 
				if (is_page('partnerio-registracija')) {
				?>
				<script>
					var $= jQuery;
					$(document).on("change", '.custom-file-input', function () {
						console.log('test');
						var fileName = $(this).val().split("\\").pop();
						$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
					});
				</script>
				<?php }?>
<?php }

