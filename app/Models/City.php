<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id'
    ];
    public $primaryKey = 'id';
    protected $table = 'cities';

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function areas()
    {
        return $this->hasMany('App\Models\Area');
    }
}
