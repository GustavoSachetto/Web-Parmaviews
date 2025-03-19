<?php

namespace App\Controller\Components\Forms;

use App\Utils\View;
use App\Controller\Components\SelectTipoAcao;

class CreateMarketingCliente
{
    public static function get(): string
    {
        return View::render('components/forms/create_marketing_cliente', [
            'select_tipo_acao' => SelectTipoAcao::get()
        ]);
    }
}
