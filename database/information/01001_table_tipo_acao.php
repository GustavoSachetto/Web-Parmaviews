<?php

use App\Model\DatabaseManager\Database;
use App\Common\CommandLine\Required\Interaction;

return new class extends Interaction
{
    /**
     * Valores a serem inseridos na tabela.
     */
    public array $values = ['Palestra', 'Evento', 'Apoio Gráfico'];
    
    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        foreach ($this->values as $valor) {
            (new Database('tipo_acao'))->insert([
                'nome_acao' => $valor,
            ]);
        }
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database('tipo_acao'))->delete('id = 1');
    }
};
