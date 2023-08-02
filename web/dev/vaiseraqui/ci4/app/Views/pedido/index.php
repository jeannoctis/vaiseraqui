<? function status($status)
{
    switch ($status) {
        case 'CANCELADO':
            echo "text-danger bold";
            break;
        case 'ENTREGUE':
            echo "text-success bold";
            break;
        case 'ENVIADO':
            echo "text-pink bold";
            break;
        case 'ENVIADO':
            echo "text-pink bold";
            break;
        case 'PAGO':
            echo "text-primary bold";
            break;
        case 'AGUARDANDO':
            echo "text-muted";
            break;       
    }
} ?>
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content" style="display: flex; flex-direction: column;">
                    <div class='col-xs-12 col-md-6 '>
                        <h4 class="box-title"><?= $title ?> </h4>
                    </div>

                    <div class='col-xs-12 paddingZeroM'>
                        <form method='get' id='form'>
                            <div class="filters">
                                <h5>Filtros</h5>
                                <ul>
                                    <li>
                                        <div class="input-group">
                                            <label for="pdStatus">Status do pedido</label>
                                            <select name="status" id="pdStatus" class="form-control">
                                                <option value="">-- filtre por status --</option>
                                                <option value="AGUARDANDO" <?= $get['status'] == "AGUARDANDO" ? 'selected' : '' ?>>AGUARDANDO</option>
                                                <option value="APROVADO" <?= $get['status'] == "APROVADO" ? 'selected' : '' ?>>APROVADO</option>
                                                <option value="PAGO" <?= $get['status'] == "PAGO" ? 'selected' : '' ?>>PAGO</option>
                                                <option value="ENVIADO" <?= $get['status'] == "ENVIADO" ? 'selected' : '' ?>>ENVIADO</option>
                                                <option value="ENTREGUE" <?= $get['status'] == "ENTREGUE" ? 'selected' : '' ?>>ENTREGUE</option>
                                                <option value="CANCELADO" <?= $get['status'] == "CANCELADO" ? 'selected' : '' ?>>CANCELADO</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-group">
                                            <label for="procura">Procure por nome ou ID</label>
                                            <div class="submit-wrapper">
                                                <input type="text" name="procura" id="procura" class="form-control" value="<?= $get['procura'] ?? '' ?>">
                                                <button type="submit" class="btn btn-info waves-effect waves-light col-xs-4"><i class="bi bi-search"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="<?= PATHSITE ?>admin/pedido/" class="btn btn-warning">Limpar Filtro</a>
                                    </li>
                                </ul>
                            </div>
                    <? if ($lista) { ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Status</th>
                                                <th>Data</th>
                                                <th>Nome</th>
                                                <th>Projeto</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? foreach ($lista as $item) { ?>
                                                <tr class="ui-state-default sort" rel="<?= $item->id ?>">
                                                    <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>">
                                                            <?= str_pad($item->id, 6, 0, STR_PAD_LEFT) ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>" class="<?= status($item->status) ?>">
                                                            <h5><?= $item->status ?></h5>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>">
                                                            <?= formataDataHora($item->dtCriacao) ?>
                                                        </a>
                                                    </td>
                                                     <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>">
                                                            <?= $item->nome ?> <?= $item->sobrenome ?>
                                                        </a>
                                                    </td>
                                                     <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>">
                                                            <?= $item->projeto ?>
                                                        </a>
                                                    </td>
                                                     <td>
                                                        <a href="<?= PATHSITE ?>admin/<?= $tabela ?>/form/<?= encode($item->id) ?>">
                                                            <b> R$ <?= number_format($item->total, 2, ',', '.') ?> </b>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <? } ?>
                            </form>
                        </div>
                    <nav class="navigation-pages">
                        <?= $pager->links('pedido') ?>
                    </nav>
                </div>
            </div> 
        </div>

        <style>
            form {
                display: flex;
                flex-direction: column;
            }

            form td .bold h5 {
                font-weight: 700;
            }

            .filters,
            .filters ul {
                display: flex;
                align-items: center;
            }

            .filters {
                gap: 1rem;
            }

            .filters ul {
                align-items: flex-end;
                justify-content: space-around;
                width: 100%;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .submit-wrapper {
                display: flex;
            }
        </style>

        <script>
            document.querySelector("#pdStatus").addEventListener("change", () => {
                document.querySelector("#form").submit()
            })
        </script>