<?php

use App\Model\DatabaseManager\Database;
use App\Common\CommandLine\Required\Interaction;

return new class extends Interaction
{
    /**
     * Valores a serem inseridos na tabela.
     */
    public array $values = [
        [
            'codigo_acao' => 1,
            'investimento' => 100,
            'data_prevista' => '2024-07-30',
            'data_cadastro' => '2024-06-17',
        ],
        [
            'codigo_acao' => 2,
            'investimento' => 250,
            'data_prevista' => '2024-02-21',
            'data_cadastro' => '2024-01-17',
        ],
        [
            'codigo_acao' => 3,
            'investimento' => 400,
            'data_prevista' => '2024-05-01',
            'data_cadastro' => '2024-03-28',
        ],
    ];

    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        foreach ($this->values as $value) {
            (new Database('acao'))->insert($value);
        }
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database('acao'))->delete('id in (1, 2, 3)');
    }
};
