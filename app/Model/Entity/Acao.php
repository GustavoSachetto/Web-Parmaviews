<?php

namespace App\Model\Entity;

use PDOStatement;
use App\Model\DatabaseManager\Database;

class Acao
{
    public int $id;
    
    public int $codigo_acao;
    public float $investimento;
    public string $data_prevista;
    public string $data_cadastro;

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     */
    public function create(): bool
    {
        $this->id = (new Database('acao'))->insert([
            'codigo_acao'   => $this->codigo_acao,
            'investimento'  => $this->investimento,
            'data_prevista' => $this->data_prevista,
            'data_cadastro' => $this->data_cadastro,
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados do banco com a instância atual
     */
    public function update(): bool
    {
        return (new Database('acao'))->update('id = '.$this->id, [
            'codigo_acao'   => $this->codigo_acao,
            'investimento'  => $this->investimento,
            'data_prevista' => $this->data_prevista,
            'data_cadastro' => $this->data_cadastro,
        ]);
    }

    /**
     * Método responsável por excluir um dado no banco com a instância atual
     */
    public function delete(): bool
    {
        return (new Database('acao'))->delete('id = '.$this->id);
    }

    /**
     * Método que retorna os dados cadastrados no banco
     */
    public static function getAcao(
        ?string $where = null, 
        ?string $order = null, 
        ?string $limit = null, 
        ?string $fields = '*'
        ): PDOStatement
    {
        return (new Database('acao'))->select($where, $order, $limit, $fields);
    }

    /**
     * Método reponsável por retornar todas instâncias
     */
    public static function getAcaoAll(): PDOStatement
    {
        $table = new Database('acao');
        $table->join('tipo_acao', 'acao.codigo_acao = tipo_acao.codigo_acao');
        
        return $table->select();
    }

    /**
     * Método reponsável por retornar um dado com base no seu ID
     */
    public static function getAcaoById(int $id): Acao|string
    {
        return self::getAcao("id = {$id}")->fetchObject(self::class);
    }
}
