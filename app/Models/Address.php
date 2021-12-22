<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'area_id'
    ];
    public $primaryKey = 'id';
    protected $table = 'addresses';

    public function area()
    {
        return $this->hasMany('App\Model\Address');
    }
    public function user()
    {
        return $this->hasOne('App\Model\Address');
    }
}
