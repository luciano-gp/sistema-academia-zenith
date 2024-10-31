<?php

namespace App\Lib\Relatorios;

use App\Model\Table\RegistroPresencaTable;
use Cake\I18n\FrozenDate;

class RelatorioFrequencia
{
    private RegistroPresencaTable $RegistroPresenca;

    public function __construct(RegistroPresencaTable $RegistroPresenca)
    {
        $this->RegistroPresenca = $RegistroPresenca;
    }

    public function getDados(FrozenDate $dataInicial, FrozenDate $dataFinal, ?int $pessoaId = null): array
    {
        $query = $this->RegistroPresenca->find();

        $subQuery = $query->newExpr(
            'SELECT GROUP_CONCAT(DISTINCT exercicio.nome SEPARATOR ", ") AS exercicios, treino.descricao AS treino, treino_pessoa.ref_pessoa AS ref_pessoa
                        FROM treino
                            INNER JOIN treino_pessoa ON treino.id = treino_pessoa.ref_treino
                            INNER JOIN exercicio_treino ON exercicio_treino.ref_treino = treino.id
                            INNER JOIN exercicio ON exercicio.id = exercicio_treino.ref_exercicio
                        WHERE treino_pessoa.dt_inicial >= "' . $dataInicial->format('Y-m-d') . '" AND
                            treino_pessoa.dt_final <= "' . $dataFinal->format('Y-m-d') . '"
                        GROUP BY treino_pessoa.ref_pessoa'
        );

        $query->select([
                'data' => 'RegistroPresenca.dt_entrada',
                'aluno' => 'Pessoa.nome',
                'exercicios' => 'SubQuery.exercicios',
                'treino' => 'SubQuery.treino',
            ])
            ->innerJoin(['Pessoa' => 'pessoa'], ['RegistroPresenca.ref_pessoa = Pessoa.id'])
            ->leftJoin(['SubQuery' => $subQuery], ['RegistroPresenca.ref_pessoa = SubQuery.ref_pessoa'])
            ->where('RegistroPresenca.dt_entrada BETWEEN :start AND :end')
            ->bind(':start', $dataInicial, 'date')
            ->bind(':end', $dataFinal, 'date');

        if (!empty($pessoaId)) {
            $query->where(['RegistroPresenca.ref_pessoa' => $pessoaId]);
        }

        return $query->groupBy(['RegistroPresenca.dt_entrada', 'SubQuery.ref_pessoa'])->all()->toArray();
    }
}
