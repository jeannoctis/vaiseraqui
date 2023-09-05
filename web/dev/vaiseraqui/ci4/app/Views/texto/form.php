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
 									<label for="titulo">Titulo
 										<? if (in_array($resultado->id, [1])) { ?>
 											<i>(destaque palavras com asteriscos *assim*)</i>
 										<? } ?>
 									</label>
 									<input type="text" name="titulo" class="form-control" id="titulo" value="<?= $resultado->titulo ?> " placeholder="Escreva..." <?= in_array($resultado->id, [15, 16, 17]) ? "readonly" : "" ?>>
 								</div>
 							</div>

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

 								<? if (in_array($resultado->id, [1])) { ?>
 									<hr class="col-xs-11" style="padding-inline: 30px;">

 									<div class='form-group col-xs-12 paddingZeroM'>
 										<div class="col-xs-12 col-sm-12">
 											<label for="extra4">Título texto 2</label>
 											<input type="text" name="extra4" class="form-control" id="extra4" value="<?= $resultado->extra4 ?> " placeholder="Escreva...">
 										</div>
 									</div>

 									<div class='form-group col-xs-12 paddingZeroM'>
 										<div class="col-xs-12 col-sm-12">
 											<label for="texto2">Texto 2</label>
 											<textarea name='texto2' class="tinymce_full" id="texto2"><?= $resultado->texto2 ?></textarea>
 										</div>
 									</div>
 								<? } ?>

 								<? if (in_array($resultado->id, [3])) { ?>
 									<div class="form-group col-xs-12 paddingZeroM">
 										<div class="col-xs-12 col-sm-12 form-group">
 											<label for="topicos">Vantagens <i>(separe-os com o Enter ou Tab)</i> </label>
 											<input type="text" name="topicos" class="form-control tags-input mySingleFieldTags" id="topicos" value="<?= $resultado->topicos ?>" placeholder="Escreva...">
 										</div>
 									</div>
 								<? } ?>

 							<? } ?>

 							<? if ($resultado->isFile == 'S') { ?>
 								<div class="form-group col-xs-12 paddingZeroM mt-5   ">
 									<div class='col-xs-12'>
 										<label for="arquivo">Imagem/Banner <b><?= ($resultado->tamanho) ? '(Tamanho recomendado: ' . $resultado->tamanho . ')' : '' ?></b> </label>
 										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo ?>' type="file" name='arquivo' id="arquivo" class="dropify">
 										<div class="col-xs-12 switch danger">
 											<input id="apagar-arquivo" type="checkbox" name="apagararquivo">
 											<label for="apagar-arquivo">Apagar imagem</label>
 										</div>
 									</div>
 								</div>

 								<? if (in_array($resultado->id, [3])) { ?>
 									<div class="form-group col-xs-12 paddingZeroM mt-5   ">
 										<div class='col-xs-12'>
 											<label for="arquivo2">Imagem/banner mobile <b>(Tamanho recomendado: 384 x 491)</b></label>
 											<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify">
 											<div class="col-xs-12 switch danger">
 												<input id="apagar-arquivo2" type="checkbox" name="apagararquivo2">
 												<label for="apagar-arquivo2">Apagar imagem</label>
 											</div>
 										</div>
 									</div>
 								<? } ?>

 								<? if (in_array($resultado->id, [1])) { ?>
 									<div class="form-group col-xs-12 paddingZeroM mt-5   ">
 										<div class='col-xs-12'>
 											<label for="arquivo2">Imagem secundária <b>(Tamanho recomendado: 000px)</b></label>
 											<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo2 ?>' type="file" name='arquivo2' id="arquivo2" class="dropify">
 											<div class="col-xs-12 switch danger">
 												<input id="apagar-arquivo2" type="checkbox" name="apagararquivo2">
 												<label for="apagar-arquivo2">Apagar imagem</label>
 											</div>
 										</div>
 									</div>
 								<? } ?>
 							<? } ?>

 							<? if (in_array($resultado->id, [1])) { ?>
 								<div class="form-group col-lg-6 paddingZeroM">
 									<div class="col-xs-12 col-sm-12">
 										<label for="arquivo3">Ícone 1 <b>(Tamanho Recomendado: )</b> </label>
 										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo3 ?>' type="file" name='arquivo3' id="arquivo3" class="dropify">
 										<div class="col-xs-12 switch danger">
 											<input id="apagar-arquivo3" type="checkbox" name="apagararquivo3">
 											<label for="apagar-arquivo3">Apagar imagem</label>
 										</div>
 									</div>
 								</div>

 								<div class="form-group col-lg-6 col-lg-6 paddingZeroM">
 									<div class="col-xs-12 col-sm-12">
 										<label for="arquivo4">Ícone 2 <b>(Tamanho Recomendado: )</b></label>
 										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo4 ?>' type="file" name='arquivo4' id="arquivo4" class="dropify">
 										<div class="col-xs-12 switch danger">
 											<input id="apagar-arquivo4" type="checkbox" name="apagararquivo4">
 											<label for="apagar-arquivo4">Apagar imagem</label>
 										</div>
 									</div>
 								</div>

 								<div class='form-group col-lg-6 paddingZeroM'>
 									<div class="col-xs-12 col-sm-12 form-group">
 										<label for="extra1">Detalhe 1
 											<? if (in_array($resultado->id, [1])) { ?>
 												<i>(pule linha com asterisco (*))</i>
 											<? } ?>
 										</label>
 										<input type="text" name="extra1" class="form-control" id="extra1" value="<?= $resultado->extra1 ?>" placeholder="Escreva...">
 									</div>
 								</div>

 								<div class='form-group col-lg-6 paddingZeroM'>
 									<div class="col-xs-12 col-sm-12 form-group">
 										<label for="extra2">Detalhe 2
 											<? if (in_array($resultado->id, [1])) { ?>
 												<i>(pule linha com asterisco (*))</i>
 											<? } ?>
 										</label>
 										<input type="text" name="extra2" class="form-control" id="extra2" value="<?= $resultado->extra2 ?>" placeholder="Escreva...">
 									</div>
 								</div>

 								<div class="form-group col-xs-12 paddingZeroM">
 									<div class="col-xs-12 col-sm-12">
 										<label for="arquivo5">Imagem 3 <b>(Tamanho Recomendado: )</b></label>
 										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo5 ?>' type="file" name='arquivo5' id="arquivo5" class="dropify">
 										<div class="col-xs-12 switch danger">
 											<input id="apagar-arquivo5" type="checkbox" name="apagararquivo5">
 											<label for="apagar-arquivo5">Apagar imagem</label>
 										</div>
 									</div>
 								</div>

 								<div class="form-group col-lg-6 col-lg-6 paddingZeroM">
 									<div class="col-xs-12 col-sm-12">
 										<label for="arquivo6">Ícone 3 <b>(Tamanho Recomendado: )</b></label>
 										<input data-default-file='<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $resultado->arquivo6 ?>' type="file" name='arquivo6' id="arquivo6" class="dropify">
 										<div class="col-xs-12 switch danger">
 											<input id="apagar-arquivo6" type="checkbox" name="apagararquivo6">
 											<label for="apagar-arquivo6">Apagar imagem</label>
 										</div>
 									</div>
 								</div>

 								<div class='form-group col-lg-6 paddingZeroM'>
 									<div class="col-xs-12 col-sm-12 form-group">
 										<label for="extra3">Detalhe 3
 											<? if (in_array($resultado->id, [1])) { ?>
 												<i>(pule linha com asterisco (*))</i>
 											<? } ?>
 										</label>
 										<input type="text" name="extra3" class="form-control" id="extra3" value="<?= $resultado->extra3 ?>" placeholder="Escreva...">
 									</div>
 								</div>

 								<div class='form-group col-xs-12 paddingZeroM'>
 									<div class="col-xs-12 col-sm-12">
 										<label for="extra5">Título texto 3</label>
 										<input type="text" name="extra5" class="form-control" id="extra5" value="<?= $resultado->extra5 ?> " placeholder="Escreva...">
 									</div>
 								</div>

 								<div class='form-group col-xs-12 paddingZeroM'>
 									<div class="col-xs-12 col-sm-12">
 										<label for="texto3">Texto 3</label>
 										<textarea name='texto3' class="tinymce_full" id="texto3"><?= $resultado->texto3 ?></textarea>
 									</div>
 								</div>

 							<? } ?>

 							<? if (in_array($resultado->id, [4, 5])) { ?>
 								<div class='form-group col-xs-12 paddingZeroM'>
 									<div class="col-xs-12 col-sm-12">
 										<label for="extra1">Informação adicional</label>
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