<?php

use App\Model\DatabaseManager\Database;
use App\Common\CommandLine\Required\Interaction;
use App\Model\DatabaseManager\Diagram\Blueprint;

return new class extends Interaction
{
    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        (new Database)->create('acao', function(Blueprint $table) {
            $table->int('id', false, true)->primary();
            $table->int('codigo_acao');
            $table->double('investimento');
            $table->date('data_prevista');
            $table->date('data_cadastro');
            $table->foreign('codigo_acao', 'tipo_acao', 'codigo_acao');
        });
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database)->dropIfExists('acao');
    }
};
