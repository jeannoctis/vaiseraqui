<?
if (!isset($_SESSION['admin'])) {
    // $this->load->helper('url');
    //  redirect('/admin/login');
    ?>
    <meta http-equiv="refresh" content="0; URL='<?= PATHSITE ?>admin/login/'" />
    <?
    exit();
}

$request = request();
$segments = $request->uri->getSegments();

if ($_POST) {

    $logModel = model('App\Models\LogModel', false);

    unset($_POST['salvar']);

    $save['usuarioFK'] = $_SESSION['admin'];
    $save['tabela'] = $tabela;
    if ($resultado) {
        $save['funcao'] = 'ALTERAR';
        $resultado->files = $_FILES;
        $save['mensagem'] = json_encode($resultado);
    } else {
        $save['funcao'] = 'CADASTRAR';
        $_POST['files'] = $_FILES;
        $save['mensagem'] = json_encode($_POST);
    }
    if ($_POST['excluir']) {
        $save['funcao'] = "EXCLUIR";
    }


    $logModel->insert($save);

    //'tabela','mensagem','funcao','usuarioFK'
}

$acessoModel = model('App\Models\AcessoModel', false);
$acesso["pagina"] = $_SERVER["REQUEST_URI"];
$acesso['ip'] = $_SERVER['REMOTE_ADDR'];
$acesso["usuarioFK"] = $_SESSION["admin"];
$acessoModel->insert($acesso);

$aprovados = array();

