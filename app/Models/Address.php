<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Address extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'building_num',
        'floor',
        'apartment_num',
        'user_id',
        'area_id',
        'isOld'
    ];
    protected $casts = [
        'isOld' => 'boolean'
    ];

    public function area()
    {
        return $this->belongsTo('App\Model\Area');
    }
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
