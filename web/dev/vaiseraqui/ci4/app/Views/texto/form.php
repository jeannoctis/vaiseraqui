<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-12 col-xs-12">
				<form method="post" enctype="multipart/form-data">
					<div class="box-content card white">
						<h4 class="box-title">Bloco: <?= $resultado->bloco ?? $resultado->titulo ?></h4>
						<!-- /.box-title -->
						<div class="card-content">

							<div class='form-group col-xs-12 paddingZeroM'>
								<div class="col-xs-12 col-sm-12">
									<label for="titulo">Titulo</label>
									<input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?> " placeholder="Escreva...">
								</div>
							</div>

							<!-- Maycon -->
							<? if ($resultado->isDescricao == 'S') { ?>
								<div class='form-group col-xs-12 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="descricao">Descrição</label>
										<input type="text" name="descricao" class="form-control" id="descricao" value="<?= $resultado->descricao ?> " placeholder="Escreva...">
									</div>
								</div>
							<? } ?>

							<? if ($resultado->isTexto == 'S') { ?>
								<div class='form-group col-xs-12 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="texto">Texto </label>
										<textarea name='texto' class="tinymce_full" id="texto"><?= $resultado->texto ?></textarea>
									</div>
								</div>
							<? } ?>

							<? if ($resultado->isFile == 'S') { ?>
								<div id='imagem' class="form-group col-xs-12 paddingZeroM mt-5   ">
									<div class='col-xs-12'>
										<label for="arquivo">Imagem/Banner <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
										<div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
											<input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo" type="checkbox" name="apagararquivo" class="cb">
											<label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo" id="lbCheck">Apagar imagem</label>
										</div>
									</div>
								</div>
								<? if ($resultado->id == 1) { ?>
									<div id='imagem' class="form-group col-xs-12 paddingZeroM mt-5   ">
										<div class='col-xs-12'>
											<label for="arquivo2">Imagem/Banner mobile <b>(Tamanho recomendado: 000px)</b></label>
											<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify">
											<div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
												<input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo2" type="checkbox" name="apagararquivo2" class="cb">
												<label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo2" id="lbCheck">Apagar imagem</label>
											</div>
										</div>
									</div>
								<? } ?>
							<? } ?>							

							<? if ($resultado->id == 1) { ?>
								<div class="form-group col-lg-6 paddingZeroM">
									<div class="col-xs-12 col-sm-12">
										<label for="arquivo3">Ícone 1 <b>(Tamanho Recomendado: )</b> </label>
										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo3 ?>' type="file" name='arquivo3' id="arquivo3" class="dropify">
										<div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
											<input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo3" type="checkbox" name="apagararquivo3" class="cb">
											<label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo3" id="lbCheck">Apagar ícone</label>
										</div>
									</div>
								</div>

								<div class="form-group col-lg-6 col-lg-6 paddingZeroM">
									<div class="col-xs-12 col-sm-12">
										<label for="arquivo4">Ícone 2 <b>(Tamanho Recomendado: )</b></label>
										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo4 ?>' type="file" name='arquivo4' id="arquivo4" class="dropify">
										<div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
											<input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo4" type="checkbox" name="apagararquivo4" class="cb">
											<label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo4" id="lbCheck">Apagar ícone</label>
										</div>
									</div>
								</div>

								<div class='form-group col-lg-6 paddingZeroM'>
									<div class="col-xs-12 col-sm-12 form-group">
										<label for="extra1">Detalhe 1 </label>
										<input type="text" name="extra1" class="form-control" id="extra1" value="<?= $resultado->extra1 ?>" placeholder="Escreva...">
									</div>
								</div>
								
								<div class='form-group col-lg-6 paddingZeroM'>
									<div class="col-xs-12 col-sm-12 form-group">
										<label for="extra2">Detalhe 2 </label>
										<input type="text" name="extra2" class="form-control" id="extra2" value="<?= $resultado->extra2 ?>" placeholder="Escreva...">
									</div>
								</div>

								<h4 class="box-title" style="margin-bottom: 15px;">Parte 2.</h4>

								<div class='form-group col-xs-12 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="descricao">Título texto 2</label>
										<input type="text" name="descricao" class="form-control" id="descricao" value="<?= $resultado->descricao ?> " placeholder="Escreva...">
									</div>
								</div>

								<div class='form-group col-xs-12 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="texto2">Texto 2</label>
										<textarea name='texto2' class="tinymce_full" id="texto2"><?= $resultado->texto2 ?></textarea>
									</div>
								</div>

								<div class="form-group col-xs-12 paddingZeroM">
									<div class="col-xs-12 col-sm-12">
										<label for="arquivo5">Capa vídeo <b>(Tamanho Recomendado: )</b></label>
										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo5 ?>' type="file" name='arquivo5' id="arquivo5" class="dropify">
										<div class="col-sm-12 col-lg-6 switch danger" style="display: flex;">
											<input style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="apagar-arquivo5" type="checkbox" name="apagararquivo5" class="cb">
											<label style="float: left; margin-top: 6px; margin-left: -12px;" for="apagar-arquivo5" id="lbCheck">Apagar imagem</label>
										</div>
									</div>
								</div>
								
							<? } ?>

							<? if ($resultado->id == 7) { ?>
								<div class='form-group col-xs-12 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="extra1">Descrição </label>
										<input type="text" name="extra1" class="form-control" id="extra1" value="<?= $resultado->extra1 ?>" placeholder="Escreva...">
									</div>
								</div>
							<? } ?>

							<? if ($resultado->id == 8) { ?>
								<div class='form-group col-lg-6 paddingZeroM'>
									<div class="col-xs-12 col-sm-12 form-group">
										<label for="extra1">Texto 2 em negrito</label>
										<input type="text" name="extra1" class="form-control" id="extra1" value="<?= $resultado->extra1 ?>" placeholder="Escreva...">
									</div>
								</div>
							<? } ?>
							
							<? if ($resultado->isBotao == 'S') { ?>
								<div class='form-group col-lg-6 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="botao">Texto Botão </label>
										<input type="text" name="botao" class="form-control" id="botao" value="<?= $resultado->botao ?>" placeholder="Escreva...">
									</div>
								</div>
							<? } ?>

							<? if ($resultado->isLink == 'S') { ?>
								<div class='form-group col-lg-6 paddingZeroM'>
									<div class="col-xs-12 col-sm-12">
										<label for="link">Link botão </label>
										<input type="text" name="link" class="form-control" id="link" value="<?= $resultado->link ?>" placeholder="Escreva...">
									</div>
								</div>
							<?  } ?>

							<? if ($resultado->isVideo == "S") {
								if ($resultado->video) {
									$url_components = parse_url($resultado->video);
									if ($url_components) {
										parse_str($url_components['query'], $params);
									}
								} ?>

								<div class="form-group col-lg-6 paddingZeroM">
									<div class='col-xs-12'>
										<label for="video">Vídeo (Youtube)</label>
										<input type="text" name="video" class="form-control" id="link" value="<?= $resultado->video ?>" placeholder="https://www.youtube.com/watch?v=VIDEO">
									</div>
									<? if ($resultado->video) { ?>
										<div class="form-group col-xs-12">
											<label class="control-label col-xs-12 mt-1">Ver vídeo</label>
											<div class="col-xs-12">
												<iframe class="col-xs-12" height="315" src="https://www.youtube.com/embed/<?= $params['v'] ?>">
												</iframe>
											</div>
										</div>
									<? } ?>
								</div>
							<? } ?>

							<div class="form-group col-xs-12 mt-5">
								<div class="col-xs-12 col-sm-12">
									<? if (FALSE) { ?>
										<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
											<button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
										</a>
									<? } ?>
									<input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>

		<script>
			const checkboxes = document.querySelectorAll("input[type=checkbox]")
			let checks = 0

			checkboxes.forEach(item => {
				item.addEventListener("change", event => {
					checks = document.querySelectorAll("input[type=checkbox]:checked").length
					if (checks > 4) {
						item.checked = false
						swal("Oops", "... limite de até 4 produtos para destacar", "warning")
					}
				})
			})
		</script>