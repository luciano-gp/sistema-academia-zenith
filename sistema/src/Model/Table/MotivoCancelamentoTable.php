<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MotivoCancelamento Model
 *
 * @method \App\Model\Entity\MotivoCancelamento newEmptyEntity()
 * @method \App\Model\Entity\MotivoCancelamento newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MotivoCancelamento> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MotivoCancelamento get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MotivoCancelamento findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MotivoCancelamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MotivoCancelamento> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MotivoCancelamento|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MotivoCancelamento saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MotivoCancelamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MotivoCancelamento>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MotivoCancelamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MotivoCancelamento> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MotivoCancelamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MotivoCancelamento>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MotivoCancelamento>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MotivoCancelamento> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MotivoCancelamentoTable extends Table
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

        $this->setTable('motivo_cancelamento');
        $this->setDisplayField('descricao');
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
            ->maxLength('descricao', 45)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->notEmptyString('fl_gera_multa');

        return $validator;
    }
}
