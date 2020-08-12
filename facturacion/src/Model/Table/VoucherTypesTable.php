<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VoucherTypes Model
 *
 * @property \App\Model\Table\VoucherHeadersTable|\Cake\ORM\Association\HasMany $VoucherHeaders
 *
 * @method \App\Model\Entity\VoucherType get($primaryKey, $options = [])
 * @method \App\Model\Entity\VoucherType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VoucherType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VoucherType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VoucherType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VoucherType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VoucherType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VoucherType findOrCreate($search, callable $callback = null, $options = [])
 */
class VoucherTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('voucher_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('VoucherHeaders', [
            'foreignKey' => 'voucher_type_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        return $validator;
    }
}
