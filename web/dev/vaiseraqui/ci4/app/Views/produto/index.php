<style>
         /* Input Dinamico */
         label.with-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
         }

         .dialog {
            padding: 0;
            max-width: 80%;
            min-width: 375px;
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 1px 1px rgba(0, 0, 0, 0.05);
         }

         .dialog .content {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 2.75rem;
         }

         .dialog .content label.form-group.col-xs-12 {
            padding-inline: 0;
         }

         .dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
         }

         .dialog .close {
            position: absolute;
            top: 1rem;
            right: 1rem;
         }

         .dialog .msgErro {
            display: block;
            margin-block-start: 6px;
            color: red;
         }

         .box-title.with-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
         }

         .with-btn img {
            width: 26px;
            aspect-ratio: 1;
            object-fit: contain;
            margin-inline-end: 1rem;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            align-items: center;
            gap: 1.75rem;
            padding: 0;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul img {
            width: 26px;
            aspect-ratio: 1;
            object-fit: contain;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul li {
            padding: 10px 20px;
            border-radius: 1rem;
            transition: all 200ms ease-in-out;
            width: fit-content;
         }

         :is(.dialog#modalProximidades, .dialog#modalPontoDeVenda) ul li:hover {
            background-color: aliceblue;
         }

         .dialog#modalPontoDeVenda ul li:hover {
            background-color: aliceblue;
         }

          .dialog#modalPontoDeVenda label {
            max-width: 50%;
         }

         /* Sugestões */
         :is(.catCmdd-div, .proximidade-div, .setor-ingresso-div, div[data-setor-ingresso], .pdv-div, .cardapio-div, .organizacao-div) {
            border: 1px solid #e6e9ed;
            border-radius: 4px;
            margin-block-end: 3rem;
         }

         .sugestoes {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            align-content: flex-start;
            justify-content: space-between;
            gap: 2rem;
            height: fit-content;
            max-height: 175px;
            padding: 9px 14px;
            border-color: #ccd1d9;
            border: 1px solid #ccc;
            border-radius: 4px;
            overflow-y: scroll;
         }

         .sugestoes:hover {
            border-color: #00aeff !important;
            box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.12) !important;
         }

         .sugestoes .sugestao {
            padding: 0.5rem 1rem;
            background-color: aquamarine;
            display: flex;
            border-radius: 8px;
         }

         li.customTag {
            background-color: red !important;
         }

         .organizacao-div {
            position: relative;
         }

         .organizacao-div button[data-parent] {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 5;
         }
      </style>

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
                                                                                                <th>Em alta G  <i data-target="emaltaG"  style="cursor: pointer;" class="menu-icon bi bi-question-circle"></i> </th>
													<th>Em alta P <i data-target="emaltaP" class="menu-icon bi bi-question-circle"></i> </th>
													<th>Destaque G <i data-target="destaqueG" class="menu-icon bi bi-question-circle"></i> </th>
													<th>Destaque P <i data-target="destaqueP" class="menu-icon bi bi-question-circle"></i> </th>
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
															<?= $elemento->titulo ?> 
														</a>
													</td>
													<? if ($get['tipo'] == 5) { ?>
														<td>
															<a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($elemento->id) ?>/<?= arruma_url($elemento->titulo) ?>?tipo=<?= $get['tipo'] ?>">
																<?= formataData($elemento->datas[0]->data) ?>
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
															<button id="emAltaG<?=$elemento->id?>" type="button" class="btn btn-md btn-rounded <?= $elemento->id == $altaProdutoFK1 ? "btn-warning" : "" ?>" onclick="emAltaG('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, '<?= $get['tipo'] == 6 ? 'emaltaprestador' : 'emalta' ?>', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)" data-emalta-g>
																<i class="bi bi-fire"></i> 
															</button>
														</td>
														<td>
															<button type="button" class="btn btn-md btn-rounded <?= in_array($elemento->id, $altaProdutosFKs) ? 'btn-info' : '' ?>" onclick="emAltaP('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, '<?= $get['tipo'] == 6 ? 'emaltaprestador' : 'emalta' ?>', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)">
																<i class="bi bi-fire"></i>
															</button>
														</td>
														<td>
															<button type="button" class="btn btn-md btn-rounded <?= $elemento->id == $produtoFK1 ? "btn-danger" : "" ?>" onclick="destaqueG('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, '<?= $get['tipo'] == 6 ? 'servicocategoria' : 'tipo' ?>', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)" data-destaque-g>
																<i class="bi bi-star-fill"></i>
															</button>
														</td>
														<td>
															<button type="button" class="btn btn-md btn-rounded <?= in_array($elemento->id, $produtosFKs) ? 'btn-primary' : '' ?>" onclick="destaqueP('<?= encode($elemento->id) ?>', <?= $get['tipo'] ?>, <?= $get['cidade'] ?>, '<?= $get['tipo'] == 6 ? 'servicocategoria' : 'tipo' ?>', <?= !empty($get['categoria']) ? $get['categoria'] : 'null' ?>, this)">
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
				}, function(retorno) {
					const response = jQuery.parseJSON(retorno)
                                        console.log(response);
					if (response.save || response.insert) {
						const destaqueGBtns = document.querySelectorAll("[data-emalta-g]").forEach(
							btn => btn.classList.remove("btn-warning")
						)
						el.classList.toggle("btn-warning")
					} else if (response.remove) {
						el.classList.toggle("btn-warning")
					} else if (response.produtoEmAltaMenor) {
						swal("Produto já destacado", "Este produto está destacado como em alta G", "warning")
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
               
                
<dialog id="emaltaG" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Em Alta G</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group">
               São os destaques que vão ficar maiores, na cidade especificada, conforme as imagens a seguir               
            </label>
            
            <img src="<?=PATHSITE?>assets/images/bg-modal-1.svg"/>
    
         </div>
      </dialog>
                
         <dialog id="emaltaP" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Em Alta P</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group">
               São os destaques que vão ficar menores, na cidade especificada, conforme as imagens a seguir               
            </label>
            
            <img src="<?=PATHSITE?>assets/images/bg-modal-2.svg"/>
    
         </div>
      </dialog>
                
         <dialog id="destaqueG" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Destaque G</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group">
               São os destaques que vão ficar maiores, na cidade e categoria especificada, conforme as imagens a seguir               
            </label>
            
            <img src="<?=PATHSITE?>assets/images/bg-modal-3.svg"/>
    
         </div>
      </dialog>
                
                <dialog id="destaqueP" class="dialog">
         <div class="content box-content">
            <h2 class="box-title">Destaque P</h2>
            <span class="close"><i class="bi bi-x-lg"></i></span>

            <label for="" class="form-group">
               São os destaques que vão ficar menores, na cidade e categoria especificada, conforme as imagens a seguir               
            </label>
            
            <img src="<?=PATHSITE?>assets/images/bg-modal-4.svg"/>
    
         </div>
      </dialog>
                
                <script>
                     // Dialogs Geral
         const boxesContent = document.querySelectorAll(".bi-question-circle")
         const dialogs = document.querySelectorAll(".dialog")
         const closeBtns = document.querySelectorAll(".dialog .close")
         let catInngresso
         boxesContent.forEach(box => {
            box.addEventListener("click", e => {
          
                  const btn = e.target
                  const modalTarget = document.querySelector(`#${btn.dataset.target}`)

                  if (btn.dataset.setor) {
                     setorIngresso = btn.dataset.setor
                     console.log(setorIngresso);
                  }
                  modalTarget.showModal()
                  modalTarget.querySelector("input").focus()
               
            })
         })
         dialogs.forEach(dialog => {
            dialog.addEventListener("click", e => {
               if (e.target == dialog) {
                  dialog.close()
               }
            })
         })
         closeBtns.forEach(btn => {
            btn.addEventListener("click", (e) => {
               e.target.closest("dialog").close();
            })
         })
                    </script>