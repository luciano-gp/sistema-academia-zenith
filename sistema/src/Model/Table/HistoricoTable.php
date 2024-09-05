<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Historico Model
 *
 * @method \App\Model\Entity\Historico newEmptyEntity()
 * @method \App\Model\Entity\Historico newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Historico> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Historico get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Historico findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Historico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Historico> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Historico|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Historico saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Historico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Historico>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Historico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Historico> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Historico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Historico>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Historico>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Historico> deleteManyOrFail(iterable $entities, array $options = [])
 */
class HistoricoTable extends Table
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

        $this->setTable('historico');
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
            ->integer('indice_operacao')
            ->requirePresence('indice_operacao', 'create')
            ->notEmptyString('indice_operacao');

        return $validator;
    }
}
