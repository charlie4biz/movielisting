<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $title
 * @property string $synopsis
 * @property string $status
 * @property \Cake\I18n\FrozenTime $start
 * @property \Cake\I18n\FrozenTime $end
 * @property $photo
 * @property string $photo_dir
 * @property string $photo_size
 * @property string $time
 * @property string $duration
 * @property string $cast
 * @property int $ticket
 * @property int $kids
 * @property \Cake\I18n\FrozenTime $created
 */
class Movie extends Entity
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
        'title' => true,
        'synopsis' => true,
        'status' => true,
        'start' => true,
        'end' => true,
        'photo' => true,
        'photo_dir' => true,
        'photo_size' => true,
        'time' => true,
        'duration' => true,
        'cast' => true,
        'ticket' => true,
        'kids' => true,
        'created' => true
    ];
}
