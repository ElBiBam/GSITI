<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VoucherDetail Entity
 *
 * @property int $id
 * @property int|null $stock
 * @property float|null $price
 * @property int $product_id
 * @property int $voucher_header_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\VoucherHeader $voucher_header
 */
class VoucherDetail extends Entity
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
        'quantity' => true,
        'price' => true,
        'product_id' => true,
        'voucher_header_id' => true,
        'product' => true,
        'voucher_header' => true
    ];
}
