<?
$tamanhoRecomendado = "1920x800";
$aprovados = explode(";", $resultado->secoes);
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-12 col-xs-12">
				<form method="post" enctype="multipart/form-data">
					<div class="box-content card white">
						<h4 class="box-title"><?= $title ?></h4>
						<!-- /.box-title -->
						<div class="card-content">

							<div class='form-group col-xs-12 paddingZeroM'>
								<div class="col-xs-12 col-sm-12">
									<label for="titulo">Usuário </label>
									<input type="text" name="usuario" class="form-control" id="usuario" value="<?= $resultado->usuario ?>" placeholder="Escreva...">
								</div>
							</div>

							<div class='form-group col-xs-12 paddingZeroM'>
								<div class="col-xs-12 col-sm-12">
									<label for="senha">Senha </label>
									<input type="password" name="senha" class="form-control" id="senha" placeholder="senha">
								</div>
							</div>

							<? if ($resultado->id > 2 || !$resultado->id) { ?>
								<div class="form-group col-xs-12 paddingZeroM">
									<label for="categoria" class="col-sm-2 text-left control-label">Seções do site</label>
									<div class="col-10 col-sm-offset-2">
										<? if ($secoes) {
											foreach ($secoes as $com) {
										?>
												<div class="col-sm-6">
													<input <?= (in_array($com->id, $aprovados)) ? "checked" : "" ?> style="height: 30px; margin-bottom: 10px; width: 30px; float: left;" id="comando<?= $com->id ?>" type="checkbox" name="aprovados[]" value="<?= $com->id ?>" />
													<label style="float: left; margin-top: 6px; margin-left: 6px;" for="comando<?= $com->id ?>"><?= $com->titulo ?></span>
												</div>

										<?
											}
										} ?>
									</div>
								</div>
							<? } ?>

							<div class="form-group col-xs-12 paddingZeroM">
								<div class="form-group col-xs-12">
									<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/<?= $tipo ?>">
										<button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
									</a>
									<input type="submit" name="salvar" value="Salvar e atualizar" class="btn btn-success btn-rounded waves-effect mb-1">
								</div>
							</div>

						</div>
					</div>
				</form>
				<!-- /.card-content -->
			</div>
			<!-- /.box-content -->
		</div>