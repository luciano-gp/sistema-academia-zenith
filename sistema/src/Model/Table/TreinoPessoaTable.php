<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TreinoPessoa Model
 *
 * @method \App\Model\Entity\TreinoPessoa newEmptyEntity()
 * @method \App\Model\Entity\TreinoPessoa newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TreinoPessoa> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TreinoPessoa get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TreinoPessoa findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TreinoPessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TreinoPessoa> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TreinoPessoa|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TreinoPessoa saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TreinoPessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TreinoPessoa>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TreinoPessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TreinoPessoa> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TreinoPessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TreinoPessoa>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TreinoPessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TreinoPessoa> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TreinoPessoaTable extends Table
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

        $this->setTable('treino_pessoa');
        $this->setDisplayField(['ref_pessoa', 'ref_treino']);
        $this->setPrimaryKey(['ref_pessoa', 'ref_treino']);
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
            ->date('dt_inicial')
            ->requirePresence('dt_inicial', 'create')
            ->notEmptyDate('dt_inicial');

        $validator
            ->date('dt_final')
            ->allowEmptyDate('dt_final');

        return $validator;
    }
}
