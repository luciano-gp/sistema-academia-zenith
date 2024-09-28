<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aula Model
 *
 * @property \App\Model\Table\PlanoTable&\Cake\ORM\Association\BelongsToMany $Plano
 *
 * @method \App\Model\Entity\Aula newEmptyEntity()
 * @method \App\Model\Entity\Aula newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Aula> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aula get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Aula findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Aula patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Aula> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aula|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Aula saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Aula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Aula>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Aula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Aula> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Aula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Aula>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Aula>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Aula> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AulaTable extends Table
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

        $this->setTable('aula');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Plano', [
            'foreignKey' => 'ref_aula',
            'targetForeignKey' => 'ref_plano',
            'joinTable' => 'aula_plano',
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
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        return $validator;
    }
}
