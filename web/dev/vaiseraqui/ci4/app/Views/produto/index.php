<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<div class='col-xs-12 col-md-6'>
						<h4 class="box-title"><?= $tipo ?></h4>
					</div>
					<div class='col-xs-12 col-md-6 text-right form-group'>
						<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form?tipo=<?= $get['tipo'] ?>">
							<button type="button" class="btn btn-violet btn-rounded waves-effect waves-light">Adicionar</button>
						</a>
						<button onclick='$("#form").submit()' type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Excluir</button>
					</div>

					<h5 class="col-xs-12">Filtros <i class="bi bi-funnel"></i></h5>
					<form method="get" class="col-xs-12 filters" id="formFiltro">
						<ul>
							<li>
								<div class="select2-wrapper">
									<label for="categorias">Categoria</label>
									<select name="categoria" id="categorias" class="form-control js-example-basic-single">
										<option value="">-- filtre por categoria --</option>
										<? foreach ($categorias as $categoria) { ?>
											<option value="<?= $categoria->id ?>" <?= $get['categoria'] == $categoria->id ? 'selected' : '' ?>>
												<?= $categoria->titulo ?>
											</option>
										<? } ?>
									</select>
								</div>
							</li>
							<li>
								<div class="select2-wrapper">
									<label for="cidades">Cidade</label>
									<select name="cidade" id="cidades" class="form-control js-example-basic-single">
										<option value="">-- filtre por cidade --</option>
										<? foreach ($estados as $estado) { ?>
											<optgroup label="<?= $estado->estado_titulo ?>">
												<? foreach ($estado->cidades as $cidade) { ?>
													<option value="<?= $cidade->cidade_id ?>" <?= $get['cidade'] == $cidade->cidade_id ? 'selected' : '' ?>>
														<?= $cidade->cidade_titulo ?>
													</option>
												<? } ?>
											</optgroup>
										<? } ?>
									</select>
								</div>
							</li>
							<li>
								<div class="select2-wrapper">
									<label for="anunciantes">Anunciante</label>
									<select name="anunciante" id="anunciantes" class="form-control js-example-basic-single">
										<option value="">-- filtre por anunciante --</option>
										<? foreach ($anunciantes as $anunciante) { ?>
											<option value="<?= $anunciante->id ?>" <?= $get['anunciante'] == $anunciante->id ? 'selected' : '' ?>>
												<?= $anunciante->titulo ?> (<?= $anunciante->email ?>)
											</option>
										<? } ?>
									</select>
								</div>
							</li>
							<li>
								<div class="input-group">
									<label for="procura">Título ou conteúdo</label>
									<div class="submit-wrapper">
										<input type="text" name="procura" id="procura" class="form-control" value="<?= $get['procura'] ?? '' ?>">
										<button type="submit" class="btn btn-info waves-effect waves-light">
											<i class="bi bi-search"></i>
										</button>
									</div>
								</div>
							</li>
							<li>
								<a href="<?= PATHSITE ?>admin/produto/?tipo=<?= $get['tipo'] ?>" class="btn btn-primary btn-rounded cleanfilter">Limpar Filtro</a>
							</li>
						</ul>
						<input type="hidden" name="tipo" value="<?= $get['tipo'] ?>">

					</form>
					<? if ($lista) {  ?>
						<div class='col-xs-12 paddingZeroM'>
							<form method='post' id='form'>

								<div class="table-responsive">
									<table class="table  sortable">
										<thead>
											<tr>
												<th class='menorTh'>Excluir</th>
												<th>Nome</th>
												<? if ($get['tipo'] == 5) { ?>
													<th>Data</th>
												<? } ?>
												<th>Galeria</th>
												<th>Vídeos</th>
												<? if (!empty($get['cidade']) && (($get['tipo'] == 6 && !empty($get['categoria'])) || $get['tipo'] != 6)) { ?>
													<th>Em alta G</th>
													<th>Em alta P</th>
													<th>Destaque G</th>
													<th>Destaque P</th>
												<? } ?>
												<th>Ordenar</th>
											</tr>
										</thead>
										<tbody>
											<? foreach ($lista as $elemento) { ?>
												<tr class="ui-state-default sort" rel="<?= $elemento->id ?>">
													<td><input type="checkbox" name="excluir[]" value="<?= $elemento->id ?>" /> </td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->titulo) ?>?tipo=<?= $get['tipo'] ?>">
															<?= $elemento->titulo ?> <?= $elemento->id ?>
														</a>
													</td>
													<? if ($get['tipo'] == 5) { ?>
														<td>
															<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->titulo) ?>?tipo=<?= $get['tipo'] ?>">
																<?= $elemento->datas[0]->data ?>
															</a>
														</td>
													<? } ?>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/fotos/<?= encode($elemento->id) ?>?tipo=<?= $get['tipo'] ?>" class="subdivisao">
															Ver Fotos <i class="bi bi-image-fill"></i>
														</a>
													</td>
													<td>
														<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/videos/<?= encode($elemento->id) ?>?tipo=<?= $get['tipo'] ?>" class="subdivisao">
															Vídeos <i class="bi bi-collection-play-fill"></i>
														</a>
													</td>
													<? if (!empty($get['cidade']) && (($get['tipo'] == 6 && !empty($get['categoria'])) || $get['tipo'] != 6)) { ?>
														<td>
															<button type="button" 
															class="btn btn-md btn-rounded <?= $elemento->id == $altaProdutoFK1 ? "btn-warning" : "" ?>" 
															onclick="emAltaG('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, 'emalta', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)"
															data-emalta-g>
																<i class="bi bi-fire"></i>
															</button>
														</td>
														<td>
															<button type="button" 
															class="btn btn-md btn-rounded <?= in_array($elemento->id, $altaProdutosFKs) ? 'btn-info' : '' ?>" 
															onclick="emAltaP('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, 'emalta', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)">
																<i class="bi bi-fire"></i>
															</button>
														</td>
														<td>
															<button type="button" 
															class="btn btn-md btn-rounded <?= $elemento->id == $produtoFK1 ? "btn-danger" : "" ?>" 
															onclick="destaqueG('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, '<?= $get['tipo'] == 6 ? 'servicocategoria':'tipo'?>', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)"
															data-destaque-g>
																<i class="bi bi-star-fill"></i>
															</button>
														</td>
														<td>
															<button type="button" 
															class="btn btn-md btn-rounded <?= in_array($elemento->id, $produtosFKs) ? 'btn-primary' : '' ?>" 
															onclick="destaqueP('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, '<?= $get['tipo'] == 6 ? 'servicocategoria':'tipo'?>', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)">
																<i class="bi bi-star-fill"></i>
															</button>
														</td>														
													<? } ?>
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

					<nav class="col-xs-12 navigation-pages">
						<?= $pager->links('produtos', 'panel_full') ?>
					</nav>
					<a href="<?= PATHSITE ?>admin/anuncio_tipo/">
						<button type="button" class="btn btn-primary btn-rounded waves-effect mb-1">Voltar</button>
					</a>
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

		<script>
			function emAltaG(produtoFK1, tipoFK, cidadeFK, tipo, categoriaFK, el) {
				$.post('<?= PATHSITE ?>anuncio/emAltaG', {
					produtoFK1,
					tipoFK,
					cidadeFK,
					tipo,
					categoriaFK
				}, function (retorno) {
					const response = jQuery.parseJSON(retorno)

					if (response.save || response.insert) {
						const destaqueGBtns = document.querySelectorAll("[data-emalta-g]").forEach(
							btn => btn.classList.remove("btn-warning")
						)
						el.classList.toggle("btn-warning")
					} else if (response.remove) {
						el.classList.toggle("btn-warning")
					} else if (response.produtoEmAltaMenor) {
						swal("Produto já destacado", "Este produto está destacado como em alta P", "warning")
					}
				})
			}

			function emAltaP(produtoFK, tipoFK, cidadeFK, tipo, categoriaFK, el) {
				$.post('<?= PATHSITE ?>anuncio/emAltaP', {
					produtoFK,
					tipoFK,
					cidadeFK,
					tipo,
					categoriaFK
				}, function(retorno) {
					const response = jQuery.parseJSON(retorno)
					if (response.save || response.insert) {
						el.classList.toggle("btn-info")
					} else if (response.noEmptySlots) {
						swal("Limite de 4 em alta pequenos para a categoria e cidade", "Desmarque itens para adicionar outros", "warning")
					} else if (response.produtoEmAltaMaior) {
						swal("Produto já destacado", "Este produto está destacado como em alta G", "warning")
					}
				});
			}

			function destaqueG(produtoFK1, tipoFK, cidadeFK, tipo, categoriaFK, el) {
				$.post('<?= PATHSITE ?>anuncio/destaqueG', {
					produtoFK1,
					tipoFK,
					cidadeFK,
					tipo,
					categoriaFK
				}, function(retorno) {

					const response = jQuery.parseJSON(retorno)

					if (response.save || response.insert) {
						const destaqueGBtns = document.querySelectorAll("[data-destaque-g]").forEach(
							btn => btn.classList.remove("btn-danger")
						)
						el.classList.toggle("btn-danger")
					} else if (response.remove) {
						el.classList.toggle("btn-danger")
					} else if (response.produtoEmDestaqueMenor) {
						swal("Produto já destacado", "Este produto está destacado como destaque P", "warning")
					}
				});
			}

			function destaqueP(produtoFK, tipoFK, cidadeFK, tipo, categoriaFK, el) {
				$.post('<?= PATHSITE ?>anuncio/destaqueP', {
					produtoFK,
					tipoFK,
					cidadeFK,
					tipo,
					categoriaFK
				}, function(retorno) {
					const response = jQuery.parseJSON(retorno)
					const limit = tipo == "tipo" ? 4 : 6

					if (response.save || response.insert) {
						el.classList.toggle("btn-primary")
					} else if (response.noEmptySlots) {
						swal(`Limite de ${limit} destaque pequenos para a categoria e cidade`, "Desmarque itens para adicionar outros", "warning")
					} else if (response.produtoEmDestaqueMaior) {
						swal("Produto já destacado", "Este produto está destacado como destaque G", "warning")
					}
				});
			}
		</script>