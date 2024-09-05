<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RegistroPresenca Model
 *
 * @method \App\Model\Entity\RegistroPresenca newEmptyEntity()
 * @method \App\Model\Entity\RegistroPresenca newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RegistroPresenca> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RegistroPresenca get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RegistroPresenca findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RegistroPresenca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RegistroPresenca> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RegistroPresenca|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RegistroPresenca saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RegistroPresenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegistroPresenca>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RegistroPresenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegistroPresenca> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RegistroPresenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegistroPresenca>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RegistroPresenca>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RegistroPresenca> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RegistroPresencaTable extends Table
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

        $this->setTable('registro_presenca');
        $this->setDisplayField('dt_entrada');
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
            ->scalar('dt_entrada')
            ->maxLength('dt_entrada', 45)
            ->requirePresence('dt_entrada', 'create')
            ->notEmptyString('dt_entrada');

        $validator
            ->integer('ref_pessoa')
            ->requirePresence('ref_pessoa', 'create')
            ->notEmptyString('ref_pessoa');

        return $validator;
    }
}