if ($acesso['usuarioFK'] > 3) {
    $usuarioModel = model('App\Models\UsuarioModel', false);
    $usuarioLogado = $usuarioModel->find($acesso['usuarioFK']);
    $aprovados = explode(";", $usuarioLogado->secoes);
} else {
    $adminMaster = TRUE;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="Uaau Digital">

        <title>Painel administrativo - Uaau Digital</title>

   <link rel="shortcut icon" type="image/x-icon" href="<?= PATHSITE ?>assets/images/logo.svg">

        <!-- Main Styles -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/styles/style.css?v=1.0.1">

        <!-- mCustomScrollbar -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

        <!-- Waves Effect -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/waves/waves.min.css">

        <!-- Sweet Alert -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/sweet-alert/sweetalert.css">

        <!-- Dropify -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/dropify/css/dropify.min.css">

        <!-- Toastr -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/toastr/toastr.css">

        <!-- FlexDatalist -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/flexdatalist/jquery.flexdatalist.min.css">

        <!-- Tagit -->
        <link href="<?= PATHSITE ?>admins/assets/plugin/tagit/tag-it.min.css" rel="stylesheet">

        <!-- Colorpicker -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/colorpicker/css/bootstrap-colorpicker.min.css">

        <!-- Color Picker -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/color-switcher/color-switcher.min.css">

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- Themify Icon -->
        <!-- <link rel="stylesheet" href="<?= PATHSITE ?>admin/assets/fonts/themify-icons/themify-icons.css"> -->

        <!-- Material Design Icon -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/fonts/material-design/css/materialdesignicons.css">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

        <!-- Datepicker -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

        <!-- DateRangepicker -->
        <link rel="stylesheet" href="<?= PATHSITE ?>admins/assets/plugin/daterangepicker/daterangepicker.css">


        <!-- <link rel='styleshet' href='https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' /> -->
    </head>

    <body>
        <div class="main-menu">
            <header class="header">
                <a href="<?= PATHSITE ?>admin/" class="logo">Admin</a>
                <button type="button" class="button-close fa fa-times js__menu_close"></button>
                <a href="<?= PATHSITE ?>" target="_blank">
                    <div style='padding: 30px;' class="user">
                        <img src="<?= PATHSITE ?>assets/images/logo.svg" />
                    </div>
                </a>
                <!-- /.user -->
            </header>
            <!-- /.header -->
            <div class="content">
                <style>
                    /* a>i {
                       margin-left: 5px;
                    }
        
                    /* a:has(> i)::before {
                       margin-left: 7px !important;
                    } */
                    */
                </style>

                <div class="navigation">

                    <!-- /.title -->
                    <? if (in_array(1, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 1) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-house-check-fill"></i><span>Home</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <li class='<?= ($segments[1] == 'banner' && decode($segments[3]) == 1) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/banner/form/<?= encode(1) ?>">Banner</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 8) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(8) ?>">Texto Filtro</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 3) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(3) ?>">Bloco Depoimentos</a></li>
                                    <li class='<?= ($segments[1] == 'review') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/review/"><i class="bi-caret-right-fill"></i> Depoimentos</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 4) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(4) ?>">Bloco FAQ</a></li>
                                    <li class='<?= ($segments[1] == 'faq') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/faq/"><i class="bi-caret-right-fill"></i> FAQs</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 7) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(7) ?>">Bloco Contato</a></li>
                                </ul>
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(2, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 2) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-person-badge-fill"></i></i><span>Sobre nós</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 1) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(1) ?>">Bloco Sobre Nós </a></li>
                                    <li class='<?= ($segments[1] == 'aspecto') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/aspecto/"><i class="bi-caret-right-fill"></i> Aspectos</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 2) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(2) ?>">Depoimento Colaborador</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 5) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(5) ?>">Bloco Instagram</a></li>
                                </ul>
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(3, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 3) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-pencil-fill"></i><span>Blog</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">                        
                                    <li class='<?= ($segments[1] == 'artigo') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/artigo/"><i class="bi-caret-right-fill"></i> Artigos</a></li>
                        <li class='<?= ($segments[1] == 'categoriaArtigo') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/categoriaArtigo/">Categorias</a></li>
                                </ul>
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(5, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 4) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-person"></i><span>Cadastros</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <li class='<?= ($segments[1] == 'cidade') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/cidade/"><i class="bi-caret-right-fill"></i> Cidades</a></li>
                                    <li class='<?= ($segments[1] == 'anunciante') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/anunciante/"><i class="bi-caret-right-fill"></i> Anunciantes</a></li>
                                </ul>
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(4, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 5) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-tools"></i><span>Projetos</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <li class='<?= ($segments[1] == 'produto_categoria') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/produto_categoria?tipo=1"><i class="bi-caret-right-fill"></i> Aluguel para temporada </a></li>
                                </ul>
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(5, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 5) ? 'current active' : '' ?> '>
                     <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-box"></i><span>Planos</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                        <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 3) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(3) ?>">Informações Gerais</a></li>
                        <li class='<?= ($segments[1] == 'plano') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/plano/"><i class="bi-caret-right-fill"></i> Planos de linha</a></li>
                        <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 4) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(4) ?>">+ infos plano linha</a></li>
                        <li class='<?= ($segments[1] == 'planoAnuncio') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/planoAnuncio/"><i class="bi-caret-right-fill"></i> Planos de Anúncio</a></li>
                        <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 5) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(5) ?>">+ infos plano anúncio</a></li>
                        <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 6) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(6) ?>">Formulário de Planos</a></li>
                                </ul>
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(8, $aprovados) || $adminMaster) { ?>

                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 8) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-envelope-plus-fill"></i></i><span>Contato</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <li class='<?= ($segments[1] == 'email') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/email">E-mails de contato</a></li>
                                    <li class='<?= ($segments[1] == 'contato' && $_SESSION['menuAdmin'] == 8) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/contato/">Contatos</a></li>
                                </ul>
                                <!-- /.sub-menu js__content -->
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(9, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 100) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-key-fill"></i><span>Administração</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <? if ($_SESSION["admin"] == 1 || $_SESSION["admin"] == 3) { ?>
                                        <li class='<?= ($segments[1] == 'usuario') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/usuario/">Usuários</a></li>
                                    <? } ?>
                                    <li class='<?= ($segments[1] == 'config' && $qualPagina == 1) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/config/form/<?= encode(1) ?>/1">Dados da empresa</a></li>
                                    <li class='<?= ($segments[1] == 'endereco') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/endereco/">Endereços</a></li>
                                    <li class='<?= ($segments[1] == 'rede_social') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/rede_social/">Rede social</a></li>
                                    <li class='<?= ($segments[1] == 'whatsapp') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/whatsapp/">Whatsapp</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 12) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(12) ?>">Termos de uso</a></li>
                                    <li class='<?= ($segments[1] == 'texto' && decode($segments[3]) == 13) ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/texto/form/<?= encode(13) ?>">Política de privacidade</a></li>
                                </ul>
                                <!-- /.sub-menu js__content -->
                            </li>
                        </ul>
                    <? } ?>

                    <? if (in_array(10, $aprovados) || $adminMaster) { ?>
                        <ul class="menu js__accordion">
                            <li class='<?= ($_SESSION["menuAdmin"] == 10) ? 'current active' : '' ?> '>
                                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon bi bi-graph-up-arrow"></i><span>Otimização</span><span class="menu-arrow fa fa-angle-down"></span></a>
                                <ul class="sub-menu js__content">
                                    <li class='<?= ($segments[1] == 'analytic') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/analytic">Analytics</a></li>
                                    <li class='<?= ($segments[1] == 'metatag') ? "linha-selected" : "" ?>'><a href="<?= PATHSITE ?>admin/metatag">Metatags</a></li>
                                </ul>
                                <!-- /.sub-menu js__content -->
                            </li>
                        </ul>
                    <? } ?>

                    <ul class="menu js__accordion">
                        <li onclick='location.href = "<?= PATHSITE ?>admin/logout/"' class=''>
                            <a class="waves-effect parent-item js__control" href="<?= PATHSITE ?>admin/logout/">
                                <i class="menu-icon bi-box-arrow-right"></i><span>Sair</span></a>
                            <!-- /.sub-menu js__content -->
                        </li>
                    </ul>

                    <!-- /.menu js__accordion -->
                </div>
                <!-- /.navigation -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.main-menu -->

        <div class="fixed-navbar ">
            <div class="pull-left">
                <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
                <h1 class="page-title"></h1>
                <!-- /.page-title -->
            </div>
        </div>