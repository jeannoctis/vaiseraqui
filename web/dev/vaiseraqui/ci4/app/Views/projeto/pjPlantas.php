<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<div class='col-xs-12 col-md-6'>
						<h4 class="box-title"><?= $projetoAtual->titulo ?> <i class="bi bi-chevron-double-right"></i> <?= $title ?></h4>
					</div>
					<div class='col-xs-12 col-md-6 text-right form-group'>
						<a style="float: right; margin-left: 15px; margin-top: 13px;" href="#" class="switch danger">
							<input style="width:20px; margin-top: 0; margin-bottom:0; height: 20px; float: left; margin-right: 5px;" type="checkbox" id="check-excluir" />
							<label style="float: left; color: gray" for="check-excluir">Modo Exclusão </label>
						</a>

						<a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/<?= $tabelaFKF ?>/<?= encode($idProjeto) ?><?= $get['form'] ? '/?form=true' : '' ?>">
							<button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
						</a>
						<button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
					</div>

					<form id='form' method="post">
						<div class="sortable col-xs-12">
							<? if ($plantas) { ?>
								<? foreach ($plantas as $ind => $elemento) { ?>
									<div class="ui-state-default base sort col-md-4" rel="<?= $elemento->id ?>">
										<div style="background-image:url('<?= PATHSITE ?>uploads/<?= $tabela ?>/<?= $elemento->arquivo ?>');" class="base-bg"></div>
										<div class="hover">

											<input class="excluir" type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" />
											<div class="icones">

												<div>
													<a href="<?= PATHSITE ?>admin/<?= $tabelaFK ?>/<?= $tabelaFKF ?>/<?= encode($idProjeto) ?>/<?= encode($elemento->id) ?><?= $get['form'] ? '/?form=true' : '' ?>">
														<i class="glyphicon glyphicon-edit"></i> Editar
													</a>
												</div>

											</div>
										</div>
									</div>
								<? } ?>
							<? } ?>
						</div>

						<div class="form-group col-xs-12 paddingZeroM mt-1">
							<a href="<?= PATHSITE ?>admin/<?= $get['form'] ? $tabelaFK . '/form/' . encode($projetoAtual->id) . '/' . arruma_url($projetoAtual->titulo) : $tabelaFK ?>">
								<button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Voltar</button>
							</a>
						</div>
					</form>

				</div>
			</div>
		</div>

		<style>
			.base {
				position: relative;
				padding: 0;
				border-radius: 10px;
				border: solid 1px #000;
				cursor: pointer;
			}

			.base-bg {
				height: 467px;
				background-size: cover;
				background-position: center center;
				background-repeat: no-repeat;
				border-radius: 10px;
			}

			.exclusao .hover {
				display: block !important;
				border: solid 20px #ffffffd6;
				border-radius: 10px;
			}

			.exclusao .hover:has(input[type=checkbox]:checked) {
				border-color: #f07f75;
			}

			.excluir {
				display: none;
				position: absolute;
				left: -17px;
				top: -19px;
				height: 15px;
				width: 15px;
			}

			.exclusao .hover .excluir {
				display: block;
			}

			.base .hover {
				display: none;
				width: 100%;
				height: 100%;
				background: rgba(0, 0, 0, 0.3);
				position: absolute;
				left: 0;
				top: 0;
			}

			.base:hover .hover {
				display: block;
			}

			.icones {
				left: 50%;
				top: 50%;
				position: absolute;
				transform: translate(-50%);
			}

			.icones a {
				color: #FFF !important;
			}

			.botao {
				float: left;
				padding: 15px 25px;
				border-radius: 6px;
				margin-right: 10px;
				background-color: #FFF;
				color: #000;
				border: solid 1px #428bca;
				text-decoration: none !important;
			}

			.botao.ativo,
			.botao:hover {
				color: #FFF;
				background-color: #428bca;
			}
		</style>