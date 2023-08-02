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

					<? if ($lista) {  ?>
						<div class='col-xs-12 paddingZeroM'>
							<form method='post' id='form'>

								<div class="table-responsive">
									<table class="table  sortable">
										<thead>
											<tr>
												<th class='menorTh'>Excluir</th>
												<th>Nome</th>
												<th>Galeria</th>
												<th>Ordenar</th>
											</tr>
										</thead>
										<tbody>
											<? foreach ($lista as $workshop) { ?>
												<tr class="ui-state-default sort" rel="<?= $workshop->id ?>">
													<td><input type="checkbox" name="excluir[]" value="<?= $workshop->id ?>" /> </td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($workshop->id) ?>/<?= arruma_url($workshop->titulo) ?>">
															<?= $workshop->titulo ?>
														</a>
													</td>
													<td>
														<a class="subdivisao" href="<?= PATHSITE ?>admin/<?= $tabela ?>/fotos/<?= encode($workshop->id) ?>">
															Ver Galeria <i class="bi bi-images"></i>
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
			</div>
		</div>