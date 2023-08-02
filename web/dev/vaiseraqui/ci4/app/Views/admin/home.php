<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-12 col-xs-12">
				<form method="get" enctype="multipart/form-data">

					<div class="box-content card white">
						<h4 class="box-title">
							Seja bem vindo ao seu painel Uaau.Digital!
						</h4>
						<!-- /.box-title -->
						<div class="card-content">

							<div class='form-group col-xs-12 paddingZeroM'>
								<div class="col-xs-12 col-sm-12">
									Caso tenha alguma dúvida ou problemas na alteração do conteúdo, pode nos chamar via WhatsApp
									<a target="_blank" href='https://web.whatsapp.com/send?phone=5544988305019'>
										<button type='button' class="btn btn-success waves-effect waves-light">
											Uaau <i class='menu-icon mdi mdi-whatsapp'></i>
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="box-content card white">
						<h4 class="box-title">
							Dados do site
						</h4>
						<!-- /.box-title -->
						<div class="card-content">

							<div class='form-group col-xs-12 paddingZeroM'>
								<div class="col-xs-12 col-sm-12">
									<div style='margin-top: 10px; margin-right: 10px;' class='pull-left'>
										Apresentando informações de acordo com a data ao lado. Selecione para mudar o período
									</div>
									<div class='pull-left'>
										<input style='min-width: 230px;' readonly class="form-control input-daterange-datepicker pull-left" type="text" name="datas" value="<?= $get['dtIni'] ?> - <?= $get['dtFim'] ?>">
									</div>
									<div class='pull-left mt-resp'>
										<input type="submit" name="salvar" value="Filtrar" class="btn btn-success btn-rounded waves-effect mb-1">
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="box-content card white">
						<h4 class="box-title"><?= $title ?></h4>
						<!-- /.box-title -->



						<div class="card-content">

							<div class="col-lg-4 col-xs-12 col-20">
								<div class="box-content">
									<h4 class="box-title text-info">Acesos ao site</h4>
									<!-- /.box-title -->
									<div class="dropdown js__drop_down">
										<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
										<ul class="sub-menu">
											EAETEATEAT
										</ul>
										<!-- /.sub-menu -->
									</div>
									<div class="content widget-stat">
										<!-- /#traffic-sparkline-chart-1 -->
										<div class="right-content">
											<h2 class="counter text-info"><?= ($acessos->contador) ? $acessos->contador : "0" ?></h2>
											<p class="text text-info">acesso(s)</p>

										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12 col-20">
								<div class="box-content">
									<h4 class="box-title text-info">Páginas acessadas</h4>
									<!-- /.box-title -->
									<div class="dropdown js__drop_down">
										<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
										<ul class="sub-menu">
											EAETEATEAT
										</ul>
										<!-- /.sub-menu -->
									</div>
									<div class="content widget-stat">
										<!-- /#traffic-sparkline-chart-1 -->
										<div class="right-content">
											<h2 class="counter text-purple"><?= ($qtdAcessos) ? $qtdAcessos : "0" ?></h2>
											<p class="text text-purple">acesso(s)</p>

										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12 col-20">
								<div class="box-content">
									<h4 class="box-title text-info">Clicks no Whatsapp</h4>
									<!-- /.box-title -->
									<div class="dropdown js__drop_down">
										<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
										<ul class="sub-menu">
											EAETEATEAT
										</ul>
										<!-- /.sub-menu -->
									</div>
									<div class="content widget-stat">
										<!-- /#traffic-sparkline-chart-1 -->
										<div class="right-content">
											<h2 class="counter text-success"><?= ($cliquesZap->contador) ? $cliquesZap->contador : "0" ?></h2>
											<p class="text text-success">clique(s)</p>

										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12 col-20">
								<div class="box-content">
									<h4 class="box-title text-info">Clicks no Banner</h4>
									<!-- /.box-title -->
									<div class="dropdown js__drop_down">
										<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
										<ul class="sub-menu">
											EAETEATEAT
										</ul>
										<!-- /.sub-menu -->
									</div>
									<div class="content widget-stat">
										<!-- /#traffic-sparkline-chart-1 -->
										<div class="right-content">
											<h2 class="counter text-dark"><?= ($cliquesBanner->contador) ? $cliquesBanner->contador : "0" ?></h2>
											<p class="text text-dark">clique(s)</p>

										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-xs-12 col-20">
								<div class="box-content">
									<h4 class="box-title text-primary">Contatos Recebidos</h4>
									<!-- /.box-title -->
									<div class="dropdown js__drop_down">
										<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
										<ul class="sub-menu">
											EAETEATEAT
										</ul>
										<!-- /.sub-menu -->
									</div>
									<div class="content widget-stat">
										<!-- /#traffic-sparkline-chart-1 -->
										<div class="right-content">
											<h2 class="counter text-primary"><?= ($contatos->contador) ? $contatos->contador : "0" ?></h2>
											<p class="text text-primary">Contato(s)</p>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="box-content card white col-xs-12 col-lg-6">
						<h4 class="box-title">
							Páginas mais acessadas
						</h4>
						<!-- /.box-title -->
						<div class="card-content">

							<div class="table-responsive">
								<table class="table  ">
									<thead>
										<tr>
											<th>Página</th>
											<th>Acessos</th>
											<th>Acessar</th>
										</tr>
									</thead>
									<tbody>
										<? foreach ($acessosPagina as $ind => $elemento) {
											if ($ind < 5) {
										?>
												<tr class="ui-state-default sort" rel="<?= $elemento->id ?>">
													<td>
														<a target="_blank" href="<?= PATHSITE2 ?><?= $elemento->pagina ?>">
															<?= ($elemento->pagina) ? $elemento->pagina : "home" ?>
														</a>
													</td>
													<td>
														<a target="_blank" href="<?= PATHSITE2 ?><?= $elemento->pagina ?>">
															<?= $elemento->qtd ?>
														</a>
													</td>
													<td>
														<a target="_blank" href="<?= PATHSITE2 ?><?= $elemento->pagina ?>">
															<i class='mdi mdi-arrow-right'></i>
														</a>
													</td>
												</tr>
										<? }
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="box-content card white col-xs-12 col-lg-6">
						<h4 class="box-title">
							Últimos contatos recebidos
						</h4>
						<!-- /.box-title -->
						<div class="card-content">

							<div class="table-responsive">
								<table class="table  ">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Data</th>
											<th>Ver mensagem</th>
										</tr>
									</thead>
									<tbody>
										<? foreach ($ultimosContatos as $ind => $elemento) {
										?>
											<tr class="ui-state-default sort" rel="<?= $elemento->id ?>">
												<td>
													<a target="_blank" href="<?= PATHSITE ?>admin/contato/form/<?= encode($elemento->id) ?>">
														<?= $elemento->nome ?>
													</a>
												</td>
												<td>
													<a target="_blank" href="<?= PATHSITE ?>admin/contato/form/<?= encode($elemento->id) ?>">
														<?= formataDataHora($elemento->dtCriacao) ?>
													</a>
												</td>
												<td>
													<a target="_blank" href="<?= PATHSITE ?>admin/contato/form/<?= encode($elemento->id) ?>">
														<i class='mdi mdi-arrow-right'></i>
													</a>
												</td>
											</tr>
										<? } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>

		<style>
			@media (min-width: 1800px) {
				.col-20 {
					width: 20%;
				}
			}

			@media(min-width: 992px) {
				.mt-resp {
					margin-left: 1rem;
				}
			}

			@media(max-width: 991.98px) {
				.mt-resp {
					margin-top: 1rem;
				}
			}
		</style>