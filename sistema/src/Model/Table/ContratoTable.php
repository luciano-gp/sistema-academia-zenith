<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contrato Model
 *
 * @method \App\Model\Entity\Contrato newEmptyEntity()
 * @method \App\Model\Entity\Contrato newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contrato> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contrato get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contrato findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contrato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contrato> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contrato|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contrato saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contrato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contrato>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contrato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contrato> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contrato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contrato>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contrato>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contrato> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContratoTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contrato');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pessoa', [
            'foreignKey' => 'ref_pessoa',
        ]);

        $this->belongsTo('Plano', [
            'foreignKey' => 'ref_plano',
        ]);

        $this->belongsTo('MotivoCancelamento', [
            'foreignKey' => 'ref_motivo_cancelamento',
        ]);

        $this->belongsTo('FormaPagamento', [
            'foreignKey' => 'ref_forma_pagamento',
        ]);

        $this->belongsTo('PessoaIndicacao', [
            'foreignKey' => 'ref_pessoa_indicacao',
            'className' => 'Pessoa',
        ]);

        $this->hasMany('Titulo', [
            'foreignKey' => 'ref_contrato',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->dateTime('dt_contratacao')
            ->requirePresence('dt_contratacao', 'create')
            ->notEmptyDateTime('dt_contratacao');

        $validator
            ->dateTime('dt_final')
            ->allowEmptyDateTime('dt_final');

        $validator
            ->integer('ref_pessoa')
            ->requirePresence('ref_pessoa', 'create')
            ->notEmptyString('ref_pessoa');

        $validator
            ->integer('ref_plano')
            ->requirePresence('ref_plano', 'create')
            ->notEmptyString('ref_plano');

        $validator
            ->integer('ref_motivo_cancelamento')
            ->allowEmptyString('ref_motivo_cancelamento');

        $validator
            ->dateTime('dt_suspencao')
            ->allowEmptyDateTime('dt_suspencao');

        $validator
            ->integer('meses_suspensao')
            ->allowEmptyString('meses_suspensao');

        $validator
            ->integer('ref_pessoa_indicacao')
            ->allowEmptyString('ref_pessoa_indicacao');

        $validator
            ->scalar('caminho_contrato')
            ->maxLength('caminho_contrato', 45)
            ->allowEmptyString('caminho_contrato');

        $validator
            ->integer('ref_forma_pagamento')
            ->requirePresence('ref_forma_pagamento', 'create')
            ->notEmptyString('ref_forma_pagamento');

        $validator
            ->integer('numero_parcelas_pagamento')
            ->allowEmptyString('numero_parcelas_pagamento');

        return $validator;
    }
}
