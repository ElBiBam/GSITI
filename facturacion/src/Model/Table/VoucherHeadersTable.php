<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
/**
 * VoucherHeaders Model
 *
 * @property \App\Model\Table\VoucherTypesTable|\Cake\ORM\Association\BelongsTo $VoucherTypes
 * @property \App\Model\Table\SellersTable|\Cake\ORM\Association\BelongsTo $Sellers
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\VoucherDetailsTable|\Cake\ORM\Association\HasMany $VoucherDetails
 *
 * @method \App\Model\Entity\VoucherHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\VoucherHeader newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VoucherHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VoucherHeader|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VoucherHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VoucherHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VoucherHeader[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VoucherHeader findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VoucherHeadersTable extends Table
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

        $this->setTable('voucher_headers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VoucherTypes', [
            'foreignKey' => 'voucher_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sellers', [
            'foreignKey' => 'seller_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('VoucherDetails', [
            'foreignKey' => 'voucher_header_id',
            'joinType' => 'INNER'
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
            ->dateTime('issue_date')
            ->allowEmptyDateTime('issue_date');

        $validator
            ->allowEmptyString('status');

        return $validator;
    }    

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['voucher_type_id'], 'VoucherTypes'));
        $rules->add($rules->existsIn(['seller_id'], 'Sellers'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['voucher_header_id'], 'VoucherDetails'));

        return $rules;
    }
}
