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

					<h5 class="col-xs-12">Filtros <i class="bi bi-funnel"></i></h5>
					<form method="get" class="col-xs-12 filters" id="formFiltro">
						<ul>
							<li>
								<div class="select2-wrapper">
									<label for="estados">Estado</label>
									<select name="estado" id="estados" class="form-control js-example-basic-single">
										<option value="">-- filtre por estado --</option>
										<? foreach ($estados as $item) { ?>
											<option value="<?= $item->sigla ?>" <?= $get['estado'] == $item->sigla ? "selected" : "" ?>>
												<?= $item->titulo ?> (<?= $item->sigla ?>)
											</option>
										<? } ?>
									</select>
								</div>
							</li>
							<li>
								<div class="input-group">
									<label for="procura">Busque for cidade ou UF</label>
									<div class="submit-wrapper">
										<input type="text" name="procura" id="procura" class="form-control" value="<?= $get['procura'] ?? '' ?>">
										<button type="submit" class="btn btn-info waves-effect waves-light">
											<i class="bi bi-search"></i>
										</button>
									</div>
								</div>
							</li>
							<li>
								<a href="<?= PATHSITE ?>admin/cidade/" class="btn btn-primary btn-rounded cleanfilter">Limpar Filtro</a>
							</li>
						</ul>
						<input type="hidden" name="tipo" value="<?= $get['tipo'] ?>">
					</form>

					<? if ($lista) {  ?>
						<div class='col-xs-12 paddingZeroM'>
							<form method='post' id='form'>

								<div class="table-responsive">
									<table class="table  ">
										<thead>
											<tr>
												<th class='menorTh'>Excluir</th>
												<th>Nome</th>
												<th>Estado</th>
											</tr>
										</thead>
										<tbody>
											<? foreach ($lista as $item) { ?>
												<tr class="ui-state-default sort" rel="<?= $item->id ?>">
													<td><input type="checkbox" name="excluir[]" value="<?= $item->id ?>" /> </td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>/<?= arruma_url($item->titulo) ?>">
															<?= $item->titulo ?>
														</a>
													</td>

													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>/<?= arruma_url($item->titulo) ?>">
															<?= $item->estado ?> (<?= $item->sigla ?>)
														</a>
													</td>
												</tr>
											<? } ?>
										</tbody>
									</table>
								</div>
								<input type="hidden" name="nexc" value="1">
							</form>
							<nav class="col-xs-12 navigation-pages ">
								<?= $pager->links('cidades') ?>
							</nav>
						</div>
					<? } ?>
				</div>
			</div>
		</div>

		<style>
			form.filters,
			form.filters ul {
				display: flex;
				align-items: center;
			}

			form.filters {
				gap: 2rem;
				margin-block: 1rem;
			}

			form.filters ul {
				align-items: flex-end;
				justify-content: space-between;
				gap: 1.75rem;
				width: 100%;
				margin: 0;
				padding: 0;
				list-style: none;
			}

			form.filters ul .select2-wrapper {
				display: flex;
				flex-direction: column;
			}

			form.filters ul .submit-wrapper {
				display: flex;
				/* gap: 1rem; */
			}

			form.filters ul .submit-wrapper input {
				border: 1px solid #aaa;
				border-radius: 4px !important;
			}

			form.filters .cleanfilter {
				display: grid;
				place-items: center;
				height: 45px;
			}
		</style>