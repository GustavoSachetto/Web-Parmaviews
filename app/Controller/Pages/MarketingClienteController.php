<?php

namespace App\Controller\Pages;

use DateTime;
use App\Utils\View;
use App\Http\Request;
use App\Controller\Page;
use App\Model\Entity\Acao;
use App\Controller\Components\Alert;
use App\Controller\Components\Tables\ViewMarketingCliente;
use App\Controller\Components\Forms\CreateMarketingCliente;

class MarketingClienteController extends Page
{
    public static function get(?string $alert = null): string
    {
        $title = 'Orçamento de marketing | Parmaviews';
        
        $page = View::render('pages/marketing_do_cliente', [
            'create_marketing_cliente' => CreateMarketingCliente::get(),
            'view_marketing_cliente'   => ViewMarketingCliente::get(),
            'alert'                    => $alert ?? ''
        ]);

        return parent::getPage($title, $page);
    }

    public static function set(Request $request): string
    {
        $vars = $request->getPostVars();

        $dataPrevista = DateTime::createFromFormat('Y-m-d',$vars['data_prevista']);
        $dataCadastro = date_create();

        if (($dataPrevista->diff($dataCadastro))->d < 10) {
            return self::get(Alert::error('Você não pode cadastrar uma data prevista menor que dez dias!'));
        }

        $acao = new Acao();
        $acao->codigo_acao = $vars['tipo_acao'];
        $acao->investimento = $vars['investimento_previsto'];
        $acao->data_prevista = $vars['data_prevista'];
        $acao->data_cadastro = date_format($dataCadastro, 'Y-m-d');
        $acao->create();

        return self::get(Alert::success('Orçamento cadastrado com sucesso!'));
    }   
    
    public static function edit(Request $request, int|string $id): string
    {
        $vars = $request->getPostVars();

        $acao = Acao::getAcaoById($id);
        $dataPrevista = DateTime::createFromFormat('Y-m-d',$vars['data_prevista']);
        $dataCadastro = DateTime::createFromFormat('Y-m-d', $acao->data_cadastro);

        if (($dataPrevista->diff($dataCadastro))->d < 10) {
            return self::get(Alert::error('Você não pode atualizar uma data prevista menor que dez dias!'));
        }

        $acao->codigo_acao = $vars['tipo_acao'];
        $acao->investimento = $vars['investimento_previsto'];
        $acao->data_prevista = $vars['data_prevista'];
        $acao->update();

        return self::get(Alert::success('Orçamento atualizado com sucesso!'));
    }
    
    public static function delete(Request $request): string
    {
        $vars = $request->getPostVars();
        $acao = new Acao();
        $acao->id = intval($vars['id_acao']);
        $acao->delete();
        
        return self::get(Alert::success('Orçamento deletado com sucesso!'));
    }
}
