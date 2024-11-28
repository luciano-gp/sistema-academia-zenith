<?php

namespace App\Lib\Relatorios;

use App\Model\Table\PessoaTable;
use Cake\I18n\FrozenDate;

class RelatorioAlunos
{
    private PessoaTable $Pessoa;

    public function __construct(PessoaTable $Pessoa)
    {
        $this->Pessoa = $Pessoa;
    }

    public function getDados(?FrozenDate $dataInicial = null, ?FrozenDate $dataFinal = null): array
    {
        $query = $this->Pessoa->find();

        $query->select([
                'aluno' => 'Pessoa.nome',
                'cpf' => 'Pessoa.cpf',
                'telefone' => 'Pessoa.telefone',
                'endereco' => 'Pessoa.endereco',
                'cidade' => 'Cidade.nome',
                'estado' => 'Estado.nome',
                'genero' => 'Pessoa.genero',
                'dt_nascimento' => 'Pessoa.dt_nascimento',
                'contrato_id' => 'Contrato.id',
                'dt_contratacao' => 'Contrato.dt_contratacao',
                'dt_final' => 'Contrato.dt_final',
            ])
            ->innerJoin('Cidade', 'Cidade.id = Pessoa.ref_cidade')
            ->innerJoin('Estado', 'Estado.id = Cidade.ref_estado')
            ->leftJoin('Contrato', 'Contrato.ref_pessoa = Pessoa.id');

        if (!empty($dataInicial) && !empty($dataFinal)) {
            $query->where('Contrato.dt_contratacao BETWEEN :start AND :end')
                    ->bind(':start', $dataInicial, 'date')
                    ->bind(':end', $dataFinal, 'date');
        }

        return $query->all()->toArray();
    }
}
