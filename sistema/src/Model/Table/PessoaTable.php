<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoa Model
 *
 * @property \App\Model\Table\TreinoTable&\Cake\ORM\Association\BelongsToMany $Treino
 *
 * @method \App\Model\Entity\Pessoa newEmptyEntity()
 * @method \App\Model\Entity\Pessoa newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pessoa> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pessoa findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pessoa> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pessoa saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pessoa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pessoa> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PessoaTable extends Table
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

        $this->setTable('pessoa');
        $this->setDisplayField('cpf');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Treino', [
            'foreignKey' => 'pessoa_id',
            'targetForeignKey' => 'treino_id',
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
            ->scalar('nome')
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->date('dt_nascimento')
            ->requirePresence('dt_nascimento', 'create')
            ->notEmptyDate('dt_nascimento');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 11)
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('endereco')
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 11)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->scalar('genero')
            ->maxLength('genero', 45)
            ->allowEmptyString('genero');

        $validator
            ->integer('ref_cidade')
            ->requirePresence('ref_cidade', 'create')
            ->notEmptyString('ref_cidade');

        return $validator;
    }
}
