<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sending extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'options' => 'array',
    // ];

    protected $casts = [
        'to_time_manually' => 'datetime:H:i'
    ];

    protected $fillable = [
        'user_id',
        'user_name',
        'photo', 'title',
        'note',
        'user_id',
        'user_name',
        'photo',
        'title',
        'note',
        'size',
        'from_address',
        'simple_from_address',
        'from_note',
        'from_lat',
        'from_lng',
        'to_address',
        'simple_to_address',
        'to_note',
        'to_lat',
        'to_lng',
        'to_date',
        'to_date_manually',
        'to_time',
        'to_time_manually',
        'total_distance',
        'recommended_cost',
        'coupon_number',
        'coupon_price',
        'coupon_rate',
        'discounted_cost',
        'reward',
        'service_charge',
        'insurance_cost',
        'total_delivery_cost',
        'is_fraglile',
        'need_animal_cage',
        'need_cooling_equipment',
        'need_help_wrapping',
        'weight',
        'help_pick_up',
        'help_delivery',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    // protected function castAttribute($key, $value)
    // {
    //     if (! is_null($value)) {
    //         return parent::castAttribute($key, $value);
    //     }

    //     switch ($this->getCastType($key)) {
    //         case 'int':
    //         case 'integer':
    //             return (int) 0;
    //         case 'real':
    //         case 'float':
    //         case 'double':
    //             return (float) 0;
    //         case 'string':
    //             return '';
    //         case 'bool':
    //         case 'boolean':
    //             return false;
    //         case 'object':
    //         case 'array':
    //         case 'json':
    //             return [];
    //         case 'collection':
    //             return new BaseCollection();
    //         case 'date':
    //             return $this->asDate('0000-00-00');
    //         case 'datetime':
    //             return $this->asDateTime('0000-00-00');
    //         case 'timestamp':
    //             return $this->asTimestamp('0000-00-00');
    //         default:
    //             return $value;
    //     }
    // }
}
