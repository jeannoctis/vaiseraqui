<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('admin/login', 'Usuario::login');
$routes->get('admin', 'Admin::index');

$routes->group('admin', function ($routes) {
    $routes->add('logout', 'Admin::logout');

    $routes->add('analytic', 'Analytic::index');
    $routes->add('analytic/form/(:any)', 'Analytic::form/$i');

    $routes->add('anunciante', 'Anunciante::index');
    $routes->add('anunciante/form', 'Anunciante::form');
    $routes->add('anunciante/form/(:any)', 'Anunciante::form/$i');

    $routes->add('banner', 'Banner::index');
    $routes->add('banner/form', 'Banner::form');
    $routes->add('banner/form/(:any)', 'Banner::form/$i');

    $routes->add('cidade', 'Cidade::index');
    $routes->add('cidade/form', 'Cidade::form');
    $routes->add('cidade/form/(:any)', 'Cidade::form/$i');

    $routes->add('review', 'Review::index');
    $routes->add('review/form', 'Review::form');
    $routes->add('review/form/(:any)', 'Review::form/$i');

    $routes->add('produto_categoria', 'ProdutoCategoria::index');
    $routes->add('produto_categoria/form', 'ProdutoCategoria::form');
    $routes->add('produto_categoria/form/(:any)', 'ProdutoCategoria::form/$i');

    $routes->add('produto', 'Produto::index');
    $routes->add('produto/form', 'Produto::form');
    $routes->add('produto/form/(:any)', 'Produto::form/$i');

    $routes->add('faq', 'Faq::index');
    $routes->add('faq/form', 'Faq::form');
    $routes->add('faq/form/(:any)', 'Faq::form/$i');

    $routes->add('aspecto', 'Aspecto::index');
    $routes->add('aspecto/form', 'Aspecto::form');
    $routes->add('aspecto/form/(:any)', 'Aspecto::form/$i');

    $routes->add('artigo', 'Artigo::index');
    $routes->add('artigo/form', 'Artigo::form');
    $routes->add('artigo/form/(:any)', 'Artigo::form/$i');

  $routes->add('categoriaArtigo', 'CategoriaArtigo::index');
  $routes->add('categoriaArtigo/form', 'CategoriaArtigo::form');
  $routes->add('categoriaArtigo/form/(:any)', 'CategoriaArtigo::form/$i');

    $routes->add('texto/form/(:any)', 'Texto::form/$i');

    $routes->add('contato/form/(:any)', 'Contato::form/$i');
    $routes->add('contato/', 'Contato::index');

  $routes->add('plano', 'Plano::index');
  $routes->add('plano/form', 'Plano::form');
  $routes->add('plano/form/(:any)', 'Plano::form/$i');
  $routes->add('planoAnuncio', 'PlanoAnuncio::index');
  $routes->add('planoAnuncio/form', 'PlanoAnuncio::form');
  $routes->add('planoAnuncio/form/(:any)', 'PlanoAnuncio::form/$i');

    $routes->add('usuario', 'Usuario::index');
    $routes->add('usuario/form', 'Usuario::form');
    $routes->add('usuario/form/(:any)', 'Usuario::form/$i');

    $routes->add('whatsapp', 'Whatsapp::index');
    $routes->add('whatsapp/form', 'Whatsapp::form');
    $routes->add('whatsapp/form/(:any)', 'Whatsapp::form/$i');

    $routes->add('rede_social', 'RedeSocial::index');
    $routes->add('rede_social/form', 'RedeSocial::form');
    $routes->add('rede_social/form/(:any)', 'RedeSocial::form/$i');

    $routes->add('endereco', 'Endereco::index');
    $routes->add('endereco/form', 'Endereco::form');
    $routes->add('endereco/form/(:any)', 'Endereco::form/$i');

    $routes->add('email', 'Email::index');
    $routes->add('email/form/(:any)', 'Email::form/$i');

    $routes->add('metatag', 'Metatag::index');
    $routes->add('metatag/form/(:any)', 'Metatag::form/$i');

    $routes->add('config/form/(:any)', 'Config::form');

    $routes->add('newsletter/', 'Newsletter::index');
});

//Site
$routes->add('/', 'Pages::index');
$routes->add('pages', 'Pages::index');
$routes->add('utils/contadorWhatsapp', 'Utils::contadorWhatsapp');
$routes->add('utils/contadorBanner', 'Utils::contadorBanner');
$routes->add('utils/abreComprovantes', 'Utils::abreComprovantes');

$routes->add('artigo/destaque', 'Artigo::destaque');
$routes->add('workshop/abrirmodalworkshop', 'Workshop::abrirModalWorkshop');

$routes->add('cliente/loginFacebook', 'Cliente::loginFacebook');
$routes->add('cliente/loginGoogle', 'Cliente::loginGoogle');

$routes->add('produto/carregaCalendarios', 'Produto::carregaCalendarios');
$routes->add('produto/whats', 'Produto::whats');
$routes->add('produto/visitas', 'Produto::visitas');
$routes->add('produto/fone', 'Produto::fone');

$routes->add('utils/ordena', 'Utils::ordena');
$routes->add('utils/ordena2', 'Utils::ordena2');
$routes->add('utils/mudaFormato', 'Utils::mudaFormato');
$routes->add('utils/visitaPagina', 'Utils::visitaPagina');
$routes->add('utils/upload', 'Utils::upload');
$routes->add('utils/instagram', 'Utils::instagram');
$routes->add('utils/deleteCard', 'Utils::deleteCard');
$routes->add('review/reviewInfo', 'Review::reviewInfo');
$routes->add('(:any)', 'Pages::view/$1');



//$routes->get('default_controller', 'Pages::view/');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
