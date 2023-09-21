<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class='col-xs-12 col-md-6'>
                        <h4 class="box-title"><?= $title ?></h4>
                    </div>
                    <div class='col-xs-12 col-md-6 text-right form-group'>
                        <form method="post" style="display: inline-flex;">
                            <button type="submit" class="btn btn-primary btn-rounded" name="gerar">
                                Gerar Arquivo <i class="bi bi-download"></i>
                            </button>
                        </form>
                    </div>

                    <h5 style="display: none;" class="col-xs-12">Filtros <i class="bi bi-funnel"></i></h5>
                    <form style="display: none;" method="get" class="col-xs-12 filters" id="formFiltro">
                        <ul>
                            <li>
                                <div class="input-group">
                                    <label for="procura">Busque por nome</label>
                                    <div class="submit-wrapper">
                                        <input type="text" name="procura" id="procura" class="form-control" value="<?= $get['procura'] ?? '' ?>">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="<?= PATHSITE ?>admin/produto/relatorio" class="btn btn-primary btn-rounded cleanfilter">Limpar Filtro</a>
                            </li>
                        </ul>
                        <input type="hidden" name="tipo" value="<?= $get['tipo'] ?>">

                    </form>

                    <? if ($lista) { ?>
                        <div class='col-xs-12 paddingZeroM'>
                            <form method='post' id='form'>

                                <div class="table-responsive">
                                    <table class="table  ">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                  <th>Ativo</th>
                                                  <th>Início</th>
                                                  <th>Fim</th>
                                                <th>Tipo</th>
                                                <th>Categoria</th>
                                                 <th>Cidade</th>
                                                <th>Link</th>
                                                <th>Anunciante</th>
                                                  <th>E-mail</th>
                                                <th>Telefone</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? foreach ($lista as $item) { ?>
                                                <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                                    <td>                                          
                                                        <?= $item->titulo ?>                                         
                                                    </td>
                                                     <td>                                          
                                                        <?= ($item->ativo == 1) ? 'Sim' : 'Não' ?>                                         
                                                    </td>
                                                     <td>                                          
                                                        <?= formataData($item->inicioValidade) ?>                                         
                                                    </td>
                                                     <td>                                          
                                                        <?= formataData($item->validade) ?>                                         
                                                    </td>
                                                    <td>                                        
                                                        <?= $item->tipo ?>                               
                                                    </td>         
                                                    <td>                                         
                                                        <?= $item->categoria ?>
                                                    </td>   
                                                     <td>                                         
                                                        <?= $item->cidade ?> / <?=$item->estado?>
                                                    </td>   
                                                    <td>   
                                                        <a target="_blank" href="<?= PATHSITE ?>espaco/<?= $item->identificador ?>/">
                                                            <?= PATHSITE ?>espaco/<?= $item->identificador ?>/
                                                        </a>
                                                    </td>    
                                                     <td>                                         
                                                        <?= $item->anunciante ?>
                                                    </td>    
                                                     <td>                                         
                                                        <?= $item->email?>
                                                    </td>    
                                                     <td>                                         
                                                        <?= $item->telefone ?>

                                                    </td>    
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