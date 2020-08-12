<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $stock
 * @property int|null $product_type_id
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ProductType $product_type
 * @property \App\Model\Entity\VoucherDetail[] $voucher_details
 * @property \App\Model\Entity\Provider[] $providers
 * @property \App\Model\Entity\Warehouse[] $warehouses
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'description' => true,
        'quantity' => true,
        'product_type_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'product_type' => true,
        'voucher_details' => true,
        'providers' => true,
        'warehouses' => true
    ];
}
