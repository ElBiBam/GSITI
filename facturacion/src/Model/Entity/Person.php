<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property int|null $civil_status
 * @property string|null $phone
 * @property string|null $contact
 * @property string|null $code
 * @property int|null $city_id
 * @property int $user_id
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Provider[] $providers
 * @property \App\Model\Entity\Seller[] $sellers
 */
class Person extends Entity
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
        'name' => true,
        'surname' => true,
        'dni' => true,
        'phone' => true,
        'contact' => true,
        'code' => true,
        'city_id' => true,
        'user_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'city' => true,
        'user' => true,
        'clients' => true,
        'providers' => true,
        'sellers' => true
    ];
}
