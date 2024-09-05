<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExercicioTreino Model
 *
 * @method \App\Model\Entity\ExercicioTreino newEmptyEntity()
 * @method \App\Model\Entity\ExercicioTreino newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ExercicioTreino> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExercicioTreino get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ExercicioTreino findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ExercicioTreino patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ExercicioTreino> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExercicioTreino|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ExercicioTreino saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ExercicioTreino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExercicioTreino>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExercicioTreino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExercicioTreino> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExercicioTreino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExercicioTreino>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ExercicioTreino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ExercicioTreino> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExercicioTreinoTable extends Table
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

        $this->setTable('exercicio_treino');
        $this->setDisplayField(['ref_exercicio', 'ref_treino']);
        $this->setPrimaryKey(['ref_exercicio', 'ref_treino']);
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
            ->integer('num_series')
            ->allowEmptyString('num_series');

        $validator
            ->integer('num_repeticoes')
            ->allowEmptyString('num_repeticoes');

        $validator
            ->integer('carga')
            ->allowEmptyString('carga');

        $validator
            ->scalar('observacao')
            ->maxLength('observacao', 45)
            ->allowEmptyString('observacao');

        return $validator;
    }
}
