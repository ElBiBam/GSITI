<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VoucherHeader Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $issue_date
 * @property int $voucher_type_id
 * @property int $seller_id
 * @property int $client_id
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\VoucherType $voucher_type
 * @property \App\Model\Entity\Seller $seller
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\VoucherDetail[] $voucher_details
 */
class VoucherHeader extends Entity
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
        'issue_date' => true,
        'voucher_type_id' => true,
        'seller_id' => true,
        'client_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'voucher_type' => true,
        'seller' => true,
        'client' => true,
        'voucher_details' => true
    ];
}
