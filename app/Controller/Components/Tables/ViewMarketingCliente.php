<?php

namespace App\Controller\Components\Tables;

use App\Controller\Components\SelectTipoAcao;
use DateTime;
use App\Utils\View;
use App\Model\Entity\Acao;

class ViewMarketingCliente
{
    public static function get(): string
    {
        return View::render('components/tables/view_marketing_cliente/table', [
            'lines' => self::renderLines()
        ]);
    }

    private static function renderLines(): string
    {
        $lines = '';
        $acoes = (Acao::getAcaoAll())->fetchAll();

        foreach ($acoes as $acao) {
            $data_prevista_format = DateTime::createFromFormat('Y-m-d', $acao['data_prevista']);
            $data_cadastro_format = DateTime::createFromFormat('Y-m-d', $acao['data_cadastro']);

            $lines .= View::render('components/tables/view_marketing_cliente/line', [
                'id'               => $acao['id'],
                'nome_acao'        => $acao['nome_acao'],
                'investimento'     => number_format($acao['investimento'],2,",","."),
                'data_prevista'    => date_format($data_prevista_format, 'd/m/Y'),
                'data_cadastro'    => date_format($data_cadastro_format, 'd/m/Y'),
                'select_tipo_acao' => SelectTipoAcao::get(),
            ]);
        }

        return $lines;
    }
}
