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
												<th>Ordenar</th>
											</tr>
										</thead>
										<tbody>
											<? foreach ($lista as $elemento) { ?>
												<tr class="ui-state-default sort" rel="<?= $elemento->id ?>">
													<td><input type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" /> </td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->titulo) ?>">

															<?= $elemento->titulo ?>
														</a>
													</td>
													<td><img src="<?= PATHSITE ?>admins/assets/images/ordenar.png"/> </td>
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