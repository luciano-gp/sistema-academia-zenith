<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cidade Model
 *
 * @method \App\Model\Entity\Cidade newEmptyEntity()
 * @method \App\Model\Entity\Cidade newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cidade> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cidade get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cidade findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cidade> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cidade|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cidade saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cidade>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cidade> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cidade>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cidade>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cidade> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CidadeTable extends Table
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

        $this->setTable('cidade');
        $this->setDisplayField('id');
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
            ->integer('ref_estado')
            ->requirePresence('ref_estado', 'create')
            ->notEmptyString('ref_estado');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 45)
            ->allowEmptyString('nome');

        return $validator;
    }
}
