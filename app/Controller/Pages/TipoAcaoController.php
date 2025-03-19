<?php

namespace App\Controller\Pages;

use App\Http\Request;
use App\Model\Entity\TipoAcao;

class TipoAcaoController
{
    public static function set(Request $request): void
    {
        $vars = $request->getPostVars();

        $tipoAcao = new TipoAcao();
        $tipoAcao->nome_acao = $vars['nome_acao'];
        $tipoAcao->create();

        $request->getRouter()->redirect('/marketing_do_cliente');
    }   
}
