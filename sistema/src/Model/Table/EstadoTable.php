<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estado Model
 *
 * @method \App\Model\Entity\Estado newEmptyEntity()
 * @method \App\Model\Entity\Estado newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Estado> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estado get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Estado findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Estado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Estado> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estado|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Estado saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Estado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estado>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estado> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estado>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estado> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EstadoTable extends Table
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

        $this->setTable('estado');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->hasMany('Cidade', [
            'foreignKey' => 'ref_estado',
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
            ->allowEmptyString('nome');

        return $validator;
    }
}
