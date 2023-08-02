<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<div class='col-xs-12 col-md-6'>
						<h4 class="box-title"><?= $title ?></h4>
					</div>
					<div class='col-xs-12 col-md-6 text-right form-group'>
						<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/">
							<button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
						</a>
						<button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
					</div>
					<!-- /.dropdown js__dropdown -->

					<? if ($projetos) {  ?>
						<div class='col-xs-12 paddingZeroM'>
							<form method='post' id='form'>

								<div class="table-responsive">
									<table class="table  sortable">
										<thead>
											<tr>
												<th class='menorTh'>Excluir</th>
												<th>Nome</th>
												<th>Fotos</th>
												<th>Planta Baixa</th>
												<th>Vídeos</th>
												<th>Adicionais</th>
												<th>Ordenar</th>
											</tr>
										</thead>
										<tbody>
											<? foreach ($projetos as $item) { ?>
												<tr class="ui-state-default sort uniforme" rel="<?= $item->id ?>">
													<td><input type="checkbox" name="excluir[]" value="<?= $item->id ?>" /> </td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>/<?= arruma_url($item->titulo) ?>">
															<?= $item->titulo ?>
														</a>
													</td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjFotos/<?= encode($item->id) ?>" class="subdivisao">
															Ver Fotos <i class="bi bi-image-fill"></i>
														</a>
													</td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjPlantas/<?= encode($item->id) ?>" class="subdivisao">
															Planta Baixa <i class="bi bi-map-fill"></i>
														</a>
													</td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjVideos/<?= encode($item->id) ?>" class="subdivisao">
															Vídeos <i class="bi bi-collection-play-fill"></i>
														</a>
													</td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/pjAdicionais/<?= encode($item->id) ?>" class="subdivisao">
															Adicionais <i class="bi bi-node-plus-fill"></i>
														</a>
													</td>													
													<td><img src="<?= PATHSITE ?>admins/assets/images/ordenar.png" /> </td>
												</tr>
											<? } ?>
										</tbody>
									</table>
								</div>
								<input type="hidden" name="nexc" value="1">
							</form>
						</div>
					<? } ?>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->


		</div>
		<!-- /.row -->

		<!-- /.row small-spacing -->