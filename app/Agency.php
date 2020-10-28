<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Agency extends Model
{
    protected $table = 'agencies';
    
    protected $fillable = ['name', 'phone', 'email', 'address', 'location_id', 'long', 'lat'];

   
//    public function location() {
//       return $this->belongsTo(Location::class, 'location_id', 'id') ;
//    }

}
