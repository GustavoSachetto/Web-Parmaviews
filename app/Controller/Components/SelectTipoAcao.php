<?php

namespace App\Controller\Components;

use App\Model\Entity\TipoAcao;
use App\Utils\View;

class SelectTipoAcao
{
    public static function get(): string
    {
        return View::render('components/select_tipo_acao/select', [
			'options' => self::renderOptions()
		]);
    }

	private static function renderOptions(): string
	{
		$options = '';
		$tipos = (TipoAcao::getTipoAcao())->fetchAll();

		foreach ($tipos as $value) {
			$options .= View::render('components/select_tipo_acao/option', [
				'value' => $value['codigo_acao'],
				'text'  => $value['nome_acao']
			]);
		}

		return $options;
	}
}