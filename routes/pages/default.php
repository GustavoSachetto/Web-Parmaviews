<?php

use App\Http\Response;
use App\Controller\Pages;

$obRouter->get('/', [
  function($request) {
    $request->getRouter()->redirect('/marketing_do_cliente');
  }
]);

$obRouter->get('/marketing_do_cliente', [
  function($request) {
    return new Response(200, Pages\MarketingClienteController::get());
  }
]);

$obRouter->post('/marketing_do_cliente', [
  function($request) {
    return new Response(200, Pages\MarketingClienteController::set($request));
  }
]);

$obRouter->post('/marketing_do_cliente/atualizar/{id}', [
  function($request, $id) {
    return new Response(200, Pages\MarketingClienteController::edit($request, $id));
  }
]);

$obRouter->post('/marketing_do_cliente/deletar', [
  function($request) {
    return new Response(200, Pages\MarketingClienteController::delete($request));
  }
]);

$obRouter->post('/marketing_do_cliente/nova_acao', [
  function($request) {
    return new Response(200, Pages\TipoAcaoController::set($request).'');
  }
]);