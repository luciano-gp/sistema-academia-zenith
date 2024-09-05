<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exercicio Model
 *
 * @property \App\Model\Table\TreinoTable&\Cake\ORM\Association\BelongsToMany $Treino
 *
 * @method \App\Model\Entity\Exercicio newEmptyEntity()
 * @method \App\Model\Entity\Exercicio newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Exercicio> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercicio get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Exercicio findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Exercicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Exercicio> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercicio|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Exercicio saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Exercicio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exercicio>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exercicio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exercicio> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exercicio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exercicio>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Exercicio>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Exercicio> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExercicioTable extends Table
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

        $this->setTable('exercicio');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Treino', [
            'foreignKey' => 'exercicio_id',
            'targetForeignKey' => 'treino_id',
            'joinTable' => 'exercicio_treino',
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
            ->scalar('nome')
            ->maxLength('nome', 45)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('video')
            ->maxLength('video', 45)
            ->allowEmptyString('video');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        return $validator;
    }
}
