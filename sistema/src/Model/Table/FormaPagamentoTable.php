<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormaPagamento Model
 *
 * @method \App\Model\Entity\FormaPagamento newEmptyEntity()
 * @method \App\Model\Entity\FormaPagamento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FormaPagamento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormaPagamento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FormaPagamento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FormaPagamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FormaPagamento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormaPagamento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FormaPagamento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FormaPagamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FormaPagamento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FormaPagamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FormaPagamento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FormaPagamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FormaPagamento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FormaPagamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FormaPagamento> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FormaPagamentoTable extends Table
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

        $this->setTable('forma_pagamento');
        $this->setDisplayField('metodo');
        $this->setPrimaryKey('id');
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
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->scalar('metodo')
            ->maxLength('metodo', 45)
            ->requirePresence('metodo', 'create')
            ->notEmptyString('metodo');

        return $validator;
    }
}
