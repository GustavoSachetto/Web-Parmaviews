<?php

namespace App\Model\Entity;

use PDOStatement;
use App\Model\DatabaseManager\Database;

class TipoAcao
{
    public int $codigo_acao;
    public string $nome_acao;

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     */
    public function create(): bool
    {
        $this->codigo_acao = (new Database('tipo_acao'))->insert([
            'nome_acao'  => $this->nome_acao,
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados do banco com a instância atual
     */
    public function update(): bool
    {
        return (new Database('tipo_acao'))->update('codigo_acao = '.$this->codigo_acao, [
            'nome_acao'  => $this->nome_acao,
        ]);
    }

    /**
     * Método responsável por excluir um dado no banco com a instância atual
     */
    public function delete(): bool
    {
        return (new Database('tipo_acao'))->delete('codigo_acao = '.$this->codigo_acao);
    }

    /**
     * Método que retorna os dados cadastrados no banco
     */
    public static function getTipoAcao(
        ?string $where = null, 
        ?string $order = null, 
        ?string $limit = null, 
        ?string $fields = '*'
        ): PDOStatement
    {
        return (new Database('tipo_acao'))->select($where, $order, $limit, $fields);
    }

    /**
     * Método reponsável por retornar um dado com base no seu ID
     */
    public static function getTipoAcaoByCodigoAcao(int $codigo_acao): TipoAcao|string
    {
        return self::getTipoAcao("codigo_acao = {$codigo_acao}")->fetchObject(self::class);
    }
}
