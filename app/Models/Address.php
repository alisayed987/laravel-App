<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Concerns\ValidatesAttributes;

class Address extends Model
{
    use HasFactory, ValidatesRequests;

    public $primaryKey = 'id';
    protected $table = 'addresses';

    protected $fillable = [
        // 'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        'street',
        'building_num',
        'floor',
        'apartment_num',
        'user_id',
        'area_id'
    ];

    public $rules = [
        'street' => 'required|regex:/(^[-A-Za-z.,\/ ]+$)/',
        'building_num' => 'required|regex:/(^[ ]*[0-9]+[A-Za-z]*$)/',
    ];



    public function area()
    {
        return $this->hasMany('App\Model\Address');
    }
    public function user()
    {
        return $this->hasOne('App\Model\Address');
    }
}
