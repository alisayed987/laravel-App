<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city_id'
    ];
    public $primaryKey = 'id';
    protected $table = 'areas';

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
