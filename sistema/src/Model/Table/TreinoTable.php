<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Treino Model
 *
 * @property \App\Model\Table\ExercicioTable&\Cake\ORM\Association\BelongsToMany $Exercicio
 * @property \App\Model\Table\PessoaTable&\Cake\ORM\Association\BelongsToMany $Pessoa
 *
 * @method \App\Model\Entity\Treino newEmptyEntity()
 * @method \App\Model\Entity\Treino newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Treino> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Treino get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Treino findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Treino patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Treino> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Treino|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Treino saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Treino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Treino>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Treino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Treino> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Treino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Treino>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Treino>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Treino> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TreinoTable extends Table
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

        $this->setTable('treino');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Exercicio', [
            'foreignKey' => 'ref_treino',
            'targetForeignKey' => 'ref_exercicio',
            'joinTable' => 'exercicio_treino',
        ]);

        $this->belongsToMany('Pessoa', [
            'foreignKey' => 'ref_treino',
            'targetForeignKey' => 'ref_pessoa',
            'joinTable' => 'treino_pessoa',
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
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        return $validator;
    }
}
